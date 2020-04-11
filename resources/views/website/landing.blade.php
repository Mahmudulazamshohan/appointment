<!DOCTYPE html>
<html lang="cs-CZ">

<head>
  <title>Ústav dermatopsychologie</title>
  <!-- fav icon -->
  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/gif/x-icon">
  <!-- meta tag -->
  <meta charset="UTF-8">
  <meta name="author" content="dermatopsychologie.cz">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- meta keywords -->
  <meta name="keywords" content="psychologie, dermatologie, dermatopsychologie, ústav dermatopsychologie"/>
  <meta name="robots" content="NOODP,index,follow"/>
  <!-- font awesome css -->
  <link rel="stylesheet" href="{{asset('frontend')}}/css/font-awesome.min.css">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap.min.css">
  <!-- owl carousel css -->
  <link rel="stylesheet" href="{{asset('frontend')}}/css/owl.carousel.min.css">
  <link rel="stylesheet" href="{{asset('frontend')}}/css/owl.theme.default.min.css">
  <!-- main stylesheet -->
  <link rel="stylesheet" href="{{asset('frontend')}}/css/style.css">
  <!-- calendar stylesheet -->
  <link rel="stylesheet" href="{{asset('css')}}/zabuto_calendar.min.css">

  <!-- responsive stylesheet -->
  <link rel="stylesheet" href="{{asset('frontend')}}/css/responsive.css">
  <link rel="stylesheet" href="{{asset('frontend')}}/css/custom.css">
  <link rel="stylesheet" href="{{asset('css')}}/jquery.steps.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

</head>

<body>
  <div id="spinner-overlay">
      <div class="w-100 d-flex justify-content-center align-items-center">
        <span><small style="color: #fff;">Please Wait</small></span>
        <div class="spinner"></div>
      </div>
  </div>
 <!-- header area start here -->
 <!-- header area start here -->
 <section class="jr_header_area_start">

        <div class="jr_header_logo text-center">
          <a href="{{url('/')}}"><img src="{{asset('frontend')}}/images/logo.png" alt="logo"></a>
        </div>


        <nav class="jr_header_menu">
          <ul>
            <li><a href="#" class="active nav_active" data-scroll-nav='2'>O NÁS</a></li>
            <li><a href="#" class="active" data-scroll-nav='4'>SLUŽBY</a></li>
            <li><a href="#" class="active" data-scroll-nav='6'>REZERVACE</a></li>
            <li><a href="#" class="active" data-scroll-nav='8'>REFERENCE</a></li>
            <li><a href="#" class="active" data-scroll-nav='10'>KONTAKT</a></li>
          </ul>
        </nav>


</section>

<!-- mobile view -->
<!-- mobile view -->
<section class="jr_mobile_view">
  <div class="jr_header_logo text-center">
    <a href="page3.html"><img src="{{asset('frontend')}}/images/logo.png" alt="logo"></a>
  </div>
  <button id="jr_menu" class="jr_nav_toggle">
    <span class="jr_ico">
      <span class="jr_mask"></span>
    </span>
  </button>
</section>
<!-- header area end here -->
<!-- header area end here -->


<!-- o nas area start here -->
<!-- o nas area start here -->
<section class="jr_article_area_start" data-scroll-index='2'>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="jr_article_left">
          <h1>O NÁS</h1>
          <p>Představujeme Vám nový jedinečný koncept ústavu dermatopsychologie v České republice. Věříme, že psychologická podpora u klientů s dermatologickými problémy je velice důležitá. Pacienti s dermatologickými obtížemi se</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="jr_article_middle">
          <p>často setkávají s problémy, které jsou spojeny se stresem, bolestí, pocity svědění, poruchami spánku, depresí, úzkostmi, ztrátou sebevědomí, nebo též partnerskými, sexuálními problémy. Proto tento koncept přináší komplexní podporu lidem s dermatologickým onemocněním od psychologů, lékařů a sociálních pracovníků ve spolupráci s předními českými dermatology.
          </p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="jr_article_right">
          <p> Naše zařízení je známé svým lidským přístupem ke klientům a největší možnou úrovní péče. Přejímáme inovativní metody ze zahraničí v uvedené oblasti, vytváříme vlastní metodiku a vyvíjíme úsilí  pro zvýšení uznání  důležitosti psychologické podpory u dermatologicky nemocných.</p>
        </div>
      </div>

      <div class="col-md-12">
        <div class="jr_onas_article">
          <h3>SPECIALISTÉ</h3>
          <div class="jr_onas_text">
            <h5>Ingr. Mgr. Felix S. Ratzenbeck, MSc. - vedoucí psycholog</h5>
            <p>Felix Ratzenbeck je absolventem magisterského programu jednooborové psychologie a 5-ti letého sebezkušenostního psychoterapeutického výcviku, dále vystudoval ekonomii a management. Je zakladatelem a vedoucím psychologem v Ústavu dermatopsychologie. Dlouhodobě působí v Institutu partnerských vztahů, zabývá se tématikou osobního rozvoje a zvládání stresových situací. Publikoval desítky populárních a populárně vědeckých článků a aktivně se účastní českých i zahraničních odborných konferencí s psychologickou a dermatovenerologickou tématikou.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- o nas area end here -->
<!-- o nas area end here -->

<!-- sluz area start here -->
<!-- sluz area start here -->
<!--services-->
<section class="jr_sluz_area" data-scroll-index='4'>
  <div class="jr_section_head">
    <h1>SLUŽBY</h1>
  </div>
  <div class="container">
    <div class="row">
      @php
        $counter = 1;
      @endphp
     @foreach($services as $service)
      @if($service->display_category==1)
      <div class="col-md-12">
        <div class="jr_sluz_text_1">
          <h3 class="mt-3">{{$service->title}}</h3>
          <div>{!! $service->description !!}</div>
        </div>
      </div>

    @else
      @if ($counter % 2 == 0)
        <div class="col-md-6">
          <div class="jr_sluz_right">
            <h4 class="mt-3">{{$service->title}}</h4>
            <div>{!! $service->description !!}</div>
          </div>
        </div>
      @else
        <div class="col-md-6">
          <div class="jr_sluz_left">
            <h4 class="mt-3">{{$service->title}}</h4>
            <div>{!! $service->description !!}</div>
          </div>
        </div>
      @endif
      @php
        $counter++;
      @endphp

    @endif
    @endforeach

    </div>
  </div>
</section>
<!-- sluz area end here -->
<!-- sluz area end here -->


<!-- rezervace area start here -->
<!-- rezervace area start here -->
<section class="jr_rezervace_area" data-scroll-index='6'>
  <div class="jr_section_head jr_section_rezervace">
    <h1>REZERVACE</h1>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="jr_rezervace_table">
          <table class="table table-responsive">
            <thead>
              <tr>
                <th></th>
                @foreach($reservations as $reservation)
                <th scope="col">{{$reservation->title}}</th>
                @endforeach
              </tr>
            </thead>
          </table>
          <hr>
          <div class="text-center appointment-section">
            <div class="categories-list">
              <h3>Služby</h3>
              <div class="row justify-content-sm-center">
                @foreach ($categories as $category)
                <button style="background-color: {{ $category->category_color  }}" class="col-sm-2 alert alert-success m-3 cursor-pointer category hvr-bounce-in" value="{{ $category->id }}"><strong>{{ ucwords($category->name) }}</strong></button>
                @endforeach
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="specialist-list hide">
              <h3 class="mb-3">Vyberte prosím odborníka</h3>
              <div id="specialist-html-data"></div>
            </div>
            <div class="specialist-calendar hide">
              <h3 class="mb-3"><button class="btn btn-xs btn-default arrow-btn mb-2 calendar-undo-btn pull-left"><i class="fa fa-undo" aria-hidden="true"></i></button>Vyberte prosím datum</h3>
              <div id="book-appointment-calendar">
                <div id="date-popover" class="popover top" style="">
                  <div id="date-popover-content" class="popover-content"></div>
                </div>
                <div id="demo"></div>
              </div>
            </div>
            <div class="specialist-available-time hide">
              <h3 class="mb-3">Vyberte prosím čas setkání</h3>
              <div id="specialist-available-time-html"></div>
            </div>
            <div class="appointment-form hide">
              <h3 class="mb-3"></h3>
              <div id="appointment-form-html"></div>
            </div>
            <div class="appointment-success-message hide">
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fa fa-paper-plane"></i></h5>
                Vaše rezervace byla úspěšně uložena.
              </div>
            </div>
          </div>
         <table class="table table-responsive">
            <thead>
              <tr>
                <th></th>
                <th scope="col">ind. psychologické poradenství</th>
                <th scope="col">rodinné psychologické poradenství</th>
                <th scope="col">techniky zvládání stresu</th>
                <th scope="col">dermoporadenství</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">CENA</th>
                <td>1000,-</td>
                <td>1500,-</td>
                <td>500,-</td>
                <td>500,-</td>
              </tr>
            </tbody>
          </table>
          <b>Uvedené ceny jsou za terapeutické konzulace (50 minut), techniky zvládání stresu (40 minut), dermoporadenství (40 minut).</b>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- rezervace area end here -->
<!-- rezervace area end here -->

<!-- reference area start here -->
<!-- reference area start here -->
<section class="jr_reference_area" data-scroll-index='8'>
  <div class="jr_section_head jr_section_reference">
    <h1>REFERENCE</h1>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="jr_reference_slide owl-carousel owl-theme">
      @foreach($references as $reference)
          <div class="jr_ref_single_slide" data-dot="<button>{{$reference->name}}</button>">
            @if($reference->image)
            <div class="jr_slide_img">
              <img src="{{asset('frontend')}}/images/{{$reference->image}}" alt="img">
            </div>
            @else
            <div class="jr_slide_img">
              <img src="{{asset('frontend')}}/images/slide.png" alt="img">
            </div>
            @endif
            <div class="jr_slide_text">
              <p>{{$reference->description}}</p>
              <h5>{{$reference->name}}</h5>
              <span>{{$reference->designation}}</span>
            </div>
          </div>
      @endforeach
        </div>

      </div>
    </div>
  </div>
</section>
<!-- reference area end here -->
<!-- reference area end here -->


<!-- contact area start here -->
<!-- contact area start here -->
<section class="jr_contact_area" data-scroll-index='10'>
  <div class="jr_section_head jr_section_contact">
    <h1>KONTAKT</h1>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-6">

        <div class="jr_contact_left">
          <div class="jr_contact_logo">
            <h2>ústav</h2>
            <h1>dermatopsychologie</h1>
          </div>
          @foreach($landings as $landing)
          <div class="jr_contact_address">
            <div class="jr_contact_add">
              <p>adresa.:</p>
              <h5>{{$landing->site_address}}</h5>
            </div>
            <div class="jr_contact_email">
              <p>e-mail:</p>
              <a href="mailto:{{$landing->site_email}}"><h5>{{$landing->site_email}}</h5></a>
            </div>

            <div class="jr_contact_submit">
              <input type="submit" value="ULOŽIT">
            </div>
           @endforeach
            <!-- hello developer, here if need a tag please open the jr_contact_btn div and remove jr_contact_submit div -->

            <!-- <div class="jr_contact_btn">
              <a href="#">ULOŽIT</a>
            </div> -->



          </div>
        </div>

      </div>

      <div class="col-md-12 col-lg-6">

       <div class="jr_contact_map">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2561.174187441!2d14.421935115236316!3d50.06429942299491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b9466b724ea33%3A0x7a8d64601167c681!2sSlavojova%20445%2C%20128%2000%20Praha%202-Nusle!5e0!3m2!1scs!2scz!4v1582132948301!5m2!1scs!2scz" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

         <div class="jr_map_pin">
           <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2561.174187441!2d14.421935115236316!3d50.06429942299491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b9466b724ea33%3A0x7a8d64601167c681!2sSlavojova%20445%2C%20128%2000%20Praha%202-Nusle!5e0!3m2!1scs!2scz!4v1582133367353!5m2!1scs!2scz" target="_blank"><img src="{{asset('frontend')}}/images/map_pin.png" alt="pin"></a>
         </div>
         <div class="jr_map_text">
           <p>Ústav dermatopsychologie</p>
         </div>
       </div>
      </div>

  </div>
</section>
<!-- contact area end here -->
<!-- contact area end here -->

<!-- footer area start here -->
<!-- footer area start here -->
<section class="jr_footer_area">
  <div class="container">
    <div class="jr_footer_text">
      <p>{{ date('Y') }} &copy;&nbsp;<a href="http://www.dermatopsychologie.cz/" alt="Ústav dermatopsychologie">www.dermatopsychologie.cz</a></p>
    </div>
  </div>
</section>
<!-- footer area end here -->
<!-- footer area end here -->











<!-- jquery js -->
<script src="{{asset('frontend')}}/js/jquery.min.js"></script>
<!-- popper min js -->
<script src="{{asset('frontend')}}/js/popper.min.js"></script>
<!--  <script  src="https://maps.googleapis.com/maps/api/staticmap?center=40.714%2c%20-73.998&zoom=12&size=400x400&key=AIzaSyCE4ENiGRsr16kDvXkEQqMS4fJ6EU6HOgM" type="text/javascript"></script> -->
<!-- bootstrap min js -->
<script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
<!-- owl carousel js -->
<script src="{{asset('frontend')}}/js/owl.carousel.min.js"></script>
<!-- calendar js -->
<script src="{{asset('js')}}/zabuto_calendar.min.js"></script>
<!-- scroll js -->
<script src="{{asset('frontend')}}/js/scrollIt.min.js"></script>
<!-- custom js -->
<script src="{{asset('frontend')}}/js/custom.js"></script>
<script src="{{asset('js')}}/jquery.steps.js"></script>
<script src="{{asset('js')}}/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
<script type="text/javascript">
  let specialistid;
  let date;
  let category_id;
  // $( document ).ready(function() {
  //     $("html").on("contextmenu",function(){
  //       return false;
  //     });
  // });
  function spinnerOverlayShow() {
    document.getElementById("spinner-overlay").style.display = "flex";
  }

  function spinnerOverlayHide() {
    document.getElementById("spinner-overlay").style.display = "none";
  }
  $(document).on('click', '.category', function(){
    let id = $(this).val();
      category_id = id;
    $(".categories-list").addClass('hide').css("display", "none");
    $(".specialist-list").fadeIn('slow').removeClass('hide');
    $.ajax({
        url: '{{ route('get-specialist') }}',
        type: 'GET',
        data: {id:id},
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function (response) {
          $("#specialist-html-data").html(response);
        },
        error: function (xhr) {
            $.each(xhr.responseJSON.errors, function(key,value) {
              toastr.error(value[0]);
            });
        }
    });
  });

  $(document).on('click', '.book-app-btn', function(){
    specialistid = $(this).val();

    let eventdata = [];
    $.ajax({
        url: '{{ route('get-specialist-available-days') }}',
        type: 'GET',
        data: {specialistid:specialistid},
        beforeSend: function (request) {
          return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function (response) {
          loadAvailableDatesCalendar(response);
        },
        error: function (xhr) {
          $.each(xhr.responseJSON.errors, function(key,value) {
            toastr.error(value[0]);
          });
        }
    });

  });
  function loadAvailableDatesCalendar(eventdata){
    let arr = [];
    $.each(eventdata, function(k,v){
      arr.push({"date":v, "badge":false});

    });
    $("#demo").empty();
    $("#demo").zabuto_calendar({
      language:"Cs",
      show_previous: false,
      show_next: {{ $appdefault->no_of_months_for_cal }},
      data: arr,
    });
    $(".specialist-list").addClass("hide").css("display", "none");
    $(".specialist-calendar").fadeIn('slow').removeClass('hide');
  }

  // function myDateFunction(id, fromModal) {

  //     $("#date-popover").hide();
  //     if (fromModal) {
  //         $("#" + id + "_modal").modal("hide");
  //     }
  //     var date = $("#" + id).data("date");
  //     console.log(date);
  //     var hasEvent = $("#" + id).data("hasEvent");
  //     if (hasEvent && !fromModal) {
  //         return false;
  //     }
  //     $("#date-popover-content").html('You clicked on date ' + date);
  //     $("#date-popover").show();
  //     return true;
  // }

  // function myNavFunction(id) {
  //     $("#date-popover").hide();
  //     var nav = $("#" + id).data("navigation");
  //     var to = $("#" + id).data("to");
  //     console.log('nav ' + nav + ' to: \ + to.month + '/' + to.year');
  // }
  $(document).on('click', '.event', function(e){
    e.preventDefault();
    let id = this.id;
    date = $("#" + id).data("date");
    let weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
    let a = new Date(date);
    let dayname = weekday[a.getDay()];

    $.ajax({
        url: '{{ route('get-specialist-available-times') }}',
        type: 'GET',
        data: {specialistid:specialistid, dayname:dayname, date:date},
        beforeSend: function (request) {
          return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function (response) {
          $(".specialist-calendar").addClass("hide").css("display", "none");
          $(".specialist-available-time").fadeIn('slow').removeClass('hide');
          $("#specialist-available-time-html").html(response);
        },
        error: function (xhr) {
          $.each(xhr.responseJSON.errors, function(key,value) {
            toastr.error(value[0]);
          });
        }
    });
  });


  $(document).on('click', '.time-btn', function(e){
    e.preventDefault();
    let time = $(this).val();
    // let category_id = $('#category_id').val()
    let data = {
      specialistid:specialistid,
      date:date,
      time:time,
      category_id:category_id
    };
    $.ajax({
        url: '{{ route('appointment-form') }}',
        type: 'GET',
        data: data,
        beforeSend: function (request) {
          return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function (response) {
          $(".specialist-available-time").addClass("hide").css("display", "none");
          $(".appointment-form").fadeIn('slow').removeClass('hide');
          $("#appointment-form-html").html(response);
        },
        error: function (xhr) {
          $.each(xhr.responseJSON.errors, function(key,value) {
            toastr.error(value[0]);
          });
        }
    });
  });
  $(document).on('click', '.appointment-submit-btn', function(e){
    e.preventDefault();
    if ($("#patient_name").val() == '') {
      toastr.error("Pro dokončení rezervace prosím zadejte své jméno.");
      $("#patient_name").focus();
      return false;
    }


    if ($("#patient_email").val() == '') {
      toastr.error("Pro dokončení rezervace prosím zadejte svůj em-mail.");
      $("#patient_email").focus();
      return false;
    }
    if (!isEmail($("#patient_email").val())) {
      toastr.error("Invalid Email!");
      $("#patient_email").val('');
      $("#patient_email").focus();
      return false;
    }

    if ($("#patient_phone").val() == '') {
      toastr.error("Pro dokončení rezervace prosím zadejte své telefonní číslo.");
      $("#patient_phone").focus();
      return false;
    }

    if (!isPhone($("#patient_phone").val())) {
      toastr.error("Pro dokončení rezervace prosím zadejte telefon ve formátu +420111222333.");
      $("#patient_phone").val('');
      $("#patient_phone").focus();
      return false;
    }
    bootbox.confirm({
        message: "Přejete se závazně objednat?",
        buttons: {
            confirm: {
                label: 'Ano',
                className: 'btn btn-sm btn-success'
            },
            cancel: {
                label: 'Ne',
                className: 'btn btn-sm btn-danger',
            }
        },
        callback: function (result) {
            if (result == true) {
              let data = $("#appointmentForm").serialize();
              spinnerOverlayShow();
              $.ajax({
                  url: '{{ route('appointment-form') }}',
                  type: 'POST',
                  data: data,
                  beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                  },
                  success: function (response) {
                    spinnerOverlayHide();
                    $(".appointment-form").addClass("hide").css("display", "none");
                    $(".appointment-success-message").fadeIn('slow').removeClass('hide');
                    toastr.success(response.success);
                  },
                  error: function (xhr) {
                    $.each(xhr.responseJSON.errors, function(key,value) {
                      toastr.error(value[0]);
                    });
                  }
              });
            }
        }
    });

  });
  function isEmail(email) {
    let regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  }
  function isPhone(phone){
    // let phoneRegex = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
    let phoneRegex = /^((\+[1-9]{1,4})|(\([0-9]{2,3}\))|([0-9]{2,4}))*?[0-9]{3,4}?[0-9]{3,4}?$/;
    return phoneRegex.test(phone);
  }


  $(document).on('click', '.specialist-undo-btn', function(e){
    $(".specialist-list").addClass("hide").css("display", "none");
    $(".categories-list").fadeIn('slow').removeClass('hide');
  });
  $(document).on('click', '.calendar-undo-btn', function(e){
    $(".specialist-calendar").addClass("hide").css("display", "none");
    $(".specialist-list").fadeIn('slow').removeClass('hide');
  });
  $(document).on('click', '.times-undo-btn', function(e){
    $(".specialist-available-time").addClass("hide").css("display", "none");
    $(".specialist-calendar").fadeIn('slow').removeClass('hide');
  });
  $(document).on('click', '.form-undo-btn', function(e){
    $(".appointment-form").addClass("hide").css("display", "none");
    $(".specialist-available-time").fadeIn('slow').removeClass('hide');
  });
</script>
</body>
</html>
