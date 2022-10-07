<?php

namespace Database\Seeders;

use App\Models\Vendor\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vendor::create([
            'name' => 'Vendor',
            'phone' => '7271001995',
            'password' => Hash::make('123456789'),
        ]);
    }
}
