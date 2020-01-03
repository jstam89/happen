@extends('layouts.app', ['page' => __('Order Management'), 'pageSlug' => 'orderoverview'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Orders') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#OrderModal">
                                {{ __('Zoeken') }}
                            </button>
                            @include('layouts.navbars.modal')
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter" id="">
                            <thead class=" text-primary">
                            <th scope="col">{{ __('Id') }}</th>
                            <th scope="col">{{ __('Menu') }}</th>
                            <th scope="col">{{ __('Aantal') }}</th>
                            <th scope="col">{{ __('Gebruiker') }}</th>
                            <th scope="col">{{ __('Besteld op') }}</th>
                            <th>Opties</th>
                            <th scope="col"></th>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->menu_id}}</td>
                                    <td>{{$order->quantity}}</td>
                                    <td>{{$order->user_id}}</td>
                                    <td>{{date('d-m-Y', strtotime($order->ordered_at))}}</td>
                                    <td>
                                        <a href="#"
                                           class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> </a>
                                        <a href="#"
                                           class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{--                        {{ $users->links() }}--}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
