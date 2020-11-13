<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('users')->insert([
            'name' => 'Amimul Ahsan',
            'username'=>'AnikaAhsan',
            'email' => 'anika@gmail.com',
            'password' => bcrypt('password'),
            'dob'=>Carbon::createFromDate(2011, 11,11),
        ]);

    }
}
