@extends('layouts.auth')

@section('afterStyles')
    <link href="{{ asset('assets/css/auth.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="push-top">
                <h2 style="text-align: center">Welcome Back!</h2>
                <p class="p">Sign in in to your account to continue.</p>
            </div>
        </div>
    </div>

    <div class="card push-top">
        <div class="card-body">
                <div class="alert alert-danger error">
                    <p class="alert__main"></p>
                </div>
            <br/>

            <form id="loginForm">
                <div class="form-group">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email"/>
                        <span class="error"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password"/>
                        <span class="error"></span>
                        <p>Remember me next time</p>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('afterScripts')
    <script>

        isTokenPresent();

        $(document).ready(function () {
            $("#loginForm").submit(function (event) {
                event.preventDefault();



                $.ajax({
                    type: "POST",
                    url: base_api_url + "/login",
                    beforeSend: function(request) {
                        request.setRequestHeader("Accept", 'application/json');
                        request.setRequestHeader("'Content-Type'", 'application/json');

                        $('.error').hide();
                        $('.error').siblings('input').removeClass('is-invalid');
                    },
                    data: $(event.currentTarget).serializeArray(),
                    dataType: "json",
                    encode: true,
                    success: function (data) {
                        console.log(data);
                        alert('You have been successfully logged in!');
                        sessionStorage.setItem('token', data.access_token);
                        window.location = `${base_url}/dashboard`
                    },
                    error: function (xhr) {

                        $('.alert.alert-danger').show();
                        $('.alert p.alert__main').text(xhr.responseJSON.message);

                        if(xhr.responseJSON.errors) {
                            $.each(xhr.responseJSON.errors, function (key, valueAsArray) {
                                $(`input[name=${key}]`).addClass('is-invalid');
                                $(`input[name=${key}]`).siblings('span.error').text(valueAsArray.join("\n")).show();
                            })
                        }
                    }
                }).done(function (data) {
                    console.log(data);
                });


            });
        });
    </script>
@endsection
