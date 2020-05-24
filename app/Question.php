<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $casts = [
        'nom_option' => 'array',
    ];
    protected $fillable = ['titre', 'question_type', 'nom_option', 'questionnaire_id'];
    public  function questionnaire(){
        return $this->belongsTo(Questionnaire::class);
    }
    public function reponses(){
        return $this->hasMany(Reponse::class);
    }
}

