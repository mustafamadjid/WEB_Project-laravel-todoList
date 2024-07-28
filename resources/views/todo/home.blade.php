<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('asset/styles.css') }}" />
        <script
            src="https://kit.fontawesome.com/ffa1f06e44.js"
            crossorigin="anonymous"
        ></script>
    </head>
    <body>
        <div class="container">
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

            <main class="main-content">
                <div class="text-content">
                    <h2>Selamat Datang Di Website Kami</h2>
                    <p>
                        Website kami menyediakan tracker yang bisa digunakan
                        untuk mencatat tugas harian yang harus dilakukan
                        sehingga membantu anda tetap produktif
                    </p>
                    <a href="{{route('todo')}}">Mulai Membuat Daftar</a>
                </div>

                <div class="img-content">
                    <img
                        src="https://img.freepik.com/premium-vector/list-concept-illustration_270158-346.jpg"
                        alt=""
                    />
                </div>
            </main>

            <section class="side-content">
                <h1>Mengapa harus menggunakan TODO LIST?</h1>
                <div class="box-grid">
                    <div class="box-1 box">
                        <h2>Kemudahan</h2>
                        <p>Anda dapat membuat daftar tugas harian dengan mudah menggunakan bantuan dari aplikasi kami</p>
                    </div>
                    <div class="box-2 box">
                        <h2>Dapat digunakan dimana saja</h2>
                        <p>Anda dapat mengakses daftar tugas harian dimana saja dan kapan saja melalui semua platform</p>
                    </div>
                    <div class="box-3 box">
                        <h2>Kenyamanan</h2>
                        <p>Buat daftar tugas harian anda dengan nyaman dan mudah menggunakan TODO LIST</p>
                    </div>
                </div>
                
            </section>
        </div>

        <script src="{{ asset('asset/styles.js') }}"></script>
    </body>
</html>
