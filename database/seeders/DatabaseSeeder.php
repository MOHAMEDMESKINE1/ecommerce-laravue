<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;

use Illuminate\Database\Seeder;
use Database\Factories\OrderFactory;
use Database\Factories\ContactFactory;
use Database\Factories\PaymentFactory;
use Database\Factories\ProductFactory;
use Database\Factories\CategoryFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(5)->create();
        $category =Category::factory(5);
        $product =Product::factory(5);
        $order =  Order::factory(5);
        $payment =Payment::factory(5);
        $contact= Contact::factory(5);

        
        
        $product->create();
        $order->create();
        $category->create();
        $payment->create();
        $contact->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
