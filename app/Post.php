<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Post extends Model
{
    use Translatable;
    protected $translatable = ['title', 'body'];
    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
