@extends('layouts.app', ['pageSlug' => 'reservation'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Tafel reserveren') }}</h5>
                </div>
                <form method="post" action="{{route('reservation.create')}}"
                      autocomplete="off">
                    <div class="card-body">
                        @csrf

                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Naam') }}</label>
                            <input type="text" name="name"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('Name') }}"
                                   value="{{ auth()->user()->name}}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group">
                            <label>{{__('Aantal personen')}}</label>
                            <select class="form-control" style="background-color:#27293d;" name="quantity">
                                <?php for ($i = 1; $i <= 25; $i++) : ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>{{ __('Datum') }}</label>
                            <input type="date" name="reserved_date" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Toevoegen') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Overzicht reserveringen') }}</h5>
                </div>
                <div class="card-body">
                    <table class="table" id="">
                        <thead class=" text-primary">
                        <th scope="col">{{ __('ID') }}</th>
                        <th scope="col">{{ __('Datum resevering') }}</th>
                        <th scope="col">{{ __('Aantal') }}</th>
                        </thead>
                        <tbody>
                        @foreach ($reservations->take(5) as $reservations)
                            <tr>
                                <td>{{ $reservations->id}}</td>
                                <td>{{ $reservations->created_at->format('d/m/Y H:i') }}</td>
                                <td>{{ $reservations->quantity}} Personen</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
