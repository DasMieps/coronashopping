<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User;
        $user->firstName = "Babs";
        $user->lastName = "Meep";
        $user->email = "meep@mail.com";
        $user->password = bcrypt('secret');
        $user->city = "Linz";
        $user->plz = 4020;
        $user->street = "Linzerstr. 40";
        $user->role = "creator";

        $user->save();

        $user1 = new \App\User;
        $user1->firstName = "Ella";
        $user1->lastName = "TheBee";
        $user1->email = "thebee@mail.com";
        $user1->password = bcrypt('secret123');
        $user1->city = "Linz";
        $user1->plz = 4020;
        $user1->street = "Linzerstr. 40";
        $user1->role = "shopper";

        $user1->save();

        $user2 = new \App\User;
        $user2->firstName = "Elli";
        $user2->lastName = "Linhel";
        $user2->email = "linhel@mail.com";
        $user2->password = bcrypt('bucky');
        $user2->city = "Linz";
        $user2->plz = 4020;
        $user2->street = "Linzerstr. 40";
        $user2->role = "creator";

        $user2->save();
    }
}
