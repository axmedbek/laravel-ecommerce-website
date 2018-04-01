<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        User::truncate();
        \App\UserDetail::truncate();

        $admin = User::create([
            'fullname' => 'Ahmad Bek',
            'email'    => 'axmed123@mail.ru',
            'password' => bcrypt('123456'),
            'status'   => 1,
            'is_admin' => 1
        ]);

        $admin->userDetail()->create([
            'address' => 'London',
            'phone'   => '(012)-512-55-66',
            'mobile_phone' => '(077)-777-77-77'
        ]);


        for ($i=0;$i<50;$i++){
            $user = User::create([
                'fullname' => $faker->name,
                'email'    => $faker->unique()->safeEmail,
                'password' => bcrypt('123456'),
                'status'   => 1,
                'is_admin' => 0
            ]);

            $user->userDetail()->create([
                'address' => $faker->address,
                'phone'   => $faker->e164phoneNumber,
                'mobile_phone' => $faker->e164phoneNumber
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
