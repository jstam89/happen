<div class="card">
    <div class="card-header">
        <h3 class="card-title">Plaats je bestelling</h3>
    </div>
    <form method="post" action="{{ route('order.store') }}">
        @csrf
        <div class="card-body">
            <table class="table table-borderless" id="cartTable">
                <thead>
                <th>Menu</th>
                <th>Aantal</th>
                </thead>

                <tbody class="cart-items">
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <div>
                <button type="submit" id="cart-submit" class="btn btn-primary">{{ __('Bestellen') }}</button>
            </div>
        </div>
    </form>
</div>




