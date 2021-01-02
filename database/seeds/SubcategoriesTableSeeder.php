<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('subcategories')->truncate();

        $subcategories = [
            [
                'category_name' => '運動・ダイエット',
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'category_name' => 'プログラミング',
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'category_name' => 'ゲーム',
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'category_name' => '小説',
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'category_name' => '雑貨',
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'category_name' => '写真',
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'category_name' => '映像',
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'category_name' => '動物知識',
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'category_name' => '調理・レシピ',
                'created_at' => time(),
                'updated_at' => time(),
            ],
        ];

        foreach ($subcategories as $subcategory) {
            \App\Subcategory::create($subcategory);
        }
    }
}
