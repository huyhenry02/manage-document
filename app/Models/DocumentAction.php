<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DocumentAction extends Model
{
    use HasFactory;

    protected $table = 'document_actions';
    public const ACTION_PUBLIC_DOCUMENT = 'public_document';
    public const ACTION_EDIT_DOCUMENT = 'edit_document';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_REJECTED = 'rejected';
    public const STATUS_PENDING = 'pending';

    protected $fillable = [
        'document_id',
        'action',
        'status',
        'reason',
        'json_data_update',
        'created_by_id',
        'confirmed_by_id',
        'user_type',
    ];

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function confirmedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'confirmed_by_id');
    }
}
