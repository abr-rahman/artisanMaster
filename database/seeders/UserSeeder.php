<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => 'password',
        //     'role' => 'admin',
        // ]);

        User::insert([
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('password')],
            ['name' => 'Editor', 'email' => 'editor@gmail.com', 'password' => bcrypt('password')],
            ['name' => 'Author', 'email' => 'author@gmail.com', 'password' => bcrypt('password')],
        ]);

        Role::insert([
            ['name' => 'Editor', 'slug' => 'editor'],
            ['name' => 'Author', 'slug' => 'author'],
        ]);

        Permission::insert([
            ['name' => 'Add Post', 'slug' => 'add_post'],
            ['name' => 'Delete Post', 'slug' => 'delete_post'],
        ]);
    }
}
