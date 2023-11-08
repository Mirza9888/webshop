<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        // Kreiraj uloge
//        $roleAdmin = Role::create(['name' => 'admin','guard_name'=>'web']);
//        $roleCustomer = Role::create(['name' => 'customer','guard_name'=>'web']);
//
//        // Kreiraj dozvole
//        $permViewAcc = Permission::create(['name' => 'view account','guard_name'=>'web']);
//        $permReceiveDiscount = Permission::create(['name' => 'receive discount','guard_name'=>'web']);
//        $permAccessDashboard = Permission::create(['name' => 'access dashboard','guard_name'=>'web']);
        // itd...

        // Dodaj dozvole ulozi Admin
//        $roleAdmin->givePermissionTo($permAccessDashboard);
//        // Dodaj dozvole ulozi Customer
//        $roleCustomer->givePermissionTo($permViewAcc);
//        $roleCustomer->givePermissionTo($permReceiveDiscount);
//        $roles=[''];
//
//        foreach ($roles as $role) {
//            Role::create([
//                'name' => $role,
//                'guard_name'=>'web'
//                ]);
//            $permission = Permission::create(['name' => 'edit articles','guard_name'=>'web']);
//        $roleAdmin->givePermissionTo($permAccessDashboard);
//        // Dodaj dozvole ulozi Customer
//        $roleCustomer->givePermissionTo($permViewAcc);
//        $roleCustomer->givePermissionTo($permReceiveDiscount);
        }
//    }
}
