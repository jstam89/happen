<div class="card">
    <div class="card-header">
        <h3 class="card-title">Plaats je bestelling</h3>
    </div>

    <div class="card-body">
        <table class="table table-borderless">
            <thead>
            <th>Menu</th>
            <th>Aantal</th>

            </thead>

            <tbody>
            <tr class="cart-row">
                <td class="menu-title">Pasta met Zalm</td>
                <td><select name="quantity">
                        <?php for ($i = 1; $i <= 10; $i++) : ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select></td>
                <td>
                    <a id="cart-item-delete" class="btn btn-sm btn-icon cart-delete" href="#" role="button">
                        <i class="fas fa-times"></i></a>
                </td>
            </tr>
            <tr>
                <td>doreme</td>
                <td><select name="quantity">
                        <?php for ($i = 1; $i <= 10; $i++) : ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select></td>
                <td>
                    <a id="cart-item-delete" class="btn btn-sm btn-icon cart-delete" href="#" role="button">
                        <i class="fas fa-times"></i></a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        <div>
            <button type="submit" id="cart-submit" class="btn btn-primary">{{ __('Bestellen') }}</button>
        </div>
    </div>

</div>




