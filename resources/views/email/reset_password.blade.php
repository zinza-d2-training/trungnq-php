<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Xin chào {{$mailData['email']}}</h1>
    <p>Mật khẩu của bạn đã được thay đổỉ thành : {{$mailData['password']}}</p>
    <p>Vui lòng kiểm tra và thay đổi mật khẩu mới</p>
</body>
</html>