@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <a class="navbar-brand pt-0" href="{{ route('home') }}">
                            <img src="{{ asset('black') }}/img/adwise_logo.png" class="navbar-brand-img"
                                 alt="...">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
