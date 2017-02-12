<nav id="topnav_main" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#toggle_topnav">
                <span class="icon-bar" style="backgorund-color: red"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img class="logo" src="../../../public/img/smile.svg">
            </a>

        </div>
        <div id="toggle_topnav" class="collapse navbar-collapse">
            <ul class="nav navbar-nav" id="topnav_left">
                <li class="{{ Request::is('/') ? "active_li" : "" }}" >
                    <a href="/" title="Главная">| Главная</a>
                </li>
                <li class="{{ Request::is('blog') ? "active_li" : "" }}" >
                    <a href="/blog" title="Блог">| Блог</a>
                </li>
                <li>
                    <a href="#" title="Обсуждения">| Обсуждения</a>
                </li>
                <li>
                    <a href="#" title="Приложения">| Приложения</a>
                </li>
                <li class="{{ Request::is('about') ? "active_li" : "" }}" >
                    <a href="/about" title="О сайте">| О сайте</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" id="topnav_left">

                @if(Auth::check())

                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Привет, {{ Auth::user()->name }}<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu" >
                            <li><a href=" {{ route('posts.index') }} ">Посты</a></li>
                            <li><a href=" {{ route('categories.index') }} ">Категории</a></li>
                            <li><a href=" {{ route('tags.index') }} ">Тэги</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('logout') }}">Выйти</a></li>
                        </ul>
                    </li>

                @else

                    <li class="{{ Request::is('login') ? "active_li" : "" }}" >
                        <a href="{{ route('login') }}" title="Вход">Вход</a>
                    </li>
                    <li class="{{ Request::is('register') ? "active_li" : "" }}" >
                        <a href="/register" title="Регистрация">Регистрация</a>
                    </li>

                @endif

            </ul>

            <form class="navbar-form navbar-right" id="field_search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Поиск">
                </div>
            </form>
        </div>
    </div>
</nav>
