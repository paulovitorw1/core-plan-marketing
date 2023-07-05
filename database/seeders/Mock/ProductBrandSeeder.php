<?php

namespace Database\Seeders\Mock;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class ProductBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        DB::table('product_brand')->insert([
            ['id' => "3f64a5f6-a63d-499e-8627-d76907e5c3a5", 'name' => 'Electrolux', 'created_at' => $now, 'updated_at' => $now],
            ['id' => Str::uuid(), 'name' => 'Brastemp', 'created_at' => $now, 'updated_at' => $now],
            ['id' => Str::uuid(), 'name' => 'Fischer', 'created_at' => $now, 'updated_at' => $now],
            ['id' => Str::uuid(), 'name' => 'Samsung', 'created_at' => $now, 'updated_at' => $now],
            ['id' => Str::uuid(), 'name' => 'LG', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
