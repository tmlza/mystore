<?php

namespace App\Models;

use App\Models\Container;
use App\Models\User;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ["name","user_id"];
    public function container():BelongsToMany
    {
        return $this->belongsToMany(Container::class,'container_categories');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items():HasMany
    {
        return $this->hasMany(Item::class);
    }


}
