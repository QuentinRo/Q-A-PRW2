@extends('layouts.app')
@section('content')
<div class="container">

        <table class="table">
            <th class="">Nom</th>
            <th>Date de création</th>
            <th>NB Réponses</th>
            <th>Statut</th>
            @foreach($surveys as $survey)
                <tr>
                <td class="tab-content"><a href="/resultSurvey/{{$survey->id}}">{{$survey->name}}</a></td>
                <td>{{$survey->created_at}}</td>
                <td>{{$nbanswers[$survey->id]}}</td>
                <td>{{$survey->open}}</td>
                <td>
                    <form method="post" action="/delSurvey/{{$survey->id}}">
                        @csrf
                        @method("DELETE")
                        <div class="col-md-2 offset-2 ">
                            <input type="submit" class="btn btn-primary" value="Supprimer" />
                        </div>
                    </form>

                </td>

                </tr>
            @endforeach
        </table>
        <form action="/addSurvey">
            <input class="btn btn-primary" type="submit" value="Nouveau" />
        </form>

</div>
@endsection
