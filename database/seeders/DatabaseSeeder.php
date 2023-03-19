<?php

namespace Database\Seeders;

use App\Models\Barcode;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Kelas::create([
            'kelas' => 'XII RPL',
        ]);
        Kelas::create([
            'kelas' => 'XII AKL1',
        ]);
        Kelas::create([
            'kelas' => 'XII AKL2',
        ]);
        Kelas::create([
            'kelas' => 'XII OTKP1',
        ]);
        Kelas::create([
            'kelas' => 'XII OTKP2',
        ]);
        Kelas::create([
            'kelas' => 'XII BDP1',
        ]);
        Kelas::create([
            'kelas' => 'XII BDP2',
        ]);


        User::create([
            'name' => 'PanitiaRPL',
            'email' => 'panitiarpl@gmail.com',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => 'PanitiaAKL',
            'email' => 'panitiaakl@gmail.com',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => 'PanitiaAKL',
            'email' => 'panitiaotkp@gmail.com',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => 'PanitiaBDP',
            'email' => 'panitiabdp@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
