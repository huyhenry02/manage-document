<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/json_data/categories.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            Category::create([
                'id' => $item->id,
                'name' => $item->name,
                'code' => $item->code,
                'parent_id' => $item->parent_id,
                'created_by_id' => $item->created_by_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
