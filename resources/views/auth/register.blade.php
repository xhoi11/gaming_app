@extends('layouts.auth')

@section('bottomHead')
    <link href="{{ asset('assets/css/register.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="push-top">
                <h2 style="text-align: center">GET STARTED</h2>
                <p>Start Creating The Best Possible User Experience For You.</p>
            </div>
        </div>
    </div>

    <style>
        .push-top {
            margin-top: 50px;
        }

        .container {
            max-width: 450px;
        }
    </style>

    <div class="card push-top">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form id="forma" method="post">
                <div class="form-group">
                    @csrf
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label for="email">Team</label>
                    <input type="text" class="form-control" name="team"/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email"/>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password"/>
                    <p>Remember me next time</p>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </form>
        </div>
    </div>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('login') }}"> Back </a>
    </div>
@endsection
