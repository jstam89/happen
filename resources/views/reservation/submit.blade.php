@extends('layouts.app', ['pageSlug' => 'reservation'])

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Tafel reserveren') }}</h5>
                </div>

                <div class="card-body">
                    <p>gebruikers details hier</p>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Tafel reserveren') }}</h5>
                </div>
                <form method="post" enctype="multipart/form-data" action="#"
                      autocomplete="off">
                    <div class="card-body">
                        @csrf

                        @include('alerts.success')

                        <p>{{auth()->user()->name}}</p>

                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                            <label>{{ __('Naam') }}</label>
                            <input type="text" name="title"
                                   class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('Name') }}"
                                   value="{{ old('name', auth()->user()->name) }}">
                            @include('alerts.feedback', ['field' => 'title'])
                        </div>

                        <div class="form-group{{ $errors->has('info') ? ' has-danger' : '' }}">
                            <label>{{ __('Beschrijving') }}</label>
                            <input type="text" name="info"
                                   class="form-control{{ $errors->has('info') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('Vul een beschrijving in') }}"
                                   value="">
                            @include('alerts.feedback', ['field' => 'info'])
                        </div>
                        <div class="form-group">
                            <label>{{ __('Afhaal datum') }}</label>
                            <input type="date" name="takeout_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>{{ __('Upload') }}</label>
                            <input type="file" name="menu_image" class="form-control custom-file-input">
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
                    <h5 class="title">{{ __('Bestel historie') }}</h5>
                </div>
                <div class="card-body">
                    <table class="table" id="">
                        <thead class=" text-primary">
                        <th scope="col">{{ __('Order ID') }}</th>
                        <th scope="col">{{ __('Menu ID') }}</th>
                        <th scope="col">{{ __('Besteld op') }}</th>
                        </thead>
                        <tbody>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
