<aside class="main-sidebar {{ config('adminlte.classes_sidebar', ' elevation-4 sidebar-light-teal') }}">

    {{-- Sidebar brand logo --}}
    <a href="#" class="brand-link text-center navbar-light">                    
        <img width="{{env('LOGOMARCA_GERENCIADOR_WIDTH')}}" height="{{env('LOGOMARCA_GERENCIADOR_HEIGHT')}}" src="{{auth()->user()->tenant->getlogoadmin() ?? env('DESENVOLVEDOR_LOGO_ADMIN')}}" alt="{{auth()->user()->tenant->name ?? 'Super Imóveis'}}" class="elevation-3">
    </a>
    @php
        if(!empty(\Illuminate\Support\Facades\Auth::user()->avatar) &&
        \Illuminate\Support\Facades\File::exists(public_path() . '/storage/' . \Illuminate\Support\Facades\Auth::user()->avatar)){
            $cover = \Illuminate\Support\Facades\Auth::user()->url_avatar;
        } else {
            $cover = url(asset('backend/assets/images/image.jpg'));
        }
    @endphp
    {{-- Sidebar menu --}}
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{$cover}}" class="img-circle elevation-2" alt="{{ \Illuminate\Support\Facades\Auth::user()->name }}">
            </div>
            <div class="info">
                <a href="{{ route('users.edit', ['id' => \Illuminate\Support\Facades\Auth::user()->id] )}}" class="d-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
            </div>
        </div>
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                {{-- Configured sidebar links --}}
                @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item') 

                <li class="nav-item has-treeview {{ isActiveMenu('email') }}">
                    <a href="javascript:void(0)" class="nav-link {{ isActive('email') }}">
                        <i class="fas fa-envelope"></i>
                        <p>
                            Email
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('email.send', ['id' => Auth::user()->id, 'parametro' => 'null']) }}" class="nav-link {{ isActive('email.send') }}">
                                <i class="far fa-circle"></i>
                                <p>Enviar Email</p>
                            </a>
                        </li>                            
                        <li class="nav-item">
                            <a href="{{route('listas')}}" class="nav-link {{ isActive('email.send') }}">
                                <i class="far fa-circle"></i>
                                <p>Listas</p>
                            </a>
                        </li>                            
                        <li class="nav-item">
                            <a href="{{route('lista.newsletters.create')}}" class="nav-link {{ isActive('email.send') }}">
                                <i class="far fa-circle"></i>
                                <p>Cadastrar Email</p>
                            </a>
                        </li>                            
                    </ul>
                </li>    

            </ul>
        </nav>
    </div>

</aside>
