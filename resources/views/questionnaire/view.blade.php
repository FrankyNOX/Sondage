@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{$questionnaire->titre}} || {{$questionnaire->objectif}}</div>
                    <div class="card-body">
                        <form method="post" action="{{route('repondre')}}">
                            @csrf
                            @foreach($questionnaire->questions as $key=>$question)

                                <div class="card mt-4">
                                     <div class="card-header"><strong>Question {{ $key+1 }} - {{ $question->titre }}</strong></div>
                                    <div class="card-body">
                                        <ul class="list-group">
                                            @if($question->question_type === 'text')
                                                    <div class="form-group">
                                                        <label for="reponse">Reponse</label>
                                                        <input type="text" class="form-control" id="reponse"  name="{{$question->id}}[reponce]" >
                                                    </div>
                                                <br>
                                            @elseif($question->question_type === 'number')
                                                <div class="form-group">
                                                    <label for="reponse">Reponse</label>
                                                    <input type="number" class="form-control" id="reponse"  name="{{$question->id}}[reponce]" >
                                                </div>
                                                <br>
                                            @elseif($question->question_type === 'textarea')
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Reponse</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="{{$question->id}}[reponce]"></textarea>
                                                </div>
                                                <br>
                                            @elseif($question->question_type === 'checkbox')
                                                @foreach($question->nom_option as $key=>$value)
                                                    <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="something{{ $key }}" name="{{ $question->id }}[]" value="{{$value}}">
                                                        <label class="form-check-label" for="something{{$key}}">{{ $value }}</label>
                                                    </div>
                                                    </li>
                                                @endforeach
                                                <br>
                                            @elseif($question->question_type === 'radio')
                                                @foreach($question->nom_option as $key=>$value)
                                                    <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{ $question->id }}[]" id="{{ $key }}" value="{{$value}}">
                                                        <label class="form-check-label" for="{{ $key }}">{{ $value }}</label>
                                                    </div>
                                                    </li>
                                                @endforeach
                                                <br>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                                <button type="submit" class="btn btn-primary">Valider</button>
                        </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
