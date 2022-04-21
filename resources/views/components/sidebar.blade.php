
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item {{($active == 'home.index')? 'active' : ''}}">
                    <a href="{{route('home.index')}}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                </li>
                @foreach ($menus as $menu)
                @can($menu["gate"])
                <li class="nav-item" >
                    <a data-toggle="collapse" href="#{{$menu['id']}}">
                        <i class="fas {{ $menu['icon']}}"></i>
                        <p>{{ $menu['label']}}</p>
                        <span class="caret"></span>
                    </a>
                    <div class="{{(request()->is($menu['request'])) ? 'collapsed' : 'collapse'}}" id="{{$menu['id']}}">
                         @if (isset($menu['items']))
                         <ul class="nav nav-collapse">
                            @foreach ( $menu['items'] as $item)
                            @can($item["gate"])
                            <li class="{{($active == $item['route'])? 'active' : ''}}">
                                <a href="{{route($item['route'])}}">
                                    <i class="fas {{$item['icon']}}"></i><span >{{ $item['label']}}</span>
                                </a>
                            </li>
                            @endcan
                            @endforeach
                        </ul>@endif
                    </div>
                </li>
                @endcan
                @endforeach    
            </ul>
        </div>
    </div>
</div>