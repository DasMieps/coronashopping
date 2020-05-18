<?php

use Illuminate\Database\Seeder;


class ShoppinglistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shoppinglist = new \App\Shoppinglist;
        $shoppinglist->name = "Babsis Liste";

        $creator_id = App\User::all()->first();
        $shoppinglist->creator()->associate($creator_id);
        $shoppinglist->save();

        $shoppinglist->due_date = new DateTime();

        $shopper_id = App\User::all()->first();
        $shoppinglist->shopper()->associate($shopper_id);
        $shoppinglist->save();

        $shoppinglist->actual_price = 15.1;

        $shoppinglist->save();


        $shoppinglist1 = new \App\Shoppinglist;
        $shoppinglist1->name = "Babsis zweite Liste";

        $creator_id = App\User::all()->first();
        $shoppinglist1->creator()->associate($creator_id);
        $shoppinglist1->save();

        $shoppinglist1->due_date = new DateTime();

        $shopper_id = App\User::all()->first();
        $shoppinglist1->shopper()->associate($shopper_id);
        $shoppinglist1->save();

        $shoppinglist1->actual_price = 12;

        $shoppinglist1->save();
    }


}
