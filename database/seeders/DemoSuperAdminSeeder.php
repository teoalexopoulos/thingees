<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\User\Entities\Role;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\Hash;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

class DemoSuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdminUser = User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'superadmin@email.com',
            'phone' => '0123456789',
            'password' => Hash::make('j4xxCc7^4R['),
        ]);

        $activation = Activation::create($superAdminUser);
        Activation::complete($superAdminUser, $activation->code);

        $superAdminRole = $this->createSuperAdminRole();
        $superAdminUser->roles()->attach($superAdminRole);
    }


    private function createSuperAdminRole()
    {
        return Role::create([
            'name' => 'Super Admin',
            'permissions' => $this->getAdminRolePermissions(),
        ]);
    }


    private function getAdminRolePermissions(): array
    {
        return [
            # users
            'admin.users.index' => true,
            'admin.users.create' => true,
            'admin.users.edit' => true,
            'admin.users.destroy' => true,
            # roles
            'admin.roles.index' => true,
            'admin.roles.create' => true,
            'admin.roles.edit' => true,
            'admin.roles.destroy' => true,
            # products
            'admin.products.index' => true,
            'admin.products.create' => true,
            'admin.products.edit' => true,
            'admin.products.destroy' => true,
            # brands
            'admin.brands.index' => true,
            'admin.brands.create' => true,
            'admin.brands.edit' => true,
            'admin.brands.destroy' => true,
            # attributes
            'admin.attributes.index' => true,
            'admin.attributes.create' => true,
            'admin.attributes.edit' => true,
            'admin.attributes.destroy' => true,
            # attribute sets
            'admin.attribute_sets.index' => true,
            'admin.attribute_sets.create' => true,
            'admin.attribute_sets.edit' => true,
            'admin.attribute_sets.destroy' => true,
            #variations
            'admin.variations.index' => true,
            'admin.variations.create' => true,
            'admin.variations.edit' => true,
            'admin.variations.destroy' => true,
            # options
            'admin.options.index' => true,
            'admin.options.create' => true,
            'admin.options.edit' => true,
            'admin.options.destroy' => true,
            # filters
            'admin.filters.index' => true,
            'admin.filters.create' => true,
            'admin.filters.edit' => true,
            'admin.filters.destroy' => true,
            # reviews
            'admin.reviews.index' => true,
            'admin.reviews.create' => true,
            'admin.reviews.edit' => true,
            'admin.reviews.destroy' => true,
            # categories
            'admin.categories.index' => true,
            'admin.categories.create' => true,
            'admin.categories.edit' => true,
            'admin.categories.destroy' => true,
            # tags
            'admin.tags.index' => true,
            'admin.tags.create' => true,
            'admin.tags.edit' => true,
            'admin.tags.destroy' => true,
            # orders
            'admin.orders.index' => true,
            'admin.orders.show' => true,
            'admin.orders.edit' => true,
            # flash sales
            'admin.flash_sales.index' => true,
            'admin.flash_sales.create' => true,
            'admin.flash_sales.edit' => true,
            'admin.flash_sales.destroy' => true,
            # transactions
            'admin.transactions.index' => true,
            # coupons
            'admin.coupons.index' => true,
            'admin.coupons.create' => true,
            'admin.coupons.edit' => true,
            'admin.coupons.destroy' => true,
            # menus
            'admin.menus.index' => true,
            'admin.menus.create' => true,
            'admin.menus.edit' => true,
            'admin.menus.destroy' => true,
            'admin.menu_items.index' => true,
            'admin.menu_items.create' => true,
            'admin.menu_items.edit' => true,
            'admin.menu_items.destroy' => true,
            # Media
            'admin.media.index' => true,
            'admin.media.create' => true,
            'admin.media.destroy' => true,
            # pages
            'admin.pages.index' => true,
            'admin.pages.create' => true,
            'admin.pages.edit' => true,
            'admin.pages.destroy' => true,
            # currency rates
            'admin.currency_rates.index' => true,
            'admin.currency_rates.edit' => true,
            # tax
            'admin.taxes.index' => true,
            'admin.taxes.create' => true,
            'admin.taxes.edit' => true,
            'admin.taxes.destroy' => true,
            # translations
            'admin.translations.index' => true,
            'admin.translations.edit' => true,
            # appearance
            'admin.sliders.index' => true,
            'admin.sliders.create' => true,
            'admin.sliders.edit' => true,
            'admin.sliders.destroy' => true,
            # reports
            'admin.reports.index' => true,
            # settings
            'admin.settings.edit' => true,
            # storefront
            'admin.storefront.edit' => true,
        ];
    }
}
