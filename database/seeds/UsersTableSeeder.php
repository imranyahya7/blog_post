<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!is_array(User::where('id',1)->get())){
            DB::table('users')->insert([
                'name' => 'imran',
                'email' => 'imran@gmail.com',
                'password' => Hash::make('123456789'),
                'email_verified_at' => date('Y-m-d'),
            ]);
        }
    }
}
