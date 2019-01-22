@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="title m-b-md">
            Teacher page
        </div>

        <table>
            <tr>Nom</tr>
            <tr>Date</tr>
            <tr>Réponse</tr>
            <tr>Statut</tr>
            @foreach($surveys as $survey)
                <td><a href="/resultSurvey/{{$survey->id}}">{{$survey->name}}</a></td>
                <td>{{$survey->created_at}}</td>
                <td></td>
                <td>{{$survey->open}}</td>
                <tr></tr>
            @endforeach
        </table>
        <form action="/addSurvey">
            <input type="submit" value="Nouveau" />
        </form>
    </div>

@endsection
