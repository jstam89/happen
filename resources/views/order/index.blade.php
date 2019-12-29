@extends('layouts.app', ['pageSlug' => 'order.index'])

@section('content')

    <div id="vue" class="row">
        <div class="col-md-7">
            @foreach($menus as $menu)
                <div class="card menu-item">
                    <div class="card-header ">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <h5 class="card-category menu-date">{{$menu->takeout_date}}</h5>
                                <h2 class="card-title menu-title">{{$menu->title}}</h2>
                                <span class="card menu-id" style="display: none;">{{$menu->id}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <p>{{$menu->info}}</p>
                    </div>

                    <div class="card-footer">
                        @if($menu->takeout_date > \Carbon\Carbon::now())
                            <vue-add-to-cart
                                :menu="{{ $menu }}"
                            ></vue-add-to-cart>
                        @endif
                    </div>
                </div>
            @endforeach

        </div>

        <div class="col-md-5">
            <vue-cart
                :data-menus="{{ json_encode(Session::get('menus')) ?? json_encode([]) }}"
                route-post="{{ route('order.store') }}"
                route-session="{{ route('order.session') }}"
            ></vue-cart>
        </div>
    </div>

{{--    <script async>--}}

{{--        if (document.readyState === 'loading') {--}}
{{--            document.addEventListener('DOMContentLoaded', ready)--}}
{{--        } else {--}}
{{--            ready();--}}
{{--        }--}}

{{--        function ready() {--}}
{{--            let removeCartItemButton = document.getElementsByClassName('cart-delete');--}}
{{--            for (let i = 0; i < removeCartItemButton.length; i++) {--}}
{{--                let button = removeCartItemButton[i];--}}
{{--                button.addEventListener('click', removeCartItem);--}}
{{--            }--}}

{{--            let addToCartButton = document.getElementsByClassName('add-to-cart');--}}
{{--            for (let i = 0; i < addToCartButton.length; i++) {--}}
{{--                let button = addToCartButton[i];--}}
{{--                button.addEventListener('click', addToCartClicked);--}}
{{--            }--}}
{{--        }--}}

{{--        function removeCartItem(event) {--}}
{{--            let buttonClicked = event.target;--}}
{{--            buttonClicked.parentElement.parentElement.parentElement.remove();--}}
{{--        }--}}

{{--        innerHTML = sessionStorage.getItem("lastname");--}}

{{--        function addToCartClicked(event) {--}}
{{--            let button = event.target;--}}
{{--            let menuItem = button.parentElement.parentElement.parentElement;--}}
{{--            let menuid = menuItem.getElementsByClassName('menu-id')[0].innerHTML;--}}
{{--            let title = menuItem.getElementsByClassName('menu-title')[0].innerHTML;--}}
{{--            let takeout = menuItem.getElementsByClassName('menu-date')[0].innerHTML;--}}
{{--            addItemToCart(menuid, title, takeout)--}}
{{--        }--}}

{{--        function addItemToCart(menuid, title, takeout) {--}}
{{--            let cartRow = document.createElement('tr');--}}
{{--            cartRow.classList.add('cart-row');--}}
{{--            let cartItems = document.getElementsByClassName('cart-items')[0];--}}
{{--            let cartItemTitle = document.getElementsByClassName('cart-item-title');--}}
{{--            for (let i = 0; i < cartItemTitle.length; i++) {--}}
{{--                if (cartItemTitle[i].innerText === title) {--}}
{{--                    alert('menu is al aanwezig');--}}
{{--                    return;--}}
{{--                }--}}
{{--            }--}}

{{--            cartRow.innerHTML = `--}}
{{--            <tr>--}}
{{--               <td class="cart-item-title">--}}
{{--                <input type="hidden" value="${title}" name="cart[${cartItemTitle.length}][product_name]]">${title}--}}
{{--                </td>--}}
{{--                <td><select class="form-control" style="background-color:#27293d;" name="cart[${cartItemTitle.length}][quantity]]">--}}
{{--                        <?php for ($i = 1; $i <= 10; $i++) : ?>--}}
{{--            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>--}}
{{--                        <?php endfor; ?>--}}
{{--            </select>--}}
{{--                </td>--}}
{{--                <td>--}}
{{--        <a id="cart-item-delete" class="btn btn-sm btn-icon cart-delete" href="#" role="button">--}}
{{--        <i class="fas fa-times"></i></a>--}}
{{--                </td>--}}
{{--                <td>--}}
{{--                    <input type="hidden" id="${takeout}" name="cart[${cartItemTitle.length}][takeout_date]]" value="${takeout}">--}}
{{--                   <input type="hidden" id="${menuid}" name="cart[${cartItemTitle.length}][menu_id]]" value="${menuid}">--}}

{{--                </td>--}}
{{--               </tr>--}}
{{--`;--}}
{{--            cartItems.append(cartRow);--}}
{{--            cartRow.getElementsByClassName('cart-delete')[0].addEventListener('click', removeCartItem);--}}

{{--        }--}}

{{--    </script>--}}


@endsection
