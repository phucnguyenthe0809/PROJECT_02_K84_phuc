<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(Category::class);
        $this->call(Product::class);
        $this->call(Order::class);
        $this->call(ProductOrder::class);
        $this->call(Users::class);
        $this->call(info::class);
    }
}
