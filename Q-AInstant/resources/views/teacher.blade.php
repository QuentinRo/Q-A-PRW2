@extends('layouts.app')
@section('content')
<div class="container">

        <table class="table">
            <tr>Nom</tr>
            <tr>Date de création</tr>
            <tr>NB Réponses</tr>
            <tr>Statut</tr>
            @foreach($surveys as $survey)
                <td class="tab-content"><a href="/resultSurvey/{{$survey->id}}">{{$survey->name}}</a></td>
                <td>{{$survey->created_at}}</td>
                <td>{{$nbanswers[$survey->id]}}</td>
                <td>{{$survey->open}}</td>
                <tr></tr>
            @endforeach
        </table>
        <form action="/addSurvey">
            <input class="btn btn-primary" type="submit" value="Nouveau" />
        </form>

</div>
@endsection
