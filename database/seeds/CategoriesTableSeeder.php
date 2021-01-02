<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;



class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->truncate();

        $categories = [
            [
                'category_name' => 'アイテム',
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'category_name' => 'HOW TO',
                'created_at' => time(),
                'updated_at' => time(),
            ],
            [
                'category_name' => 'イベント',
                'created_at' => time(),
                'updated_at' => time(),
            ],
        ];

        foreach ($categories as $category) {
            \App\Category::create($category);
        }
    }
}
