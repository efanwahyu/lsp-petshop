<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('merks')->insert([
        	'nama' => 'Bundes Liga',
        	'merk' => 'Jerman',
        	'gambar' => 'bundesliga.png',
        ]);

        DB::table('merks')->insert([
        	'nama' => 'Premier League',
        	'merk' => 'Inggris',
        	'gambar' => 'premierleague.png',
        ]);

        DB::table('merks')->insert([
        	'nama' => 'La Liga',
        	'merk' => 'Spanyol',
        	'gambar' => 'laliga.png',
        ]);

        DB::table('merks')->insert([
        	'nama' => 'Serie A',
        	'merk' => 'Itali',
        	'gambar' => 'seriea.png',
        ]);
    }
}
