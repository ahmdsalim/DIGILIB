<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create(
            [
                'uuid' => generateUuid(),
                'nama' => 'Owner 1',
                'email' => 'owner@digilib.com',
                'password' => 'owner',
                'role' => 'owner',
                'active' => 1,
            ]
        );

        User::create(
            [
                'uuid' => generateUuid(),
                'nama' => 'Sekolah A',
                'email' => 'sekolah@digilib.com',
                'password' => 'sekolah123',
                'userable_type' => 'App\Models\Sekolah',
                'userable_id' => 1,
                'role' => 'sekolah',
                'active' => 1,
            ]
        );

        User::create(
            [
                'uuid' => generateUuid(),
                'nama' => 'Siswa',
                'email' => 'siswa@digilib.com',
                'password' => 'siswa123',
                'userable_type' => 'App\Models\Siswa',
                'userable_id' => 1,
                'role' => 'siswa',
                'active' => 1,
            ]
        );
    }
}
