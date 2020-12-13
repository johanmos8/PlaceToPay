<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //it's added new product to generate orders
        $user = new User();
        $user->name = "Test";
        $user->email = "test@evertec.com";
        $user->password = "$2y$10\$xO4atsGDX6UffN.DUQcZ5.QfeZAKPcPh8ahoABbVcx3uMBG9F9c.S";
        $user->save();
    }
}
