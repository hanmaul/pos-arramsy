<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformasiToko extends Model
{
    public function category(){
        return $this->belongsTo(Category::class, "category_id");
    }

    public function currency(){
        return $this->belongsTo(Currency::class, "currency_id");
    }
}
