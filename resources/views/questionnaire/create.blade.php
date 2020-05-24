@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Création d'un questionnaire</div>

                    <div class="card-body">
                        <form method="post" action="{{route('sauv_questionnaire')}}">
                            @csrf
                            <div class="form-group">
                                <label for="titre">Titre</label>
                                <input type="text" class="form-control" name="titre" id="titre" aria-describedby="titre" placeholder="Entrer le titre">
                                <small id="titre" class="form-text text-muted">Entrer un titre clair </small>
                            </div>
                            <div class="form-group">
                                <label for="objectif">Objectif</label>
                                <input type="text" class="form-control" id="objectif" name="objectif" placeholder="Entrer objectif">
                                <small id="objectif" class="form-text text-muted">Entrer un objectif clair</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
