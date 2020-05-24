<?php

namespace App\Http\Controllers;

use App\Question;
use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request,$id)
    {
        $data = $request->all();
        $questionnnaire = Questionnaire::findOrFail($id);
        $questionnnaire->questions()->create($data);
        return back();
    }

    public  function delete($id){
        $question = Question::with('reponses')->findOrFail($id);
        $question->delete();
        return back();
    }
}
