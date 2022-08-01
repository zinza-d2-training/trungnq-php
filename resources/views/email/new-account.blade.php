<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="">
        <h1> Email của bạn vừa được đăng ký:</h1>
        <p> Name:{{ $user['name'] }}</p>
        <p> Tài khoản:{{ $user['email'] }}</p>
        <p> Mật khẩu:{{ $user['password'] }}</p>
    </div>
</body>

</html>
