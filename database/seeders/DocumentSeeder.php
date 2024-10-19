<?php

namespace Database\Seeders;

use App\Models\Folder;
use App\Models\Document;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/json_data/documents.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            Document::create([
                'title' => $item->title,
                'code' => $item->code,
                'content' => $item->content,
                'start_time' => $item->start_time,
                'end_time' => $item->end_time,
                'note' => $item->note,
                'folder_id' => $item->folder_id,
                'created_by_id' => $item->created_by_id,
                'updated_by_id' => $item->updated_by_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
