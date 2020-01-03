@extends('layouts.app', ['pageSlug' => 'order.index'])

@section('content')

    <div id="vue" class="row">
        <div class="col-md-7">
            @foreach($menus as $menu)
                <div class="card menu-item">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <h5 class="card-category menu-date">{{$menu->takeout_date}}</h5>
                                <h2 class="card-title menu-title">{{$menu->title}}</h2>
                                <span class="card menu-id" style="display: none;">{{$menu->id}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <p>{{$menu->info}}</p>
                    </div>

                    <div class="card-footer">
                        @if($menu->takeout_date > \Carbon\Carbon::now())
                            <vue-add-to-cart
                                :menu="{{ $menu }}"
                            ></vue-add-to-cart>
                        @endif
                    </div>
                </div>
            @endforeach

        </div>

        <div class="col-md-5">
            <vue-cart
                :data-menus="{{ json_encode(Session::get('menus')) ?? json_encode([]) }}"
                route-post="{{ route('order.store') }}"
                route-session="{{ route('order.session') }}"
            ></vue-cart>
        </div>
    </div>
@endsection
