<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="nav-close">
        <i class="fa fa-times-circle"></i>
    </div>
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span><img alt="image" class="img-circle"
                        src="/public/static/admin/img/profile_small.jpg" height="64" width="64" /></span> <a
                        data-toggle="dropdown" class="dropdown-toggle" href="#"> <span
                        class="clear"> <span class="block m-t-xs"></span> <span
                            class="text-muted text-xs block">影视<b class="caret"></b></span>
                    </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="">安全退出</a></li>
                    </ul>
                </div>
                <div class="logo-element">影视</div>
            </li>
            @foreach($parentmenuList as $key => $val)
            <li>
            <a href="#"><i class="{{$val->icon}}"></i> <span class="nav-label">{{$val->menu_name}}</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    @foreach($lastmenuList[$val['id']] as $k => $v)
                        <li><a class="J_menuItem" href="{{$v->url}}" data-index="0">{{$v->menu_name}}</a></li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
</nav>