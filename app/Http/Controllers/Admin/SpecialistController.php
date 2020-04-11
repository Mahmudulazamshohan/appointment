<?php

namespace App\Http\Controllers\Admin;

use App\AvailableDay;
use App\AvailableTime;
use App\Category;
use App\DayName;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySpecialistRequest;
use App\Http\Requests\StoreSpecialistRequest;
use App\Http\Requests\UpdateSpecialistRequest;
use App\Specialist;
use App\SpecialistCategories;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SpecialistController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('specialist_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialists = Specialist::with('user')->orderBy('created_at', 'DESC')->get();
        return view('admin.specialists.index', compact('specialists'));
    }

    public function create()
    {
        abort_if(Gate::denies('specialist_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::all()->where('category_id','!=', null)->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $categories = Category::all()->pluck('name', 'id');
        $days = DayName::orderBy('id', 'ASC')->get();

        return view('admin.specialists.create', compact('users', 'categories', 'days'));
    }

    public function store(StoreSpecialistRequest $request)
    {
        //$specialist = Specialist::create($request->all());
        if ($request->specific_day) {
            $days = $request->specific_day;
        }else{
            $days = [8];
        }

        $specialist = new Specialist();
        $specialist->user_id = $request->user_id;
        //$specialist->category_id = $request->category_id;
        $specialist->description = $request->description;
        $specialist->opening_time = $request->opening_time;
        $specialist->closing_time = $request->closing_time;
        $specialist->availability = $request->availability;
        if ($request->hasFile('photo')) {
            $file = $request->photo;
            $extension = $file->getClientOriginalExtension(); // getting file extension
            $filename =time().'.'.$extension;
            $file->move(public_path('/images/specialist'), $filename);
            $specialist->photo = $filename;
        }
        $specialist->save();
        $categories = $request->category_id;
        $specialistCategories= [];
        foreach ($categories as $category){
            $specialistCategory = new SpecialistCategories();
            $specialistCategory->category_id = $category;
            $specialistCategory->specialist_id = $specialist->id;
            $specialistCategories[] = $specialistCategory;
        }
        $specialist->speciallistcategories()->saveMany($specialistCategories);
        foreach ($days as $key => $value) {
            $availableDay = new AvailableDay();
            $availableDay->day_name_id = $value;
            $specialist->availabledays()->save($availableDay);
        }

        $user = User::where('id', '=', $request->user_id)->first();
        $user->is_specialist = 1;
        $user->save();


        return redirect()->route('admin.specialists.index');
    }

    public function edit(Specialist $specialist)
    {
        abort_if(Gate::denies('specialist_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $days = DayName::orderBy('id', 'ASC')->get();
        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::all()->pluck('name', 'id');
        $availabledays = AvailableDay::where('specialist_id', $specialist->id)->pluck('day_name_id');
        $daysArr = $availabledays->toArray();
        $specialist->load('user', 'category','speciallistcategories');

        return view('admin.specialists.edit', compact('days', 'users', 'categories', 'specialist', 'daysArr'));
    }

    public function update(UpdateSpecialistRequest $request, Specialist $specialist)
    {
        if ($request->specific_day) {
            $days = $request->specific_day;
        }else{
            $days = [8];
        }
        $specialist->user_id = $request->user_id;
        // $specialist->category_id = $request->category_id;
        $specialist->description = $request->description;
        $specialist->opening_time = $request->opening_time;
        $specialist->closing_time = $request->closing_time;
        $specialist->availability = $request->availability;
        if ($request->hasFile('photo')) {
            $file = $request->photo;
            $extension = $file->getClientOriginalExtension(); // getting file extension
            $filename =time().'.'.$extension;
            $file->move(public_path('/images/specialist'), $filename);
            $specialist->photo = $filename;
        }

        $specialist->save();
        $specialist->speciallistcategories()->delete();
        $categories = $request->category_id;
        $specialistCategories= [];
        foreach ($categories as $category){
            $specialistCategory = new SpecialistCategories();
            $specialistCategory->category_id = $category;
            $specialistCategory->specialist_id = $specialist->id;
            $specialistCategories[] = $specialistCategory;
        }
        $specialist->speciallistcategories()->saveMany($specialistCategories);

        $deletePrevAvailableDays = AvailableDay::where('specialist_id', $specialist->id)->delete();

        foreach ($days as $key => $value) {
            $availableDay = new AvailableDay();
            $availableDay->day_name_id = $value;
            $specialist->availabledays()->save($availableDay);
        }
        return redirect()->route('admin.specialists.index');
    }

    public function show(Specialist $specialist)
    {
        abort_if(Gate::denies('specialist_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialist->load('user', 'category');

        return view('admin.specialists.show', compact('specialist'));
    }

    public function destroy(Specialist $specialist)
    {
        abort_if(Gate::denies('specialist_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialist->delete();
        AvailableDay::where('specialist_id', $specialist->id)->delete();
        return back();
    }

    public function massDestroy(MassDestroySpecialistRequest $request)
    {
        Specialist::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('specialist_create') && Gate::denies('specialist_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Specialist();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function specialistsAvailableTimes()
    {

    }

    public function getSpecialistAvailableTimes($specialistid)
    {
        $specialist = Specialist::with(['user', 'availabledays.dayname', 'availabledays.availabletime'])->find($specialistid);

        return view('admin.specialists.times', compact('specialist'));
    }

    public function saveAvailableTimes(Request $request)
    {
        $data = $request->validate([
            "available_time.*"  => "required",
        ]);

        if ($request->available_times) {
            $availableDayId = $request->available_day_id;
            foreach ($request->available_times as $key => $value) {
                $availabletime = new AvailableTime();
                $availabletime->available_time = $value;
                $availabletime->available_day_id = $availableDayId;
                $availabletime->save();
            }

            $availableDay = AvailableDay::find($availableDayId);
            $availableDay->status = 1;
            $availableDay->save();

            return redirect()->back();
        }

    }
}
