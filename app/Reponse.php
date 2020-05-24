<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    protected $fillable = ['reponse','question_id'];

    public function question(){
        return $this->belongsTo(Question::class);
}
}
