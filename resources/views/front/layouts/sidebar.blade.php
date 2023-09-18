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
                        <li><a href="{{ url('admin/admins') }}" key="t-level-1-1">@lang('app.admins')</a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-level-1-2">@lang('app.teacher')</a>
                            <ul class="sub-menu mm-collapse" aria-expanded="true">
                                <li><a href="{{ url('admin/teacher') }}" key="t-level-1-1">@lang('app.teacher')</a></li>
                                <li><a href="{{ url('admin/teacher/create') }}" key="t-level-1-1">@lang('app.create_teacher')</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ url('admin/customers') }}" key="t-level-1-1">@lang('app.customers')</a></li>
                    </ul>
                </li>
               
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-comment-dots "></i>
                        <span key="t-multi-level">@lang('app.teacher_feedback')</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="true">
                        <li><a href="{{ url('admin/teacher_feedback') }}" key="t-level-1-1">@lang('app.teacher_feedback')</a></li>
                    </ul>
                </li>
               
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-info-circle "></i>
                        <span key="t-multi-level">@lang('app.about_acadmy')</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="true">
                        <li><a href="{{ url('admin/about_acadmy') }}" key="t-level-1-1">@lang('app.about_acadmy')</a></li>
                        <li><a href="{{ url('admin/about_acadmy/create') }}" key="t-level-1-1">@lang('app.create_about_acadmy')</a></li>
                    </ul>
                </li>
               
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-table"></i>
                        <span key="t-multi-level">@lang('app.table_prices')</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="true">
                        <li><a href="{{ url('admin/table_prices') }}" key="t-level-1-1">@lang('app.table_prices')</a></li>
                        <li><a href="{{ url('admin/table_prices/create') }}" key="t-level-1-1">@lang('app.create_table_prices')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fab fa-blogger-b"></i>
                        <span key="t-multi-level">@lang('app.blog')</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="true">
                        <li><a href="{{ url('admin/blogs') }}" key="t-level-1-1">@lang('app.blogs')</a></li>
                        <li><a href="{{ url('admin/blog_category') }}" key="t-level-1-1">@lang('app.blog_category')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-shield-alt"></i>
                        <span key="t-multi-level">@lang('app.privacy_policy')</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="true">
                        <li><a href="{{ url('admin/privacy_policy') }}" key="t-level-1-1">@lang('app.privacy_policy')</a></li>
                        <li><a href="{{ url('admin/policy_to_parent') }}" key="t-level-1-1">@lang('app.policy_to_parent')</a></li>
                        <li><a href="{{ url('admin/policy_to_teacher') }}" key="t-level-1-1">@lang('app.policy_to_teacher')</a></li>
                    </ul>
                </li>
               
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-cog"></i>
                        <span key="t-multi-level">@lang('app.settings')</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="true">
                        <li><a href="{{ url('admin/settings') }}" key="t-level-1-1">@lang('app.settings')</a></li>
                        <li><a href="{{ url('admin/roles_permissions') }}" key="t-level-1-1">@lang('app.roles_permissions')</a></li>
                        <li><a href="{{ url('admin/roles_permissions/create') }}" key="t-level-1-1">@lang('app.create_role_permissions')</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>