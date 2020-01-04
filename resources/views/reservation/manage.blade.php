@extends('layouts.app', ['page' => __('Reservering Management'), 'pageSlug' => 'reserveringen'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Reserveringen') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#OrderModal">
                                {{ __('Filter') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter" id="">
                            <thead class=" text-primary">
                            <th scope="col">{{ __('Id') }}</th>
                            <th scope="col">{{ __('Door') }}</th>
                            <th scope="col">{{ __('Aantal personen') }}</th>
                            <th scope="col">{{ __('Gereserveerd voor') }}</th>
                            <th scope="col"></th>
                            </thead>
                            <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td>{{$reservation->id}}</td>
                                    <td>{{$reservation->user->name}}</td>
                                    <td>{{$reservation->quantity}}</td>
                                    <td>{{date('d-m-Y', strtotime($reservation->reserved_date))}}</td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                <form action="{{route('reservation.destroy', $reservation)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <button type="button" class="dropdown-item"
                                                            onclick="confirm('{{ __("Weet je zeker dat je deze reservering wil verwijderen?") }}') ? this.parentElement.submit() : ''">
                                                        {{ __('Verwijderen') }}
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
