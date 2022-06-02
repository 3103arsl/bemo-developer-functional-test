<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Card extends BaseModel {

    protected $table = 'cards';
    protected $fillable = ['title', 'description'];

    public function column() {
        return $this->belongsTo(Column::class);
    }
}
