<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = new \App\Comment;
        $comment->text = "Hello";

        $user_id = App\User::all()->first();
        $comment->user()->associate($user_id);
        $comment->save();

        $shoppinglist_id = App\Shoppinglist::all()->first();
        $comment->shoppinglist()->associate($shoppinglist_id);
        $comment->save();

        $comment1 = new \App\Comment;
        $comment1->text = "Hello";

        $user_id = App\User::all()->first();
        $comment1->user()->associate($user_id);
        $comment1->save();

        $shoppinglist_id = App\Shoppinglist::all()->last();
        $comment1->shoppinglist()->associate($shoppinglist_id);
        $comment1->save();

    }
}
