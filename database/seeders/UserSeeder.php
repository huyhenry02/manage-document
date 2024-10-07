<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/json_data/users.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            User::create([
                'name' => $item->name,
                'role_type' => $item->role_type,
                'email' => $item->email,
                'password' => bcrypt($item->password),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
