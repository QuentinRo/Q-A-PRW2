@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                    @if ($survey == null)
                            <h1>Aucun questionnaire n'est ouvert</h1>
                        @else
                        <div class="card">
                            <div class="card-header">{{$survey->name}}</div>

                                <div class="card-body">

                                <form method="POST" action="/answerSurvey">
                                    @csrf
                                    <div class="form-group row">
                                        @foreach($questions as $question)

                                            <label for="answer" class="col-md-4 col-form-label text-md-right">{{$question->entitled}}</label>

                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="answer[{{$question->id}}]">
                                            </div>
                                            <br><br>
                                        @endforeach
                                    </div>
                                    <button  type="submit" class="btn btn-primary col-md-2 offset-md-8">Soumettre</button>
                                </form>
                            </div>
                        </div>
                        @endif


            </div>
        </div>
    </div>

@endsection
