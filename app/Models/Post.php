<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'text', 'image', 'categorias_id', 'created_at'];

    public function getImageUrlAttribute(){
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
