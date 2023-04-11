<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            ClientSeeder::class,
        ]);

        \App\Models\Role::create([
            'name' => 'admin',
            'description' => 'contrôle total',
        ]);
        \App\Models\Role::create([
            'name' => 'Superuser',
            'description' => 'semi-contrôle',
        ]);
        \App\Models\Role::create([
            'name' => 'user',
            'description' => 'Contrôle partiel',
        ]);

        \App\Models\Profile::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role_id' => '1',
        ]);
    }
}
