<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hello, {{ $fullname }}</h1>
    <p>Eamil: {{$user['email']}}</p>
    <p><strong>Password:</strong> {{ $password }}</p>
    <p>Your account has been created successfully. Click here to login: <a href="{{ route('login')}}">Here</a></p>
</body>
</html>