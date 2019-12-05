<div class="card ">
    <div class="card-header">
        <h4 class="card-title">Nieuwe gebruikers</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table tablesorter" id="">
                <thead class=" text-primary">
                <th scope="col">{{ __('Naam') }}</th>
                <th scope="col">{{ __('Email') }}</th>
                <th scope="col">{{ __('Creation Date') }}</th>
                </thead>
                <tbody>
                @foreach ($users->take(5) as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
