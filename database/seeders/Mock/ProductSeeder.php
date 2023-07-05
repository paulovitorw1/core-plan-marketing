<?php

namespace Database\Seeders\Mock;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        DB::table('products')->insert([
            [
                'id' => Str::uuid(), 'product_brand_id' => '3f64a5f6-a63d-499e-8627-d76907e5c3a5',
                'name' => 'Teste 01',
                'description' => 'Este produto é totalmente versátil. Tudo para ser personalizado para comportar o que você preferir.',
                'voltage' => "220V",
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => Str::uuid(), 'product_brand_id' => '3f64a5f6-a63d-499e-8627-d76907e5c3a5',
                'name' => 'Teste 02',
                'description' => 'Este produto é totalmente versátil. Tudo para ser personalizado para comportar o que você preferir.',
                'voltage' => "220V",
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => Str::uuid(), 'product_brand_id' => '3f64a5f6-a63d-499e-8627-d76907e5c3a5',
                'name' => 'Teste 03',
                'description' => 'Este produto é totalmente versátil. Tudo para ser personalizado para comportar o que você preferir.',
                'voltage' => "220V",
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => Str::uuid(), 'product_brand_id' => '3f64a5f6-a63d-499e-8627-d76907e5c3a5',
                'name' => 'Teste 04',
                'description' => 'Este produto é totalmente versátil. Tudo para ser personalizado para comportar o que você preferir.',
                'voltage' => "220V",
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
