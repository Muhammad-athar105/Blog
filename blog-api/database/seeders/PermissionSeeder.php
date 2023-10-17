<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $permissions = [
        'createPost', 
        'updateUser',
        'getUserById',
        'updatePost', 
        'showPostsForUsers', 
        'createComment', 
        'deleteComment',  
        'deletePost',
        'getAllPost', 
        'getAllUsers',
        'showAllComments', 
        'deleteUser',
    ];

    foreach ( $permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }

        $role = Role::firstOrCreate(['name' => 'User']);
        $role->givePermissionTo('createPost', 'updatePost', 'showPostsForUsers', 'deletePost', 'createComment', 'deleteComment');
        

        $role =Role::create(['name'=>'Admin']);
        $role->givePermissionTo($permissions);

        $role =Role::create(['name'=>'User']);
        $role->givePermissionTo( 'getAllPost', 'showAllComments',  );

}

}
