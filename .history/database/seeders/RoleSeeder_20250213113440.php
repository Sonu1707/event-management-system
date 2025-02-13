<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create roles
         $reviewerRole = Role::create(['name' => 'reviewer']);
         $adminRole = Role::create(['name' => 'admin']);
 
         // Assign roles to users
         $user = User::first(); // Assuming you have at least one user
         $user->roles()->attach($reviewerRole);
    }
}
