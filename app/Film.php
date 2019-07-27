<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed name
 * @property string slug
 * @property mixed description
 * @property mixed release_date
 * @property mixed ticket_price
 * @property mixed rating
 * @property mixed country
 * @property string photo_url
 */
class Film extends Model
{
    protected $table = 'films';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function genres()
    {
        return $this->belongsToMany('App\Genre','films_genres');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
