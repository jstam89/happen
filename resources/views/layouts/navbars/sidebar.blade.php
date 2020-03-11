<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <img src="{{ asset('black') }}/img/adwise_logo.png" class="navbar-brand-img"
                 alt="...">
        </div>
        <ul class="nav">
            <li @if ($pageSlug ?? '' == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li @if ($pageSlug ?? '' == 'order') class="active " @endif>
                <a href="{{ route('order.home') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ __('Daghap Bestellen') }}</p>
                </a>
            </li>
            <li @if ($pageSlug ?? '' == 'reservation') class="active " @endif>
                <a href="{{ route('reservation.index') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ __('Tafel Reserveren') }}</p>
                </a>
            </li>
            <!-- <li @if ($pageSlug ?? '' == 'survey') class="active " @endif>
                <a href="{{ route('survey.index')  }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ __('Survey Beheer') }}</p>
                </a>
            </li> -->
            <li @if ($pageSlug ?? '' == 'menus') class="active " @endif>
                <a href="{{ route('menus.create')  }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ __('Daghap Toevoegen') }}</p>
                </a>
            </li>
            <li @if ($pageSlug ?? '' == 'users') class="active " @endif>
                <a href="{{ route('user.index')  }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ __('Gebruikers beheren') }}</p>
                </a>
            </li>
            <li @if ($pageSlug ?? '' == 'orders') class="active " @endif>
                <a href="{{ route('orders.manage') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ __('Bestellingen') }}</p>
                </a>
            </li>
            <li @if ($pageSlug ?? '' == 'reserveringen') class="active " @endif>
                <a href="{{ route('reservations.manage') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ __('Reserveringen') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
