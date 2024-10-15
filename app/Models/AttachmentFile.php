<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttachmentFile extends Model
{
    use HasFactory;

    protected $table = 'attachment_files';

    protected $fillable = [
        'document_id',
        'file_name',
        'file_path',
        'file_size',
        'file_type',
        'uploaded_by_id',
        'mime_type'
    ];

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }

    public function uploadedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by_id');
    }
}
