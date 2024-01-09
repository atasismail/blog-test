@extends('public.layout')
@section('content')
    <style>
        .jumbotron.text-center {
            height: 17em;
        }

        input.form-control.col-md-6 {
            width: 50%;
            margin-right: 1em;
            display: inline;
        }

        div#notes {
            margin-top: 2%;
            width: 98%;
            margin-left: 1%;
        }

        @media (min-width: 991px) {
            .col-md-9.col-sm-12 {
                margin-left: 12%;
            }
        }
    </style>

    <div class="container">
        <br><br><br><br><br>
        <!-- Verification Entry Jumbotron -->
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron text-center">
                    <h2>Bilgilendirilmek için email adresinizi giriniz</h2>
                    <form method="post" action="{{ route('aboneol') }}" role="form">
                        @csrf
                        <div class="col-md-9 col-sm-12">
                            <div class="form-group form-group-lg">

                                <input type="email" class="form-control col-md-6 col-sm-6 col-sm-offset-2" name="email"
                                    required>
                                <input class="btn btn-primary btn-lg col-md-2 col-sm-2" type="submit" value="Takip Et">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
