<?php

namespace Database\Seeders;

use App\Models\Folder;
use Illuminate\Database\Seeder;

class FolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/json_data/folders.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            Folder::create([
                'id' => $item->id,
                'name' => $item->name,
                'parent_id' => $item->parent_id,
                'created_by_id' => $item->created_by_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
