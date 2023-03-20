<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="/assets/css/main/app.css">
    <link rel="stylesheet" href="/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="/assets/images/logo/favicon.png" type="image/png">

    <link rel="stylesheet" href="/assets/css/shared/iconly.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="/assets/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="/assets/css/pages/simple-datatables.css">
    <link rel="stylesheet" href="/assets/extensions/choices.js/public/assets/styles/choices.css" />

    <style>
        div.dataTable-top {
            padding: 5px 0;
        }

        .choices__inner {
            background-color: white
        }
    </style>
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a href="index.html"><img src="/assets/images/logo/logo.svg" alt="Logo" /></a>
                        </div>
                        <div class="header-top-right">
                            <div class="dropdown">
                                <a href="#" id="topbarUserDropdown"
                                    class="user-dropdown d-flex align-items-center dropend dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar avatar-md2">
                                        <img src="/assets/images/faces/1.jpg" alt="Avatar" />
                                    </div>
                                    <div class="text">
                                        <h6 class="user-dropdown-name">{{ Auth::user()->name }}</h6>
                                        <p class="user-dropdown-status text-sm text-muted">
                                            Admin
                                        </p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg"
                                    aria-labelledby="topbarUserDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>

                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar">
                    <div class="container">
                        <ul>
                            <li class="menu-item active">
                                <a href="{{ route('admin.scan') }}" class="menu-link ">
                                    <span><i class="bi bi-camera-fill"></i> Scan</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('admin.siswa') }}" class="menu-link">
                                    <span><i class="bi bi-people-fill"></i> Siswa</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('admin.registrasi') }}" class="menu-link">
                                    <span><i class="bi bi-clock-history"></i> Riwayat Registrasi</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </header>

            <div class="content-wrapper container">
                <div class="page-content">
                    <section>
                        @yield('content')
                    </section>
                </div>
            </div>
        </div>
    </div>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/app.js"></script>
    <script src="/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="/assets/js/pages/simple-datatables.js"></script>
    <script src="/assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
    <script src="/assets/js/pages/form-element-select.js"></script>
    <script>
        const appBody = document.body;
        if (localStorage.getItem('theme') == 'theme-dark') {
            localStorage.setItem('theme', "theme-light")
            appBody.classList.add("theme-light");
        } else {
            localStorage.setItem('theme', "theme-light")
            appBody.classList.add("theme-light");
        };
    </script>
    @stack('script')
</body>

</html>

{{-- Kalo Dipake --}}
{{-- <li class="menu-item has-sub">
    <a href="#" class="menu-link">
        <span><i class="bi bi-life-preserver"></i> Support</span>
    </a>
    <div class="submenu">
        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
        <div class="submenu-group-wrapper">
            <ul class="submenu-group">
                <li class="submenu-item">
                    <a href="https://zuramai.github.io/mazer/docs"
                        class="submenu-link">Documentation</a>
                </li>

                <li class="submenu-item">
                    <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md"
                        class="submenu-link">Contribute</a>
                </li>

                <li class="submenu-item">
                    <a href="https://github.com/zuramai/mazer#donation"
                        class="submenu-link">Donate</a>
                </li>
            </ul>
        </div>
    </div>
</li> --}}
