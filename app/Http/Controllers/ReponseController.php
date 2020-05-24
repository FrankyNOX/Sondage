<?php

namespace App\Http\Controllers;

use App\Reponse;
use Illuminate\Http\Request;

class ReponseController extends Controller
{
    public function newreponse($val,$key){

    }

    public function store(Request $request)
    {
        // remove the token
        $arr = $request->except('_token');
        foreach ($arr as $key => $value) {
            if (! is_array( $value )) {
                $newValue = $value['answer'];
                $newReponsse = new Reponse();
                $newReponsse->reponse = $newValue;
                $newReponsse->question_id = $key;
                $newReponsse->save();
            } else {
                foreach ($value as $val)
                {
                    $newReponsse = new Reponse();
                    $newReponsse->reponse = $val;
                    $newReponsse->question_id = $key;
                    $newReponsse->save();
                }
            }
        }; 
        echo 'Merci Bien';
    }
}
