<?php

namespace App\Models;

use App\Models\Container;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ["name","description","container_id","category_id"];
    public function container()
    {
        return $this->belongsTo(Container::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}



// container >> category >> category_item

// id,name  >> id,name,container_id >> category_id, item_name


// category table || brand table  || product table


// tshirt 
// pant 
// shoe 


