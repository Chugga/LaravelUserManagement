<?php ?>

<nav class="navbar-default navbar-static-side" role="navigation" style="z-index: 1000000000;">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <strong class="font-bold" style="color: white;">{{Auth::user()->name}}</strong>
                </div>
            </li>
            @foreach(Config::get('navigation.sidebar_items') as $item)
                @if($item['privilege'] <= Auth::user()->privilege)
                    @if(isset($item['route_name']))
                        <li class="{{Route::currentRouteName() == $item['route_name'] ? 'active' : ''}}">
                            <a href="{{URL::route($item['route_name'])}}" style="background-color:#2F4050;"><span class="nav-label"><i class="fa {{ $item['icon'] }}"></i>{{ $item['display'] }}</span></a>
                        </li>
                    @else
                        <li class="{{in_array(Route::currentRouteName(),NavHelper::routes($item['links']))?'active' : ''}} ">
                            <a href=""><i class="fa {{ $item['icon'] }}"></i> <span class="nav-label">{{ $item['display'] }}</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                @foreach($item['links'] as $link)
                                    @if($link['privilege'] <= Auth::user()->privilege)
                                        <li class="{{Route::currentRouteName() == $link['route_name'] ? 'active' : ''}}">
                                            <a href="{{URL::route($link['route_name'])}}" style="background-color:#2F4050;"><i class="fa {{ $link['icon'] }}"></i><span class="nav-label">{{ $link['display'] }}</span></a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endif
            @endforeach
        </ul>
    </div>
</nav>