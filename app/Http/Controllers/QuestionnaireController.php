<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use App\Reponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionnaireController extends Controller
{
    public function index(){
        $questionnaires = Questionnaire::all();
        return view('home',compact('questionnaires'));
    }
    public function create(){
        return view('questionnaire.create');
    }
    public function store()
    {
        $data = request()->validate([
            'titre' => 'required',
            'objectif' => 'required'
        ]);
         $questionnaire = auth()->user()->questionnaires()->create($data);
        return redirect('/home');
    }
    public  function show(Questionnaire $questionnaires,$id){

        $questionnaires->load('questions.reponses');
        $questionnaire = $questionnaires::findOrFail($id);
        return view('questionnaire.show',compact('questionnaire'));
    }
    public  function edit($id){
        $questionnaire = Questionnaire::findOrFail($id);
        return view('questionnaire.edit',compact('questionnaire'));
    }

    public function update($id)
    {
        $data = request()->all();
        $questionnaire = Questionnaire::findOrFail($id);
        $questionnaire->update($data);
        return redirect('/home');
    }

    public  function delete($id){
        $questionnaire = Questionnaire::with('questions.reponses')->findOrFail($id);
        $questionnaire->delete();
        return redirect('/home');
    }

    public function passer($id)
    {
        $questionnaire = Questionnaire::with('questions')->findOrFail($id);
        return view('questionnaire.view',compact('questionnaire'));
    }

}
