<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Vouchers;
use App\Models\Items;
use App\Models\Addons;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => '1',
            'fname' => 'Admin',
            'lname' => '123',
            'username' => 'admin123',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'Admin',
            'cnumber' => '0925778545',
            'pincode' => '1111',
            'status' => 'Enable',
            'email_verified_at' => now()
        ]);

        Vouchers::create([
            'id' => '1',
            'type_of_voucher' => 'Coupon',
            'voucher_name' => 'December Blast 2023',
            'voucher_code' => 'DB2023',
            'minimum_order' => '200',
            'valid_until' => 'September 14, 2023',
            'promo_details' => '20% Discount For 2 coffee',
            'voucher_discount' => '20',
            'discount_type' => 'Percent',
            'status' => 'Enable'
        ]);

        Items::create([
            'id' => '1',
            'name' => 'Coffee Beans',
            'cost_price' => '1500',
            'selling_price' => '2000',
            'quantity' => '50',
            'product_id' => '16554',
            'supplier' => 'Coffee Beans Inc.',
        ]);



        Addons::create([
            'addons_name' => 'Ice Cream',
            'addons_price' => '30'
        ]);

        Addons::create([
            'addons_name' => "Espresso Shot",
            'addons_price' => "30"
        ]);
        Addons::create([
            'addons_name' => "Whipping Cream",
            'addons_price' => "30"
        ]);
        Addons::create([
            'addons_name' => "Choco Chips",
            'addons_price' => "30"
        ]);
        Addons::create([
            'addons_name' => "Chocolate Sauce",
            'addons_price' => "25"
        ]);
        Addons::create([
            'addons_name' => "Caramel Sauce",
            'addons_price' => "25"
        ]);
        Addons::create([
            'addons_name' => "Strawberry Sauce",
            'addons_price' => "25"
        ]);
        Addons::create([
            'addons_name' => "Honey",
            'addons_price' => "25"
        ]);
        Addons::create([
            'addons_name' => "Vanilla Syrup",
            'addons_price' => "20"
        ]);
        Addons::create([
            'addons_name' => "Caramel Syrup Syrup",
            'addons_price' => "20"
        ]);
        Addons::create([
            'addons_name' => "Condensed Milk",
            'addons_price' => "20"
        ]);

        DB::table('category')
            ->insert([
                'category_name' => "Coffee",
                'category_description' => "Coffee based",
                'status' => "Enabled",
            ]);

        DB::table('menu')
            ->insert([
                'item_name' => 'Americano',
                'item_description' => "Espresso shot + Water",
                'price' => '120',
                'category' => "Coffee",
                'is_featured' => "Featured",
                'status' => "Enable",
                'image_path' => "1685322737-Americano.jpg"
            ]);
    }
}
