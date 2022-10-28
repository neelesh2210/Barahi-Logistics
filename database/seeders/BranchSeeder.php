<?php

namespace Database\Seeders;

use App\Models\Admin\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::create([
            'branch_code' => 'H.O',
            'branch_name' => 'Head Office'
        ]);
    }
}
