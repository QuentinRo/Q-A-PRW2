@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <form method="post" action="/delAnswers">
                        @csrf
                        @method("DELETE")
                        <div class="card-body">
                            Vous avez déjà répondu à se formulaire !<br>

                            <label for="code" class="col-md-4 col-form-label">Code : </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="code">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <input type="submit" class="btn btn-primary" value="Supprimer" />
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
