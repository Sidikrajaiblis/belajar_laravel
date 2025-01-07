<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class barangsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barang = [
            ['nama_barang' => 'jam', 'merk' => 'gucci', 'harga' => 100000],
            ['nama_barang' => 'sepatu', 'merk' => 'nike', 'harga' => 200000],
            ['nama_barang' => 'tas', 'merk' => 'hermes', 'harga' => 300000],
            ['nama_barang' => 'kacamata', 'merk' => 'rayban', 'harga' => 400000],
            ['nama_barang' => 'topi', 'merk' => 'new era', 'harga' => 500000],
        ];
        DB::table('barang')->insert($barang);
    }
}
