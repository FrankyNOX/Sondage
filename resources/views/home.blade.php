@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Bienvenue</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="{{route('nouveau_questionnaire')}}" class="btn btn-info">Créer questionnaire</a>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Mes Questionnaires</div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($questionnaires as $questionnaire)
                            <li class="list-group-item">
                                <a href="{{route('voir_questionnaire',[$questionnaire->id])}}"> {{$questionnaire->titre}} </a>
                                <div class="mt-2">
                                    <small class="font-weight-bold">Partager le lien</small>
                                    <p>
                                        <a href="{{route('passer_questionnaire',[$questionnaire->id])}}">{{route('passer_questionnaire',[$questionnaire->id])}}</a>
                                    </p>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item">Aucun sondage en base de données</li>
                        @endforelse
                    </ul>
                </div>
            </div>
           </div>
        </div>
    </div>
</div>
@endsection
