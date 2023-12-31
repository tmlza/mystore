<?php

namespace App\Models;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Container extends Model
{
    use HasFactory;

    protected $fillable = ["user_id","name","description"];
    public function categories():BelongsToMany
    {
        return $this->belongsToMany(Category::class,'container_categories');
    }
    public function items():HasMany
    {
        return $this->hasM(Item::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}


// Container1
//     - Category1
//         - item1
//         - item2
//         - item3
//     - Category2
//         - item1
//         - item2
//         - item3
//     - Category3
//         - item1
//         - item2
//         - item3


// Container2
//     - Category1
//     - Category2
//     - Category3


// Container3
//     - Category1
//     - Category2
//     - Category3