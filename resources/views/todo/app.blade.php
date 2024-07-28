@if (Auth::check())
    
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/styles.css') }}" />
    <script
            src="https://kit.fontawesome.com/ffa1f06e44.js"
            crossorigin="anonymous"
        ></script>
</head>

<body class="bg-light">
    
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
    
    <div class="container mt-4">
        <!-- 01. Content-->
        <h1 class="text-center mb-4">Daftar Tugasmu</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
             <div class="card mb-3">
                <div class="card-body">
                     @if (session('success'))
                         <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                         </div>
                     @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $errorItem)
                                    <li>{{ $errorItem }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- 02. Form input data -->
                    <form id="todo-form" action="{{route('todo.post')}}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ session('userId') }}">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="task" id="todo-input"
                                placeholder="Tambah task baru" value="{{ old('task') }}" required>
                            <button class="btn btn-primary" type="submit">
                                Simpan
                            </button>
                        </div>
                    </form>
                  </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <!-- 03. Searching -->
                        <form id="todo-form" action="{{ route('todo') }}" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" value="{{ request('search') }}" 
                                    placeholder="masukan kata kunci">
                                <button class="btn btn-secondary" type="submit">
                                    Cari
                                </button>
                            </div>
                        </form>
                        
                        <ul class="list-group mb-4" id="todo-list">  
                            @foreach ($data as $item)
                                
                            
                                    <!-- 04. Display Data -->
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="task-text">
                                            
                                                {!! $item -> is_done == '1'?'<del>':'' !!}
                                                {{$item->task}}
                                            {!! $item -> is_done == '1'?'</del>':'' !!}
                                            
                                            
                                        </span>
                                        <input type="text" class="form-control edit-input" style="display: none;"
                                            value="{{$item->task}}">
                                        <div class="btn-group">
                                            <form action="{{ route('todo.delete',['id' => $item->id]) }}" method="POST" 
                                                onsubmit="return confirm('Yakin akan menghapus task ini?')">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm delete-btn">✕</button>
                                            </form>
                                            <button class="btn btn-primary btn-sm edit-btn" data-bs-toggle="collapse"
                                                data-bs-target="#collapse-{{$loop->index}}" aria-expanded="false">✎</button>
                                        </div>
                                    </li>
                                    <!-- 05. Update Data -->
                                    <li class="list-group-item collapse" id="collapse-{{$loop->index}}">
                                        <form action="{{ route('todo.update',['id' => $item->id]) }}" method="POST">
                                            @csrf

                                            @method('put')
                                            <div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="task"
                                                        value="{{$item->task}}">
                                                    <button class="btn btn-outline-primary" type="submit">Update</button>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="radio px-2">
                                                    <label>
                                                        <input type="radio" value="1" name="is_done" {{ $item->is_done == '1'?'checked':'' }}> Selesai
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" value="0" name="is_done" {{ $item->is_done == '0'?'checked':''}}> Belum
                                                    </label>
                                                </div>
                                            </div>
                                        </form>
                                    </li>
                                    
                            @endforeach
                        </ul>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="{{ asset('asset/styles.js') }}"></script>

</body>

</html>
@else   
    <script>
            window.location.href = "{{ route('todo.loginRegister') }}";
    </script>

@endif