@extends('layouts.panel')

@section('content')
    <!-- ! Main -->
    <main class="main" id="skip-target">
        <div class="container">
            <h2 class="main-title">Heroes Table</h2>
            <div class="media-content">
                <div class="row">
                    <div class="col-lg-3">
                        <button class="btn-primary btn" type="submit">Choose your kind</button>
                        <div class="media-sidebar">
                            <ul class="quick-links">
                                <ul class="quick-links">
                                    <li>
                                        <a class="info" href="">
                                            <div class="quick-links-icon">
                                                <span class="icon time-circle" aria-hidden="true"></span>
                                            </div>
                                            <div class="quick-links-text">
                                                <span class="quick-links__title">Goku</span>
                                                <span class="quick-links__subtitle">Dragon ball</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="success" href="##">
                                            <div class="quick-links-icon">
                                                <span class="icon google-drive" aria-hidden="true"></span>
                                            </div>
                                            <div class="quick-links-text">
                                                <span class="quick-links__title">Naruto</span>
                                                <span class="quick-links__subtitle">Naruto</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="primary" href="">
                                            <div class="quick-links-icon">
                                                <span class="icon dropbox" aria-hidden="true"></span>
                                            </div>
                                            <div class="quick-links-text">
                                                <span class="quick-links__title">SpiderMan</span>
                                                <span class="quick-links__subtitle">Marvel</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="warning" href="##">
                                            <div class="quick-links-icon">
                                                <span class="icon star" aria-hidden="true"></span>
                                            </div>
                                            <div class="quick-links-text">
                                                <span class="quick-links__title">Vegeta</span>
                                                <span class="quick-links__subtitle">Dargon Ball</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="danger" href="##">
                                            <div class="quick-links-icon">
                                                <span class="icon delete" aria-hidden="true"></span>
                                            </div>
                                            <div class="quick-links-text">
                                                <span class="quick-links__title">Luffy</span>
                                                <span class="quick-links__subtitle">One Pice</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">

                        <h3 class="btn-outline-dark">Characters of the hero</h3>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="btn btn-outline-primary" type="button">Power</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" aria-label=""
                                   aria-describedby="basic-addon1">
                            <div class="input-group-prepend">
                                <span class="btn btn-outline-primary" type="button">Strength</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" aria-label=""
                                   aria-describedby="basic-addon1">
                            <div class="input-group-prepend">
                                <span class="btn btn-outline-primary" type="button">Health</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" aria-label=""
                                   aria-describedby="basic-addon1">
                            <div class="input-group-prepend">
                                <span class="btn btn-outline-primary" type="button">SuperPower</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" aria-label=""
                                   aria-describedby="basic-addon1">
                            <div class="input-group-prepend">
                                <span class="btn btn-outline-primary" type="button">Enter your hero name</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" aria-label=""
                                   aria-describedby="basic-addon1">
                            <br>
                            <span class="btn-primary btn" type="submit">Submit</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection()
@section('afterScripts')
    <script>
        isNotTokenPresent();

        $(document).ready(function () {


            $.ajax({
                type: "GET",
                url: `${base_api_url}/kinds`,
                beforeSend: function (request) {
                    request.setRequestHeader("Accept", 'application/json');
                    request.setRequestHeader("'Content-Type'", 'application/json');
                    request.setRequestHeader("Authorization", `Bearer ${sessionStorage.getItem('token')}`);
                },
                dataType: "json",
                encode: true,
                success: function (data) {
                    $.each(data, function(index) {
                        $("myList").append(
                            $("<li>", {}).append(
                                $("<a>", { href: data[index].href }).text(
                                    data[index].text
                                )
                            )
                        );
                    });
                    console.log(data);
                    alert('succes');
                },
                error: function (xhr) {
                    alert('error');
                    redirectToLogin();
                }
            }).done(function (data) {
                console.log(data);
            });
        })
    </script>
@endsection

