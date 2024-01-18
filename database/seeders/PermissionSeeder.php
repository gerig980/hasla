<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //dashboard module
        $moduleAppDashboard = Module::updateOrCreate(['name' => 'Paneli']);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppDashboard->id,
            'name' => 'Paneli',
            'slug' => 'app.dashboard'
        ]);

        //dashboard module
        $moduleAppAdmins = Module::updateOrCreate(['name' => 'Adminët']);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppAdmins->id,
            'name' => 'Lista',
            'slug' => 'app.admins.index'
        ]);
        
        //role module
        $moduleAppRole = Module::updateOrCreate(['name' => 'Rolet']);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Lista',
            'slug' => 'app.roles.index'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Krijimi',
            'slug' => 'app.roles.create'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Editimi',
            'slug' => 'app.roles.edit'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Fshirja',
            'slug' => 'app.roles.destroy'
        ]);
        
        //user module
        $moduleAppUser = Module::updateOrCreate(['name' => 'Përdoruesit']);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Lista',
            'slug' => 'app.users.index'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Krijimi',
            'slug' => 'app.users.create'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Editimi',
            'slug' => 'app.users.edit'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Fshirja',
            'slug' => 'app.users.destroy'
        ]);

        // product module
        $moduleAppProduct = Module::updateOrCreate(['name' => 'Produkti']);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppProduct->id,
            'name' => 'Lista',
            'slug' => 'app.product.index'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppProduct->id,
            'name' => 'Krijimi',
            'slug' => 'app.product.create'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppProduct->id,
            'name' => 'Editimi',
            'slug' => 'app.product.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppProduct->id,
            'name' => 'Detajet',
            'slug' => 'app.product.show'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppProduct->id,
            'name' => 'Fshirja',
            'slug' => 'app.product.destroy'
        ]);

        // attributes module
        $moduleAppAttributes = Module::updateOrCreate(['name' => 'Atributet']);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppAttributes->id,
            'name' => 'Lista',
            'slug' => 'app.attributes.index'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppAttributes->id,
            'name' => 'Krijimi',
            'slug' => 'app.attributes.create'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppAttributes->id,
            'name' => 'Editimi',
            'slug' => 'app.attributes.edit'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppAttributes->id,
            'name' => 'Fshirja',
            'slug' => 'app.attributes.destroy'
        ]);

        // categories module
        $moduleAppCategories = Module::updateOrCreate(['name' => 'Kategoritë']);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppCategories->id,
            'name' => 'Lista',
            'slug' => 'app.categories.index'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppCategories->id,
            'name' => 'Krijimi',
            'slug' => 'app.categories.create'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppCategories->id,
            'name' => 'Editimi',
            'slug' => 'app.categories.edit'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppCategories->id,
            'name' => 'Fshirja',
            'slug' => 'app.categories.destroy'
        ]);

        // coupons module
        $moduleAppCoupons = Module::updateOrCreate(['name' => 'Kuponët']);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppCoupons->id,
            'name' => 'Lista',
            'slug' => 'app.coupons.index'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppCoupons->id,
            'name' => 'Krijimi',
            'slug' => 'app.coupons.create'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppCoupons->id,
            'name' => 'Editimi',
            'slug' => 'app.coupon.edit'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppCoupons->id,
            'name' => 'Fshirja',
            'slug' => 'app.coupons.destroy'
        ]);

        // filter attributes module
        $moduleAppFilterAttributes = Module::updateOrCreate(['name' => 'Atributet e filtrave']);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppFilterAttributes->id,
            'name' => 'Lista',
            'slug' => 'app.filter-attributes.index'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppFilterAttributes->id,
            'name' => 'Krijimi',
            'slug' => 'app.filter-attributes.create'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppFilterAttributes->id,
            'name' => 'Editimi',
            'slug' => 'app.filter-attributes.edit'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppFilterAttributes->id,
            'name' => 'Fshirja',
            'slug' => 'app.filter-attributes.destroy'
        ]);

        // size guides module
        $moduleAppSizeGuide = Module::updateOrCreate(['name' => 'Guida e përmasave']);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppSizeGuide->id,
            'name' => 'Lista',
            'slug' => 'app.size-guides.index'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppSizeGuide->id,
            'name' => 'Krijimi',
            'slug' => 'app.size-guides.create'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppSizeGuide->id,
            'name' => 'Editimi',
            'slug' => 'app.size-guides.edit'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppSizeGuide->id,
            'name' => 'Fshirja',
            'slug' => 'app.size-guides.destroy'
        ]);

        // tags module
        $moduleAppTags = Module::updateOrCreate(['name' => 'Etiketat e produktit']);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppTags->id,
            'name' => 'Lista',
            'slug' => 'app.tags.index'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppTags->id,
            'name' => 'Krijimi',
            'slug' => 'app.tags.create'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppTags->id,
            'name' => 'Editimi',
            'slug' => 'app.tags.edit'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppTags->id,
            'name' => 'Fshirja',
            'slug' => 'app.tags.destroy'
        ]);

        // pos module
        $moduleAppPos = Module::updateOrCreate(['name' => 'Point of Sales (POS)']);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppPos->id,
            'name' => 'Krijimi',
            'slug' => 'app.pos.index'
        ]);

        // orders module
        $moduleAppOrders = Module::updateOrCreate(['name' => 'Porositë']);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppOrders->id,
            'name' => 'Lista',
            'slug' => 'app.orders.index'
        ]);

        // countries module
        $moduleAppCountries = Module::updateOrCreate(['name' => 'Shtetet dhe Qytetet']);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppCountries->id,
            'name' => 'Lista',
            'slug' => 'app.countries.index'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppCountries->id,
            'name' => 'Krijimi',
            'slug' => 'app.countries.create'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppCountries->id,
            'name' => 'Editimi',
            'slug' => 'app.countries.edit'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppCountries->id,
            'name' => 'Fshirja',
            'slug' => 'app.countries.destroy'
        ]);

        // collections module
        $moduleAppCollections = Module::updateOrCreate(['name' => 'Koleksionet']);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppCollections->id,
            'name' => 'Lista',
            'slug' => 'app.collections.index'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppCollections->id,
            'name' => 'Krijimi',
            'slug' => 'app.collections.create'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppCollections->id,
            'name' => 'Editimi',
            'slug' => 'app.collections.edit'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppCollections->id,
            'name' => 'Fshirja',
            'slug' => 'app.collections.destroy'
        ]);

        // customer module
        $moduleAppCustomers = Module::updateOrCreate(['name' => 'Klientët']);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppCustomers->id,
            'name' => 'Lista',
            'slug' => 'app.customers.index'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppCustomers->id,
            'name' => 'Krijimi',
            'slug' => 'app.customers.create'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppCustomers->id,
            'name' => 'Editimi',
            'slug' => 'app.customers.edit'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppCustomers->id,
            'name' => 'Fshirja',
            'slug' => 'app.customers.destroy'
        ]);
        
        // flash sales module
        $moduleAppFlashSales = Module::updateOrCreate(['name' => 'Flash Sale']);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppFlashSales->id,
            'name' => 'Lista',
            'slug' => 'app.flash-sale.index'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppFlashSales->id,
            'name' => 'Krijimi',
            'slug' => 'app.flash-sale.create'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppFlashSales->id,
            'name' => 'Editimi',
            'slug' => 'app.flash-sale.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppFlashSales->id,
            'name' => 'Fshirja',
            'slug' => 'app.flash-sale.destroy'
        ]);

        // payment methods module
        $moduleAppPayments = Module::updateOrCreate(['name' => 'Metodat e pagesës']);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppPayments->id,
            'name' => 'Lista',
            'slug' => 'app.payment-methods.index'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppPayments->id,
            'name' => 'Fshirja',
            'slug' => 'app.payment-methods.destroy'
        ]);
    
        // sliders module
        $moduleAppSliders = Module::updateOrCreate(['name' => 'Sliders']);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppSliders->id,
            'name' => 'Lista',
            'slug' => 'app.sliders.index'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppSliders->id,
            'name' => 'Krijimi',
            'slug' => 'app.sliders.create'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppSliders->id,
            'name' => 'Editimi',
            'slug' => 'app.sliders.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppSliders->id,
            'name' => 'Fshirja',
            'slug' => 'app.sliders.destroy'
        ]);

        // banners module
        $moduleAppBanners = Module::updateOrCreate(['name' => 'Banerat']);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppBanners->id,
            'name' => 'Lista',
            'slug' => 'app.banners.index'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppBanners->id,
            'name' => 'Krijimi',
            'slug' => 'app.banners.create'
        ]);
        
        Permission::updateOrCreate([
            'module_id' => $moduleAppBanners->id,
            'name' => 'Editimi',
            'slug' => 'app.banners.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppBanners->id,
            'name' => 'Fshirja',
            'slug' => 'app.banners.destroy'
        ]);

        
    }
}
