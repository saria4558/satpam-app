<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class buku_paket extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('buku_paket')->insert([
            'penerima'=>'upin',
            'pengirim' =>'ipin',
            'expedisi'=>'Shopee',
            'telepon'=>'088888888888',
            'dokumentasi'=>'D:\semester 5\caremal\caremal\public\assets\img\image 1.png',
            'status'=>'waiting',
        ]);
    }
}
