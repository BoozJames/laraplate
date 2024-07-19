<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create roles if they do not exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Create a test user and assign the 'user' role
        $testUser = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'), // Make sure to set a password
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $testUser->assignRole($userRole);

        // Create your own user based on the environment variables and assign the 'admin' role
        $adminUser = User::factory()->create([
            'name' => env('SYS_FULLNAME'),
            'email' => env('SYS_EMAIL'),
            'password' => Hash::make(env('SYS_PASSWORD')),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $adminUser->assignRole($adminRole);
    }
}
