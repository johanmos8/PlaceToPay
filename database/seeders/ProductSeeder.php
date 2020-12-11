<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //it's added new product to generate orders
        $product=new Product();
        $product->name="Fc Barcelona";
        $product->description="Oficial jersey for season 2021";
        $product->image="images/barcelona.jpg";
        $product->price="$19.99";
        $product->save();

        //it's added new product to generate orders
        $product=new Product();
        $product->name="Real Madrid FC";
        $product->description="Oficial jersey for season 2021";
        $product->image="images/real_madrid.png";
        $product->price="$19.99";
        $product->save();

        //it's added new product to generate orders
        $product=new Product();
        $product->name="Atalanta";
        $product->description="Oficial jersey for season 2021";
        $product->image="images/atalanta.png";
        $product->price="$19.99";
        $product->save();
    }
}
