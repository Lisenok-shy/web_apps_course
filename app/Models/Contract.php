<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contract extends Model
{
    use HasFactory;
   /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'num',
        'date_begin',
        'date_end',
        'price',
        'buyer_id',
        'house_id',     
        "confirmed"
    ];
    public function bills(): HasMany
    {
        return $this->hasMany(related:Bill::class);
    }

    public function house(): BelongsTo
    {
        return $this->belongsTo(related:House::class);
    }

    public function buyers(): BelongsTo
    {
        return $this->belongsTo(related:User::class);
    }

    public function sellers(): BelongsTo
    {
        return $this->belongsTo(related:User::class);
    }
}
