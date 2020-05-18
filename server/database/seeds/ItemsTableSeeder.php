<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new \App\Item;
        $item->name = "Paprika";
        $item->quantity = 5;
        $item->max_price = 5;
        $item->shoppinglist_id = 1;

        $item->save();

        $item1 = new \App\Item;
        $item1->name = "Apfel";
        $item1->quantity = 6;
        $item1->max_price = 5;
        $item1->shoppinglist_id = 1;

        $item1->save();

        $item2 = new \App\Item;
        $item2->name = "Gurke";
        $item2->quantity = 2;
        $item2->max_price = 2;
        $item2->shoppinglist_id = 2;

        $item2->save();

        $item3 = new \App\Item;
        $item3->name = "Salat";
        $item3->quantity = 3;
        $item3->max_price = 3;
        $item3->shoppinglist_id = 2;

        $item3->save();

        $item4 = new \App\Item;
        $item4->name = "Bohnen";
        $item4->quantity = 3;
        $item4->max_price = 3;
        $item4->shoppinglist_id = 3;

        $item4->save();

        $item5 = new \App\Item;
        $item5->name = "Eistee";
        $item5->quantity = 3;
        $item5->max_price = 3;
        $item5->shoppinglist_id = 3;

        $item5->save();
    }
}
