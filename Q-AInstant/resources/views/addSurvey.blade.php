@extends('layouts.app')
@section('js')
    <script src="js/AddQuestion.js"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ajouter un questionnaire</div>

                    <div class="card-body">
                        <form method="POST" id="myform" action="/addSurvey/create">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-header">Ajouter les questions</div>
                            <br>
                                <div id="questionaire" class="form-group row test">

                                    <label for="Q{{$Qn}}" class="col-md-4 col-form-label text-md-right">Question <label id="Qnumber">1</label></label>

                                    <div class="col-md-6">
                                        <input id="question" type="text" class="form-control" name="question[]" required autofocus>
                                    </div>
                                </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-2 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Créer
                                    </button>
                                </div>

                                <div class="col-md-2 offset-md-2">
                                    <button id="add" class="btn btn-primary">
                                        Ajouter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

