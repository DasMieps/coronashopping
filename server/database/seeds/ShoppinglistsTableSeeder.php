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
        $shoppinglist->shopper()->associate(null);
        $shoppinglist->save();

        $shoppinglist->actual_price = 15;

        $shoppinglist->save();


        $shoppinglist1 = new \App\Shoppinglist;
        $shoppinglist1->name = "Babsis zweite Liste";

        $creator_id = App\User::all()->first();
        $shoppinglist1->creator()->associate($creator_id);
        $shoppinglist1->save();

        $shoppinglist1->due_date = new DateTime();

        $shopper_id = App\User::all()->first();
        $shoppinglist1->shopper()->associate(null);
        $shoppinglist1->save();

        $shoppinglist1->actual_price = null;

        $shoppinglist1->save();


        $shoppinglist2 = new \App\Shoppinglist;
        $shoppinglist2->name = "Ellis Liste";

        $creator_id = App\User::all()->first();
        $shoppinglist2->creator()->associate(3);
        $shoppinglist2->save();

        $shoppinglist2->due_date = new DateTime();

        $shopper_id = null;
        $shoppinglist2->shopper()->associate(null);
        $shoppinglist2->save();

        $shoppinglist2->actual_price = null;

        $shoppinglist2->save();
    }


}
