<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ["name"];
    public function container():BelongsToMany
    {
        return $this->belongsToMany(Container::class,'container_categories');
    }

    public function items():HasMany
    {
        return $this->hasMany(Item::class);
    }


}
