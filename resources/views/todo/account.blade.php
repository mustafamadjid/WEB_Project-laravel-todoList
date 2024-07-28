<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=svccvcvcvcv, initial-scale=1.0" />
        <link rel="stylesheet" href="{{ asset('asset/account.css') }}" />
        <link rel="stylesheet" href="{{ asset('asset/styles.css') }}">
        <script
            src="https://kit.fontawesome.com/ffa1f06e44.js"
            crossorigin="anonymous"
        ></script>
        <title>Document</title>
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
        <div class="container">
            <div class="profile-wrapper">
                <div class="profile-content">
                    <div class="desc-user">
                        @foreach ($users as $data)
                            @if ($data->id == session('userId'))
                                <form action="{{ route('todo.updateUser')}}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="username input-field">
                                        <label for="username">Username</label>
                                        <input type="text" id="username" name="name" value="{{ $data->name }}" disabled>
                                        
                                    </div>
                                    <div class="email input-field">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" value="{{ $data->email }}" disabled>
                                    </div>

                                    <div class="button-group">
                                        <button id="edit-button" type="button"><i class="fa-solid fa-pen-to-square" ></i></button>
                                        <input type="submit" id="submit-button" class="submit " value="update">
                                        <button type="button" id="cancel-button" class="cancel show-cancel"><i class="fa-solid fa-xmark"></i></button>
                                    </div>
                                    
                                    
                                </form>
                                   
                            @endif
                                         
                        @endforeach
                    </div>
                    <div class="logo-user">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset("asset/account.js") }}"></script>
        <script src="{{ asset('asset/styles.js') }}"></script>
    </body>
</html>
