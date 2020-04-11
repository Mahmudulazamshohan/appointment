<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>
    <a href="{{url('/')}}" class="brand-link">
        <span class="brand-text font-weight-light">Visit Website</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <p>
                            <i class="fas fa-fw fa-tachometer-alt">

                            </i>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.userManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('category_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.categories.index") }}" class="nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-cannabis">

                            </i>
                            <p>
                                <span>{{ trans('cruds.category.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('customer_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.customers.index") }}" class="nav-link {{ request()->is('admin/customers') || request()->is('admin/customers/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-user-astronaut">

                            </i>
                            <p>
                                <span>{{ trans('cruds.customer.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('appointment_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.appointments.index") }}" class="nav-link {{ request()->is('admin/appointments') || request()->is('admin/appointments/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-calendar-alt">

                            </i>
                            <p>
                                <span>{{ trans('cruds.appointment.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('specialist_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.specialists.index") }}" class="nav-link {{ request()->is('admin/specialists') || request()->is('admin/specialists/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-user-md">

                            </i>
                            <p>
                                <span>{{ trans('cruds.specialist.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('setup_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/frontend-settings*') ? 'menu-open' : '' }} {{ request()->is('admin/references*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-cogs">

                            </i>
                            <p>
                                <span>{{ trans('cruds.setup.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route("admin.app-default-settings.index") }}" class="nav-link {{ request()->is('admin/app-default-settings') || request()->is('admin/app-default-settings/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-chalkboard-teacher">

                                    </i>
                                    <p>
                                        <span>{{ trans('cruds.app_default_setting.title') }}</span>
                                    </p>
                                </a>
                            </li>
                            @can('frontend_setting_access')
                                <li class="nav-item">
                                    <a href="{{ url('admin/frontend-settings/1/edit') }}" class="nav-link {{ request()->is('admin/frontend-settings') || request()->is('admin/frontend-settings/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-cogs">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.frontendSetting.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('reference_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.references.index") }}" class="nav-link {{ request()->is('admin/references') || request()->is('admin/references/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-chalkboard-teacher">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.reference.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('reservation_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.reservations.index") }}" class="nav-link {{ request()->is('admin/reservations') || request()->is('admin/reservations/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-cogs">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.reservation.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('service_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.services.index") }}" class="nav-link {{ request()->is('admin/services') || request()->is('admin/services/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-cogs">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.service.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan                          
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route("admin.systemCalendar") }}" class="nav-link {{ request()->is('admin/system-calendar') || request()->is('admin/system-calendar/*') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-calendar">

                        </i>
                        <p>
                            <span>{{ trans('global.systemCalendar') }}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt"></i>
                            @php
                                $uname = explode(' ', Auth::user()->name);
                            @endphp
                            <span>{{ trans('global.logout') }} ({{ array_pop($uname) }})</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>