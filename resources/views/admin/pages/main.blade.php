@extends('admin.layouts.main-admin-layouts')

@section('content')

    <div id="app">

    <nav id="navbar-main" class="navbar is-fixed-top">
        <div class="navbar-brand">
            <a class="navbar-item mobile-aside-button">
                <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
            </a>
            <div class="navbar-item">
                <div class="control"><input placeholder="Search everywhere..." class="input"></div>
            </div>
        </div>
        <div class="navbar-brand is-right">
            <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
                <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
            </a>
        </div>
        <div class="navbar-menu" id="navbar-menu">
            <div class="navbar-end">
                <div class="navbar-item dropdown has-divider">
                    <a class="navbar-link">
                        <span class="icon"><i class="mdi mdi-menu"></i></span>
                        <span>Sample Menu</span>
                        <span class="icon">
            <i class="mdi mdi-chevron-down"></i>
          </span>
                    </a>
                    <div class="navbar-dropdown">
                        <a href="profile.html" class="navbar-item">
                            <span class="icon"><i class="mdi mdi-account"></i></span>
                            <span>My Profile</span>
                        </a>
                        <a class="navbar-item">
                            <span class="icon"><i class="mdi mdi-settings"></i></span>
                            <span>Settings</span>
                        </a>
                        <a class="navbar-item">
                            <span class="icon"><i class="mdi mdi-email"></i></span>
                            <span>Messages</span>
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item">
                            <span class="icon"><i class="mdi mdi-logout"></i></span>
                            <span>Log Out</span>
                        </a>
                    </div>
                </div>
                <div class="navbar-item dropdown has-divider has-user-avatar">
                    <a class="navbar-link">
                        <div class="user-avatar">
                            <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe" class="rounded-full">
                        </div>
                        <div class="is-user-name"><span>John Doe</span></div>
                        <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
                    </a>
                    <div class="navbar-dropdown">
                        <a href="profile.html" class="navbar-item">
                            <span class="icon"><i class="mdi mdi-account"></i></span>
                            <span>My Profile</span>
                        </a>
                        <a class="navbar-item">
                            <span class="icon"><i class="mdi mdi-settings"></i></span>
                            <span>Settings</span>
                        </a>
                        <a class="navbar-item">
                            <span class="icon"><i class="mdi mdi-email"></i></span>
                            <span>Messages</span>
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item">
                            <span class="icon"><i class="mdi mdi-logout"></i></span>
                            <span>Log Out</span>
                        </a>
                    </div>
                </div>
                <a href="https://justboil.me/tailwind-admin-templates/free-dashboard/" class="navbar-item has-divider desktop-icon-only">
                    <span class="icon"><i class="mdi mdi-help-circle-outline"></i></span>
                    <span>About</span>
                </a>
                <a href="https://github.com/justboil/admin-one-tailwind" class="navbar-item has-divider desktop-icon-only">
                    <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                    <span>GitHub</span>
                </a>
                <a title="Log out" class="navbar-item desktop-icon-only">
                    <span class="icon"><i class="mdi mdi-logout"></i></span>
                    <span>Log out</span>
                </a>
            </div>
        </div>
    </nav>

    <aside class="aside is-placed-left is-expanded">
        <div class="aside-tools">
            <div>
                Admin <b class="font-black">One</b>
            </div>
        </div>
        <div class="menu is-menu-main">
            <p class="menu-label">General</p>
            <ul class="menu-list">
                <li class="active">
                    <a href="index.html">
                        <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                        <span class="menu-item-label">Dashboard</span>
                    </a>
                </li>
            </ul>
            <p class="menu-label">Examples</p>
            <ul class="menu-list">
                <li class="--set-active-tables-html">
                    <a href="tables.html">
                        <span class="icon"><i class="mdi mdi-table"></i></span>
                        <span class="menu-item-label">Tables</span>
                    </a>
                </li>
                <li class="--set-active-forms-html">
                    <a href="forms.html">
                        <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                        <span class="menu-item-label">Forms</span>
                    </a>
                </li>
                <li class="--set-active-profile-html">
                    <a href="profile.html">
                        <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                        <span class="menu-item-label">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="login.html">
                        <span class="icon"><i class="mdi mdi-lock"></i></span>
                        <span class="menu-item-label">Login</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown">
                        <span class="icon"><i class="mdi mdi-view-list"></i></span>
                        <span class="menu-item-label">Submenus</span>
                        <span class="icon"><i class="mdi mdi-plus"></i></span>
                    </a>
                    <ul>
                        <li>
                            <a href="#void">
                                <span>Sub-item One</span>
                            </a>
                        </li>
                        <li>
                            <a href="#void">
                                <span>Sub-item Two</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <p class="menu-label">About</p>
        </div>
    </aside>

    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <ul>
                <li>Admin</li>
                <li>Dashboard</li>
            </ul>
        </div>
    </section>

    <section class="is-hero-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <h1 class="title">
                Dashboard
            </h1>
        </div>
    </section>

    <section class="section main-section">
        <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                                Clients
                            </h3>
                            <h1>
                                512
                            </h1>
                        </div>
                        <span class="icon widget-icon text-green-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                                Sales
                            </h3>
                            <h1>
                                $7,770
                            </h1>
                        </div>
                        <span class="icon widget-icon text-blue-500"><i class="mdi mdi-cart-outline mdi-48px"></i></span>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                                Performance
                            </h3>
                            <h1>
                                256%
                            </h1>
                        </div>
                        <span class="icon widget-icon text-red-500"><i class="mdi mdi-finance mdi-48px"></i></span>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <footer class="footer">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
            <div class="flex items-center justify-start space-x-3">
                <div>
                    © 2022, Tronin.me
                </div>
            </div>
        </div>
    </footer>

    <div id="sample-modal" class="modal">
        <div class="modal-background --jb-modal-close"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Sample modal</p>
            </header>
            <section class="modal-card-body">
                <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
                <p>This is sample modal</p>
            </section>
            <footer class="modal-card-foot">
                <button class="button --jb-modal-close">Cancel</button>
                <button class="button red --jb-modal-close">Confirm</button>
            </footer>
        </div>
    </div>

    <div id="sample-modal-2" class="modal">
        <div class="modal-background --jb-modal-close"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Sample modal</p>
            </header>
            <section class="modal-card-body">
                <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
                <p>This is sample modal</p>
            </section>
            <footer class="modal-card-foot">
                <button class="button --jb-modal-close">Cancel</button>
                <button class="button blue --jb-modal-close">Confirm</button>
            </footer>
        </div>
    </div>

    </div>

@endsection
