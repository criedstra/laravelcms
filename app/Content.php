<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Content
 * @package App
 */
class Content extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }



}
