<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HouseImg extends Model

{    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    public function house(): BelongsTo
    {
        return $this->belongsTo(related:House::class);
    }
}
