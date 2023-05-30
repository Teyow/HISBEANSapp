<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Vouchers;
use App\Models\Items;
use App\Models\Addons;

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
            'status' => 'enable',
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
            'id' => '1',
            'addons_name' => 'Ice Cream',
            'price' => '30'
        ]);
    }
}
