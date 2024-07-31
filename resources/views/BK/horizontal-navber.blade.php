<nav class="bottom-navbar">
    <div class="container">
        <ul class="nav page-navigation">
            <li class="nav-item {{ Request::is('admin/dashboard') ? 'pp' : '' }}">
                <a class="nav-link" href="{{ url('admin/dashboard') }}">
                    <i class="mdi mdi-file-document-box menu-icon" style="color: unset"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li
                class="nav-item {{ Request::is('admin/categories/*') || Route::is('admin.categories.index') || Route::is('admin.categories.create') || Route::is('admin.categories.edit') ? 'pp' : '' }}">
                <a href="{{ url('admin/categories') }}" class="nav-link">
                    <i class="mdi mdi-apple-keyboard-command menu-icon" style="color: unset"></i>
                    <span>Categories</span>
                </a>
            </li>
            <li
                class="nav-item {{ Request::is('admin/tags/*') || Route::is('admin.tags.index') || Route::is('admin.tags.create') || Route::is('admin.tags.edit') ? 'pp' : '' }}">
                <a href="{{ url('admin/tags') }}" class="nav-link">
                    <i class="mdi mdi-tag-multiple menu-icon" style="color: unset" style="color: unset"></i>
                    <span>Tags</span>
                </a>
            </li>
            <li
                class="nav-item {{ Request::is('admin/blogs/*') || Route::is('admin.blogs.index') || Route::is('admin.blogs.create') || Route::is('admin.blogs.edit') ? 'pp' : '' }}">
                <a href="{{ url('admin/blogs') }}" class="nav-link">
                    <i class="mdi mdi-blogger menu-icon" style="color: unset"></i>
                    <span>Blogs</span>
                </a>
            </li>
            <li
                class="nav-item {{ Request::is('admin/users/*') || Route::is('admin.users.index') || Route::is('admin.users.create') || Route::is('admin.users.edit') ? 'pp' : '' }}">
                <a href="{{ url('admin/users') }}" class="nav-link">
                    <i class="mdi mdi-account-multiple menu-icon" style="color: unset"></i>
                    <span>Users</span>
                </a>
            </li>
            <li
                class="nav-item {{ Request::is('admin/admins/*') || Route::is('admin.admins.index') || Route::is('admin.admins.create') || Route::is('admin.admins.edit') ? 'pp' : '' }}">
                <a href="{{ url('admin/admins') }}" class="nav-link">
                    <i class="mdi mdi-account-key menu-icon" style="color: unset"></i>
                    <span>Admins</span>

                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/subscribers') ? 'pp' : '' }}">
                <a href="{{ url('admin/subscribers') }}" class="nav-link">
                    <i class="mdi mdi-bell-ring menu-icon" style="color: unset"></i>
                    <span>Subscribers</span>

                </a>
            </li>
        </ul>
    </div>
</nav>
