<nav id="topnav_main" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#toggle_topnav">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img src="../../../public/img/smile.svg">
            </a>

        </div>
        <div id="toggle_topnav" class="collapse navbar-collapse">
            <ul class="nav navbar-nav" id="topnav">
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
            <ul class="nav navbar-nav navbar-right" id="topnav">
                <li class="nav_a">
                    <a href="#" title="Регистрация">Регистрация</a>
                </li>
                <li class="nav_a">
                    <a href="#" title="Вход">Вход</a>
                </li>
            </ul>
            <form class="navbar-form navbar-right" id="field_search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Поиск">
                </div>
            </form>
        </div>
    </div>
</nav>
