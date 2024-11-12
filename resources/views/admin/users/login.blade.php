
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/template/admin/dist/css/login.css">
    <title>{{$title}}</title>
</head>
<body >

 

    @include('admin.alert')
    
    <form action="/admin/users/login/store" method="post">
            

    <div class="center-wrapper">
    <div class="box">
        
        <div class="form">
            <h2>{{$title}}</h2>
            <div class="inputbox">
                <input type="text" type="email" name="email" required="required" value="">
                <span >Email</span>
                <i></i>
            </div>
            <div class="inputbox">
                <input type="password" type="password" name="password" required="required" value="">
                <span>Password</span>
                <i></i>
            </div>
            <div class="links">
                <a href="#">Forget Password</a>
                <a href="/admin/users/signup/store">Signup</a>
            </div>
            <input type="submit" value="Login">
        </div>
    </div>
    </div>
            @csrf
    </form>

    

</body>
</html>
