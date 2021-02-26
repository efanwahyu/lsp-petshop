<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
        	'name'=>'Admin Efan',
            'email'=>'AdminEfan@admin.com',
            'password'=>bcrypt('adminefan'),
            'created_at'=>\Carbon\Carbon::now('Asia/Jakarta')
        ]);
    }
}
