<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Kreiraj uloge
        $roleAdmin = Role::create(['name' => 'Admin','guard_name'=>'web']);
        $roleCustomer = Role::create(['name' => 'Customer','guard_name'=>'web']);
        $roleGuest = Role::create(['name' => 'Guest','guard_name'=>'web']);

//      Permission::create(['name' => 'access dashboard','guard_name'=>'web']);

        $vozila = new Category;
        $vozila->name = 'Vozila';
        $vozila->parent_id = null; // null for a main category
        $vozila->save();

        // Category 2
        $nekretnine = new Category;
        $nekretnine->name = 'Nekretnine';
        $nekretnine->parent_id =null ; // null for a main category
        $nekretnine->save();

        // Category 3
        $tehnologija = new Category;
        $tehnologija->name = 'Tehnologija';
        $tehnologija->parent_id = null; // null for a main category
        $tehnologija->save();









    }
}
