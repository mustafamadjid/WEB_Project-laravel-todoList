<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('asset/loginRegister.css') }}" />
        
         
        <script
            src="https://kit.fontawesome.com/ffa1f06e44.js"
            crossorigin="anonymous"
        ></script>
    </head>
    <body>
        <div class="container">
            @if ($errors->any())
                <div class="error-alert">
                    <ul class="error">
                    @foreach ($errors->all() as $errorItem)
                        <li>{{ $errorItem }}</li>
                    @endforeach
                </ul>
                </div>
            @endif
            
            
            <div class="form-box">
                <h1 id="title">Sign Up</h1>
                <form action="{{ route('todo.register') }}" method="POST" id="form">
                    @csrf
                    <div class="input-group">
                        <div class="input-field" id="nameField">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="name" placeholder="Nama" value="{{ old('name') }}" />
                        </div>

                        <div class="input-field">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" name="email" placeholder="Email" value="{{ Session::get('email') }}"  />
                            
                        </div>

                        <div class="input-field">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="password" placeholder="Password" />
                            
                        </div>
                    </div>
                    <div class="btn-field">
                        <input type="button" id="signUpBtn" value="Sign Up">
                        <input type="button" id="signInBtn" class="disable" value="Sign In">
                    </div>
                    <div class="btn-submit">
                        <button type="submit" id="signUpBtn"> Submit </button>
                    </div>
                </form>
            </div>
        </div>

        <script src="{{ asset('asset/loginRegister.js') }}"></script>
    </body>
</html>
