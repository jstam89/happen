<div class="card ">
    <div class="card-header">
        <button type="submit"
                class="btn btn-icon btn-sm pull-right ">
            <i class="fas fa-list"></i>
        </button>
        <h4 class="card-title">Recente orders</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table tablesorter" id="">
                <thead class=" text-primary">
                <th scope="col">{{ __('ID') }}</th>
                <th scope="col">{{ __('Naam') }}</th>
                <th scope="col">{{ __('Besteld op') }}</th>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    @foreach($user->orders->take(5) as $order)

                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $order->ordered_at }}</td>
                            <td>
                                <button type="button" class="btn btn-sm" data-toggle="modal"
                                        data-target="#orderModal">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
            <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel"
                 aria-hidden="true">
                <div class="card modal-dialog" role="document">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-text" id="exampleModalLabel">Uw bestelling</h4>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Pasta met Zalm</h5>
                            <h5 class="card-title">Afhaaldatum</h5>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary">Sluiten</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Verwijderen</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

