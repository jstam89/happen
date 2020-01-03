@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Gebruikers') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('user.create') }}"
                               class="btn btn-sm btn-primary">{{ __('Toevoegen') }}</a>
                            <a href="#"
                               class="btn btn-sm btn-secondary">{{ __('zoeken') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <th scope="col">{{ __('Id') }}</th>
                            <th scope="col">{{ __('Naam') }}</th>
                            <th scope="col">{{ __('Email') }}</th>
                            <th scope="col">{{ __('Functie') }}</th>
                            <th scope="col">{{ __('Registratie') }}</th>
                            <th scope="col"></th>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                    </td>
                                    <td>{{ $user->role }}</td>

                                    <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                    <td>
                                        <a href="#"
                                           class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> </a>
                                        <a href="#"
                                           class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $users->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
