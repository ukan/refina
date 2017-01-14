<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_users')->truncate();
        DB::table('roles')->truncate();

        Sentinel::getRoleRepository()->createModel()->create([
            'slug' => 'super-admin',
            'name' => 'Super Administrator',
            'permissions' => [
                'backend' => true,
                'dashboard' => true,
                'role-management' => true,
                'user-trustee-management' => true,
                'directory-management' => true,
                'category-management' => true,
                'menu-management' => true,
                'user-management' => true,
            ],
            'is_super_admin' => true,
        ]);

        Sentinel::getRoleRepository()->createModel()->create([
            'slug' => 'member',
            'name' => 'Member',
            'permissions' => [],
        ]);
        Sentinel::getRoleRepository()->createModel()->create([
            'slug' => 'hq-admin',
            'name' => 'HQ Admin',
            'permissions' => [],
        ]);
    }
}
