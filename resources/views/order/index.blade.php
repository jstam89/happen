@extends('layouts.app', ['pageSlug' => 'order'])

@section('content')

    <div class="row">
        <div class="col-md-7">

            @foreach($menus as $menu)
                <div class="card menu-item">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <h5 class="card-category menu-date">{{$menu->takeout_date}}</h5>
                                <h2 class="card-title menu-title">{{$menu->title}}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <p>{{$menu->info}}</p>
                    </div>

                    <div class="card-footer">
                        <button type="submit"
                                class="add-to-cart btn btn-icon pull-right ">
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="col-md-5">
            @include('partials.cart')
        </div>
    </div>

    <script async>

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', ready)
        } else {
            ready();
        }

        function ready() {
            const removeCartItemButton = document.getElementsByClassName('cart-delete');
            for (let i = 0; i < removeCartItemButton.length; i++) {
                const button = removeCartItemButton[i];
                button.addEventListener('click', removeCartItem);
            }

            const addToCartButton = document.getElementsByClassName('add-to-cart');
            for (let i = 0; i < addToCartButton.length; i++) {
                const button = addToCartButton[i];
                button.addEventListener('click', addToCartClicked);
            }
        }

        function removeCartItem(event) {
            const buttonClicked = event.target;
            buttonClicked.parentElement.parentElement.parentElement.remove();
        }

        function addToCartClicked(event) {
            const button = event.target;
            const menuItem = button.parentElement.parentElement.parentElement;
            const title = menuItem.getElementsByClassName('menu-title')[0].innerHTML;
            const date = menuItem.getElementsByClassName('menu-date')[0].innerHTML;
            addItemToCart(title, date)
        }

        function addItemToCart(title, date) {
            const cartRow = document.createElement('tr');
            cartRow.classList.add('cart-row');
            const cartItems = document.getElementsByClassName('cart-items')[0];
            const cartItemTitle = document.getElementsByClassName('cart-item-title');
            for (let i = 0; i < cartItemTitle.length; i++) {
                if (cartItemTitle[i].innerText === title) {
                    alert('menu is al aanwezig');
                    return;
                }
            }
            cartRow.innerHTML = `
            <tr>
                <td class="cart-item-title">
                <input type="hidden" value="${title}" name="item[]">${title}</td>
                <td><select name="quantity[${title}]">
                        <?php for ($i = 1; $i <= 10; $i++) : ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
            </select>
                </td>
                <td>
        <a id="cart-item-delete" class="btn btn-sm btn-icon cart-delete" href="#" role="button">
        <i class="fas fa-times"></i></a>
                </td>
              </tr>
`;
            cartItems.append(cartRow);
            cartRow.getElementsByClassName('cart-delete')[0].addEventListener('click', removeCartItem);
        }

    </script>


@endsection
