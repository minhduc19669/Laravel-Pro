
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Đăng nhập admin</title>
    <link rel="stylesheet" href="{{asset('style/style.css')}}">
    <link rel="stylesheet" href="{{asset('style/fontawesome/css/all.css')}}">
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
</head>
<body>
@include('sweetalert::alert')
<header>
    <div class="container">
        <h1 align="center">ADMIN LOGIN </h1>
    </div>
</header>
<!--endheader-->
<div class="body">
    <div class="container">
        <div id="formlogin">
            <form method="post" name="login-form" action="{{route('admin.login')}}">
                {{ csrf_field() }}
                @foreach($errors->all() as $val)
                    <ul>
                        <li>{{$val}}</li>
                    </ul>
                @endforeach
                <h3>Login System for admin</h3>
                <br>
                <table>
                    <tr height="50px">
                        <td>
                            Account
                        </td>
                        <td>
                            <input type="text" name="email">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Password
                        </td>
                        <td>
                            <input id="submit" type="password" name="password">
                        </td>
                    </tr>
                </table>
                <b style="color: red;"></b>
                <input id="btndangnhap" type="submit" name="login" value="Login">
            </form>
        </div>
    </div>
</div>
<!--endbody-->
<footer>
    <div class="container">
        <div id="ftcontent"></div>
    </div>
</footer>
</body>
</html>

