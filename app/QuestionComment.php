<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionComment extends Model
{
    protected $table = 'question_comments';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
