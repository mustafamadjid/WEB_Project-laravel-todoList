<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('asset/styles.css') }}" />
        <link
            href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
            rel="stylesheet"
        />
        <script
            src="https://kit.fontawesome.com/ffa1f06e44.js"
            crossorigin="anonymous"
        ></script>
    </head>
    <body>
        <header class="header">
                <h1>TODO LIST</h1>
                <nav class="navbar">
                    <div class="links">
                        <a class="menu-1" href="{{route('todo.viewHome')}}">Beranda</a>
                        <a class="menu-2" href="{{route('todo.viewAboutUs')}}">Tentang Kami</a>
                        <a class="menu-3" href="{{route('todo')}}">Tugas saya</a>
                        
                        

                        @if (Auth::check())
                            <a class="btn-user" href="{{route('todo.user')}}">Profil</a>
                            <a class="btn-logout" href="{{route('todo.logout')}}">Keluar</a>
                        @else
                            <a class="btn-login" href="{{route('todo.loginRegister')}}">Masuk</a>
                        @endif

                    </div>
                    
                    <i class="fa-solid fa-bars bars" id="bars-dropdown"></i>
                   </nav>
            </header>

            <div class="dropdown-links" id="dropdown">
                <a class="menu-1" href="{{route('todo.viewHome')}}">Beranda</a>
                <a class="menu-2" href="{{route('todo.viewAboutUs')}}">Tentang Kami</a>
                <a class="menu-3" href="{{route('todo')}}">Tugas saya</a>
                
                

                @if (Auth::check())
                    <a class="btn-user" href="{{route('todo.user')}}">Profil</a>
                    <a class="btn-logout" href="{{route('todo.logout')}}">Keluar</a>
                @else
                    <a class="btn-login" href="{{route('todo.loginRegister')}}">Masuk</a>
                @endif

            </div>

        <main class="container">
            <div class="title">
                
            </div>
            <section class="content-aboutUS">
                <div class="content-1">
                    <p>
                        TODO LIST merupakan website yang menyediakan alat bantu penunjang produktivitas
                        anda melalui penjadwalan tugas-tugas harian. Kami berkomitmen untuk memberikan yang
                        terbaik bagi pengguna layanan kami.
                    </p>

                    <img src="https://img.freepik.com/free-vector/modern-productivity-concept-with-flat-design_23-2147972848.jpg" alt="" />
                </div>
                <div class="contact">
                    <h2>Contact Us</h2>
                    <a href="https://github.com/mustafamadjid" target="_blank"
                        ><i class="bx bxl-github"></i
                    ></a>
                    <a
                        href="https://www.linkedin.com/in/mustafa-madjid-60a330245/"
                        target="_blank"
                        ><i class="bx bxl-linkedin"></i
                    ></a>
                    <a
                        href="https://www.instagram.com/mustafamadjid/"
                        target="_blank"
                        ><i class="bx bxl-instagram"></i
                    ></a>
                </div>
            </section>
        </main>
        <script src="{{ asset('asset/styles.js') }}"></script>
    </body>
</html>
