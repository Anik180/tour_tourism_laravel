<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package_category extends Model
{
     public function package_categories()
    {
        return $this->hasMany('App\Package_category','package_category_id');
    }
}
