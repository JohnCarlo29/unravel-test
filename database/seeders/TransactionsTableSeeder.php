<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = \App\Models\Customer::factory(5)->create();
        $products = \App\Models\Product::factory(5)->create();

        foreach($customers as $customer) {
            $product = $products->random();
            $quantity = random_int(1, $product->quantity);
            Transaction::create([
                'customer_id' => $customer->id,
                'product_id' => $product->id,
                'availed_quantity' => random_int(1, $product->quantity),
                'total' => $quantity * $product->price
            ]);
        }
    }
}
