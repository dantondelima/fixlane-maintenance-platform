<?php

namespace App\Models;

use App\Models\User;
use Spatie\ModelStates\HasStates;
use App\States\Manager\ManagerState;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manager extends Model
{
    use HasFactory, HasStates, HasUlids;

    protected $table = 'managers';

    protected $fillable = [
        'user_id',
        'name',
        'document',
        'birth_date',
        'status',
    ];

    protected $casts = [
        'user_id' => 'ulid',
        'status' => ManagerState::class,
        'name' => 'encrypted',
        'document' => 'encrypted',
        'birth_date' => 'encrypted',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
