<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed author_name
 * @property string comment_body
 * @property mixed author_id
 * @property int film_id
 */
class Comment extends Model
{
    protected $table = 'films_comments';
}
