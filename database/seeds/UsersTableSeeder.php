<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id'   => '1',
            'nama'      => 'Administrator',
            'nrp'       => '123456789',
            'foto'      => 'default.jpg',
            'password'  => Hash::make('123456789')
        ]);

        DB::table('users')->insert([
            'role_id'   => '2',
            'nama'      => 'Bule',
            'nrp'       => '001012025',
            'foto'      => 'default.jpg',
            'password'  => Hash::make('bule123')
        ]);

        DB::table('users')->insert([
            'role_id'   => '2',
            'nama'      => 'Ardi',
            'nrp'       => '002012025',
            'foto'      => 'default.jpg',
            'password'  => Hash::make('ardi123')
        ]);

        DB::table('users')->insert([
            'role_id'   => '2',
            'nama'      => 'Reyhandi',
            'nrp'       => '003012025',
            'foto'      => 'default.jpg',
            'password'  => Hash::make('rey123')
        ]);

        DB::table('users')->insert([
            'role_id'   => '2',
            'nama'      => 'Rayya',
            'nrp'       => '004012025',
            'foto'      => 'default.jpg',
            'password'  => Hash::make('rayya123')
        ]);
    }
}
