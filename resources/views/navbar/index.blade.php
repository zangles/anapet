<div class="row border-bottom white-bg">
    <nav class="navbar navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                <i class="fa fa-reorder"></i>
            </button>
            <img src="{{ asset('img/logo-small.png') }}" alt="" style="max-height: 50px">
            <a href="#" class="navbar-brand">{{ config('app.name', 'Laravel') }}</a>
        </div>

        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li {{ Request::is('/*') ? 'class=active' : '' }}>
                    <a aria-expanded="false" role="button" href="{{ route('home') }}">Dashboard</a>
                </li>
                <li {{ Request::is('contacts*') ? 'class=active' : '' }} >
                    <a aria-expanded="false" role="button" href="{{ route('contacts.index') }}"><i class="fa fa-users"></i> Contacts</a>
                </li>
                <li {{ Request::is('turns*') ? 'class=active' : '' }}>
                    <a aria-expanded="false" role="button" href="{{ route('turns.index') }}"><i class="fa fa-calendar"></i>Turns</a>
                </li>
                <li>
                    <a aria-expanded="false" role="button" href="#"><i class="fa fa-gears"></i>Config</a>
                </li>
            </ul>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</div>