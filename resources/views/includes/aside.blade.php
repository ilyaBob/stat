<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()?->name}}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Меню</li>
                <li class="nav-item">
                    <a href="{{ route('trade.index') }}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>Торговля</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>Продукты</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('client.index') }}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>Клиенты</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('setting.index') }}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>Настройки</p>
                    </a>
                </li>

                @if(auth()->user()?->isAdmin())
                    <li class="nav-header">Меню админа</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.products-am.index') }}" class="nav-link">
                            <i class="nav-icon far fa-image"></i>
                            <p>Продукты</p>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
    </div>
</aside>
