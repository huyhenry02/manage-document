<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttachmentFile extends Model
{
    use HasFactory;

    protected $table = 'attachment_files';
    protected $fillable = [
        'document_id',
        'file_path',
        'file_name',
        'file_size',
        'mime_type',
        'uploaded_by_id',
    ];

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class, 'document_id');
    }

    public function uploadedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by_id');
    }

}
