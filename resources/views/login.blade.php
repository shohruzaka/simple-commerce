<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook-Login or Sign up</title>
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
</head>

<body>
    <main>
        <div class="row">
            <div class="colm-form">
                <div class="form-container">
                    <form action="{{route('auth')}}" method="post">
                        @csrf
                        <input type="text" placeholder="ism" name="ism">
                        <input type="text" placeholder="familiya" name="fam">
                        <button type="submit" class="btn-login">Login</button>
                    </form>     
            </div>
        </div>
    </main>
</body>
</html>