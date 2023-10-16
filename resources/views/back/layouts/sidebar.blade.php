<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="mm-active">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled mm-show" id="side-menu">
                {{-- <li class="menu-title" key="t-menu">@lang('app.home')</li> --}}

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-users"></i>
                        <span key="t-multi-level">@lang('app.peoples')</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="true">
                        <li><a href="{{ asset('admin/admins') }}" key="t-level-1-1">@lang('app.admins')</a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-level-1-2">@lang('app.teacher')</a>
                            <ul class="sub-menu mm-collapse" aria-expanded="true">
                                <li><a href="{{ asset('admin/teacher') }}" key="t-level-1-1">@lang('app.teacher')</a></li>
                                <li><a href="{{ asset('admin/teacher/create') }}" key="t-level-1-1">@lang('app.create_teacher')</a></li>
                                <li><a href="{{ asset('admin/teacher_feedback') }}" key="t-level-1-1">@lang('app.teacher_feedback')</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
               
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fab fa-blogger-b"></i>
                        <span key="t-multi-level">@lang('app.blog')</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="true">
                        <li><a href="{{ asset('admin/blogs') }}" key="t-level-1-1">@lang('app.blogs')</a></li>
                    </ul>
                </li>
        
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-cog"></i>
                        <span key="t-multi-level">@lang('app.settings')</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="true">
                        <li><a href="{{ asset('admin/settings') }}" key="t-level-1-1">الإعدادات</a></li>
                        <li><a href="{{ asset('admin/roles_permissions') }}" key="t-level-1-1">الأذونات والتراخيص</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>