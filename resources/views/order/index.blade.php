@extends('layouts.app', ['pageSlug' => 'order'])

@section('content')

    <div class="row">
        <div class="col-md-8">
            @foreach($menus as $menu)
                <div class="card">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <h5 class="card-category">{{$menu->takeout_date}}</h5>
                                <h2 class="card-title">{{$menu->title}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>{{$menu->info}}</p>
                    </div>
                    <div class="card-footer">
                        <div class="dropdown-primary text-right">
                            <select name="menu-select" class="form-control" style="background-color: #1e1e28">
                                @for ($i = 0; $i <= 10; $i++)
                                    <option name="order-quantity" value="<?php echo $i ?>"><?php echo $i ?></option>
                                @endfor
                            </select>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-md-4">
            @include('partials.cart')
        </div>

    </div>
@endsection
