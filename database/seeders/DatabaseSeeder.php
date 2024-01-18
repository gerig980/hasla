<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(TaxSeeder::class);
        $this->call(AttributeSeeder::class);
        $this->call(AttributeValueSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(FilterAttributeSeeder::class);
        $this->call(FilterAttributeValueSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(CollectionSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(OrderStatusSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(FlashSaleSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(CouponSeeder::class);
        $this->call(PostDeliverySeeder::class);

    }
}