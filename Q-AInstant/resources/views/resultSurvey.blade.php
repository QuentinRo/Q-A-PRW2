@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="title m-b-md">
                    <h2>{{$surveys->name}}</h2>
                    <h2>Code : {{$surveys->oneShotReset}}</h2>
                    <h3>{{$surveys->created_at}}</h3>

                    @foreach($questions as $question)
                        <h4>{{$question->entitled}}</h4>
                        @foreach($answers as $key=>$answer)
                            @foreach($answer as $answ)
                               @if ($question->id == $answ->question_id)

                                   <p>{{$answ->answer}}<p>

                                @endif
                                @endforeach

                        @endforeach
                    @endforeach
                    <div class="row">
                        <form action="/openSurvey/{{$surveys->id}}">
                            <div class="col-md-2">
                                <input type="submit" class="btn btn-primary" value="Ouvrir" />
                            </div>
                        </form>
                        <form action="/closeSurvey/{{$surveys->id}}">
                            <div class="col-md-2 offset-2 ">
                                <input type="submit" class="btn btn-primary" value="Fermer" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
