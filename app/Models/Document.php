<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';
    public const STATUS_DRAFT = 'draft';
    public const STATUS_PENDING = 'pending';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_REJECTED = 'rejected';

    protected $fillable = [
        'title',
        'content',
        'code',
        'start_time',
        'end_time',
        'is_featured',
        'status',
        'note',
        'folder_id',
        'created_by_id',
        'updated_by_id',
    ];
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }

    public function folder(): BelongsTo
    {
        return $this->belongsTo(Folder::class);
    }

    public function attachmentFiles(): HasMany
    {
        return $this->hasMany(AttachmentFile::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
