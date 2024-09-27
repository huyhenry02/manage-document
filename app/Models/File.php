<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $table = 'files';
    protected $fillable = [
        'model_id',
        'model_type',
        'file_path',
        'file_name',
        'file_size',
        'mime_type',
        'uploaded_by_id',
    ];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }
}
