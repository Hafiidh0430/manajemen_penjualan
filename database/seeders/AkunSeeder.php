<?php

namespace Database\Seeders;

use App\Models\AkunModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $akuns = [
            [
                'username' => 'admin',
                'password' => Hash::make(1234),
                'level' => 'admin'
            ],
            [
                'username' => 'jual',
                'password' => Hash::make(1234),
                'level' => 'jual'
            ],
            [
                'username' => 'barang',
                'password' => Hash::make(1234),
                'level' => 'barang'
            ],
            [
                'username' => 'beli',
                'password' => Hash::make(1234),
                'level' => 'beli'
            ]
        ];
        foreach ($akuns as $akun) {
            AkunModel::create($akun);
        }
    }
}
