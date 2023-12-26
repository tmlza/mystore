<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Container extends Model
{
    use HasFactory;

    protected $fillable = ["name"];
    public function categories():BelongsToMany
    {
        return $this->belongsToMany(Category::class,"container_categories");
    }
}
