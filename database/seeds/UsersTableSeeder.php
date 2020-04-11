<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'category_id'    => null,
                'designation'    => '',
                'description'    =>'',                
                'password'       => bcrypt('12345678'),
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Ingr. Mgr. Felix S. Ratzenbeck',
                'email'          => 'Felix@admin.com',
                'category_id'    => '1',
                'designation'    => 'MSc. - leading psychologist',
                'description'    =>'Felix Ratzenbeck is a graduate of a one-disciplinary psychology program and a 5-year self-experience psychotherapeutic training, and also studied economics and management. He is the founder and leading psychologist at the Institute of Dermatopsychology. He has been working for a long time at the Institute of Partner Relations, dealing with personal development and stress management. He has published dozens of popular and popular scientific articles and actively participates in Czech and foreign professional conferences on psychological and dermatovenerological topics.',
                'password'       => md5('12345678'),
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                'name'           => 'Mgr. Celestýna Kysmanová',
                'email'          => 'some1@admin.com',
                'category_id'    => '2',
                'designation'    => 'stress management',
                'description'    =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate dignissimos tempora consequuntur, voluptas, accusantium mollitia fuga ad laudantium iusto nesciunt recusandae reiciendis dolores ex, optio incidunt quasi quam! Similique obcaecati doloribus, dolore commodi aspernatur totam. Iste quam magni vero nostrum maiores ut odio ipsum, mollitia eos command facere necessitatibus voluptatem.',
                'password'       => md5('12345678'),
                'remember_token' => null,
            ],
            [
                'id'             => 4,
                'name'           => 'MUDr. Barbora Hirnerová',
                'email'          => 'some@admin.com',
                'category_id'    => '3',
                'designation'    => 'accupuncture',
                'description'    =>'In 2007 she graduated from the 1st Medical Faculty of Charles University in Prague. In 2012, she attended General Practice Medicine. During her studies she completed a course in sports and reconditioning massage and Hawaiian massage. In 2010-2011 she completed a course in acupuncture and myoskeletal medicine. She is currently attending psychotherapeutic training in family and partner psychotherapy in Liberec and is preparing for attestation in psychosomatic medicine.',
                'password'       => md5('12345678'),
                'remember_token' => null,
            ],
                                   
        ];  

        User::insert($users);
        factory('App\User', 50)->create();
    }
}
