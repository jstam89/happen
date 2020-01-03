@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Edit Profile') }}</h5>
                </div>
                <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('put')

                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label>{{ __('Email address') }}</label>
                            <input type="email" name="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('Email address') }}"
                                   value="{{ old('email', auth()->user()->email) }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>

                        <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                            <label>{{ __('Functie') }}</label>
                            <input type="text" name="role"
                                   class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('Bedrijfs functie') }}"
                                   value="{{ old('role', auth()->user()->role) }}">
                            @include('alerts.feedback', ['field' => 'role'])
                        </div>

                        <div class="form-group{{ $errors->has('info') ? ' has-danger' : '' }}">
                            <label>{{ __('Profiel Informatie') }}</label>
                            <input type="text" name="info"
                                   class="form-control{{ $errors->has('info') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('Max 100 characters') }}"
                                   value="{{ old('info', auth()->user()->info) }}">
                            @include('alerts.feedback', ['field' => 'info'])
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Password') }}</h5>
                </div>
                <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('put')

                        @include('alerts.success', ['key' => 'password_status'])

                        <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                            <label>{{ __('Current Password') }}</label>
                            <input type="password" name="old_password"
                                   class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('Current Password') }}" value="" required>
                            @include('alerts.feedback', ['field' => 'old_password'])
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label>{{ __('New Password') }}</label>
                            <input type="password" name="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('New Password') }}" value="" required>
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                        <div class="form-group">
                            <label>{{ __('Confirm New Password') }}</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                   placeholder="{{ __('Confirm New Password') }}" value="" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Change password') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>
                            <a href="#">
                                <img class="avatar" src="{{ asset('black') }}/img/emilyz.jpg" alt="">
                                <h5 class="title">{{auth()->user()->name}}</h5>
                            </a>
                    <p class="description">
                        {{auth()->user()->role}}
                    </p>
                </div>
                </p>
                <div class="card-description text-center">
                    {{auth()->user()->info}}
                </div>
            </div>
            <div class="card-footer">
                <div class="button-container">
                    <button class="btn btn-icon btn-round btn-facebook">
                        <i class="fab fa-facebook"></i>
                    </button>
                    <button class="btn btn-icon btn-round btn-twitter">
                        <i class="fab fa-twitter"></i>
                    </button>
                    <button class="btn btn-icon btn-round btn-google">
                        <i class="fab fa-google-plus"></i>
                    </button>
                </div>
            </div>
        </div>
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
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->menu_id}}</td>
                            <td>{{date('d-m-Y', strtotime($order->ordered_at))}}</td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        @if (auth()->user()->id === $order->user_id)
                                            <form action="{{ route('order.destroy', $order) }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <a class="dropdown-item"
                                                   href="{{ route('order.edit', $order) }}">{{ __('Edit') }}</a>
                                                <button type="button" class="dropdown-item"
                                                        onclick="confirm('{{ __("Are you sure you want to delete this menu?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Annuleren') }}
                                                </button>
                                            </form>
                                        @else
                                            <a class="dropdown-item"
                                               href="{{ route('order.edit', $order) }}">{{ __('Edit') }}</a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
