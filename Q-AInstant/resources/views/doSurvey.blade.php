@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="title m-b-md">
            <form method="POST" action="/answerSurvey">

            <h1>{{$survey->name}}</h1>
            @foreach($questions as $question)
                    {{$question->id}}
                {{$question->entitled}}
                    <input type="text"  class="" name="{{$question->id}}">
            <br>
            @endforeach
                <button  type="submit" class="btn btn-primary">Soumettre</button>
            </form>
        </div>

    </div>

@endsection
