<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class createseedersbarang extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barang::create([
            'nama' => 'barang_a',
            'harga' => '20000',
            'jumlah' => '10',
        ]);
        Barang::create([
            'nama' => 'barang_b',
            'harga' => '30000',
            'jumlah' => '20',
        ]);
        Barang::create([
            'nama' => 'barang_c',
            'harga' => '25000',
            'jumlah' => '15',
        ]);
    }
}
