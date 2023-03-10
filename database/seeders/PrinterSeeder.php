<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrinterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'name' => 'Hp Jet',
                'desc' => 'dsadsa',
                'qty' => 10,
                'price' => 2000000,
                'img' => 'hp.jpg',
            ],
            [
                'name' => 'Brother',
                'desc' => 'dsadsa',
                'qty' => 3,
                'price' => 700000,
                'img' => 'brother.jpg',
            ],
            [
                'name' => 'Canon',
                'desc' => 'dsadsa',
                'qty' => 22,
                'price' => 200000,
                'img' => 'canon.png',
            ],
            [
                'name' => 'Epson',
                'desc' => 'dsadsa',
                'qty' => 22,
                'price' => 200000,
                'img' => 'epson.jpg',
            ],
        ];

        DB::table('printers')->insert($data); // Query Builder approach
    }
}
