<div class="card ">
    <div class="card-header">
        <h4 class="card-title">Recente orders</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table tablesorter" id="">
                <thead class=" text-primary">
                <th scope="col">{{ __('Order id') }}</th>
                <th scope="col">{{ __('Door') }}</th>
                <th scope="col">{{ __('Besteld op') }}</th>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    @foreach($user->orders->take(5) as $order)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{date('d-m-Y', strtotime($order->ordered_at))}}</td>
                            <td>
                                <button type="submit"
                                        class="btn btn-icon btn-sm pull-right ">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

