<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CategoriesTablSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            DB::table('categories')->insert([
            'name' => 'E-commerce']);
            DB::table('categories')->insert([
            'name' => 'IT']);
            DB::table('categories')->insert([
            'name' => 'Textile']);
    }
}
