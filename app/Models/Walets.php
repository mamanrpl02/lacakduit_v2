<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids; // 1. Import Trait


class Walets extends Model
{

    use HasUuids; // 2. Gunakan Trait

    protected $primaryKey = 'sys_id_r_walets';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'r_walets';

    // Relasi balik ke model User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    protected $fillable = [
        'name',
        'description',
        'icon',
        'r_users', // Tambahkan kolom r_users ke dalam fillable
    ];
}
