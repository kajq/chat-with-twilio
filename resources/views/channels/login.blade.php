<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <h4>Admin Login</h4>
    <form action="{{'/channel/validate_login'}}" method="post">
        {{ csrf_field() }}
        <label for="username">username: </label>
        <input type="text" name="username" required>
        <label for="password">password: </label>
        <input type="password" name="password" required>
        <button type="submit" class="btn btn-primary" >Login</button>                 
    </form>
    {{$msj}}
    <form action="{{'/'}}" method="get">
        {{ csrf_field()}}
        <button type="submit" class="btn btn-primary" >Cancelar</button>                 
    </form>
</body>
</html> 