@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="title m-b-md">
            <h1>{{$surveys->name}}</h1>
            <h2>{{$surveys->created_at}}</h2>

            @foreach($questions as $question)
                <h3>{{$question->entitled}}</h3>
                @foreach($answers as $answer)
                    {{$answer->answer}} <br>
                @endforeach
            @endforeach
            <form action="/openSurvey/{{$surveys->id}}">
                <input type="submit" value="Ouvrir" />
            </form>
            <form action="/closeSurvey/{{$surveys->id}}">
                <input type="submit" value="Fermer" />
            </form>
        </div>

    </div>

@endsection
