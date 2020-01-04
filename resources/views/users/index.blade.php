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
                               class="btn btn-sm btn-secondary">{{ __('Filter') }}</a>
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
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                @if ($user->id !== auth()->id())
                                                    <form action="{{ route('user.destroy', $user) }}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <a class="dropdown-item"
                                                           href="{{ route('user.edit', $user) }}">{{ __('Bewerken') }}
                                                        </a>

                                                        <button type="button" class="dropdown-item"
                                                                onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                            {{ __('Verwijderen') }}
                                                        </button>
                                                    </form>
                                                @else
                                                    <a class="dropdown-item"
                                                       href="{{ route('user.edit', $user) }}">{{ __('Bewerken') }}</a>
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
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $users->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
