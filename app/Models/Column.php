<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Column extends BaseModel {

    protected $table = 'columns';

    protected $fillable = ['title'];

    public function cards() {
        return $this->hasMany(Card::class);
    }
}
