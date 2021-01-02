<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('items')->truncate();

        $items = [
            [
                'item_id' => '1',
                'item_name' => 'プログラム',
                'detail' => 'プログラムについての解説',
                'price' => '100',
                'image' => 'image',
                'ctg_id' => '1',
                'subctg_id' => '1',
                'user_id' => '1',
                'delete_flg' => '0',
            ],
            [
                'item_id' => '2',
                'item_name' => 'ダイエット',
                'detail' => 'ダイエットについての解説',
                'price' => '200',
                'image' => 'image',
                'ctg_id' => '1',
                'subctg_id' => '2',
                'user_id' => '2',
                'delete_flg' => '0',
            ],
            [
                'item_id' => '3',
                'item_name' => 'ダイエット',
                'detail' => 'ダイエットについての解説',
                'price' => '300',
                'image' => 'image',
                'ctg_id' => '1',
                'subctg_id' => '2',
                'user_id' => '2',
                'delete_flg' => '0',
            ],
        ];

        foreach ($items as $item) {
            \App\Item::create($item);
        }
    }
}
