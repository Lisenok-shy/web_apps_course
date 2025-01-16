<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class House extends Model
{
    use HasFactory;
    protected $fillable = ['address','area','price'];

    public function houseimgs(): HasMany
    {
        return $this->hasMany(related:HouseImg::class);
    }

    public function contracts(): HasMany
    {
        return $this->hasMany(related:Contract::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(related:Category::class,table:'category_house');
    }

}
