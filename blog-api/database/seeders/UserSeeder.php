<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. add permissions
        $canViewAllUsers = Permission::create(['name' => 'canViewAllUsers']); //admin
        $canDeleteUser = Permission::create(['name' => 'canDeleteUser']); //admin
        $canCreateBlog = Permission::create(['name' => 'canCreateBlog']); //user
        $canUpdateBlog = Permission::create(['name' => 'canUpdateBlog']); //user
        $canDeleteBlog = Permission::create(['name' => 'canDeleteBlog']); //user
        // also publically available
        $canSeeAllBlogs = Permission::create(['name' => 'canSeeAllBlogs']); //guest / user
        $canCommentOnBlogs = Permission::create(['name' => 'canCommentOnBlogs']); //guest / user
        // 2. create role
        $admin_role = Role::create(['name' => 'admin']);
        // 3. assign permissions to role
        $admin_role->givePermissionTo([
            $canViewAllUsers,
            $canDeleteUser,
        ]);
        // 4. create admin user
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
        // 5. assign role to admin user
        $admin->assignRole($admin_role);
        // OR
        // 6. give permissions directly to the admin user
        // $admin->givePermissionTo([
        //     $user_list,
        //     $user_view,
        //     $user_create,
        //     $user_update,
        //     $user_delete,
        // ]);
        // ######### creating a normal user
        // 4. create normal user
        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('password')
        ]);
        // 2. create normal user role
        $user_role = Role::create(['name' => 'user']);
        // 3. assign permissions to user role
        $user_role->givePermissionTo([
            $canCreateBlog,
            $canUpdateBlog,
            $canDeleteBlog,
            $canSeeAllBlogs,
            $canCommentOnBlogs,
        ]);
        // 5. assign role to normal user
        $user->assignRole($user_role);
        // OR
        // 6. give permissions directly to the normal user
        // $user->givePermissionTo([
        //     $user_list,
        // ]);
        
    }
}
