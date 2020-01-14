@extends('layouts.app', ['pageSlug' => 'menus'])

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Daghap Geschiedenis') }}</h5>
                </div>
                <form class="card-body">
                    @csrf

                    @include('alerts.success')

                    <div class="form-group">
                        <label>{{__('Kies een menu')}}</label>
                        <select class="form-control" style="background-color:#27293d;" name="quantity">
                            @foreach($menus as $menu)
                                <option value="{{$menu->title}}">{{$menu->title}}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label>{{ __('Afhaal datum') }}</label>
                            <input type="date" name="takeout_date" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Snel toevoegen') }}</button>
                </form>
            </div>


            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Daghap Toevoegen') }}</h5>
                </div>
                <form method="post" enctype="multipart/form-data" action="{{route('menus.store')}}"
                      autocomplete="off">
                    <div class="card-body">
                        @csrf

                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                            <label>{{ __('Titel') }}</label>
                            <input type="text" name="title"
                                   class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('Vul een titel in') }}"
                                   value="">
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
                    <h5 class="title">{{ __('Menu Overzicht') }}</h5>
                </div>
                <div class="card-body">
                    <table class="table" id="">
                        <thead class=" text-primary">
                        <th scope="col">Daghap</th>
                        <th scope="col">Ophaaldag</th>
                        </thead>
                        <tbody>
                        @foreach($menus as $menu)

                            <tr>
                                <td>{{ $menu->title }}</td>
                                <td>{{ $menu->takeout_date }}</td>
                                <td>
                                    <button class="btn btn-sm btn-icon-only text-light" type="submit">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

