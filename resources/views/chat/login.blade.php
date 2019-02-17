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
    <h4>Login Chat: {{ $channel->friendlyName }} </h4>
    <form action="{{'/chat/valide_user'}}" method="post">
        {{ csrf_field() }}
        <label for="name">name: </label>
        <input type="text" name="name" required>
        <button type="submit" class="btn btn-primary" name="sid" value="{{ $channel->sid }}">Agregar</button>                 
    </form>
    <form action="{{'/'}}" method="get">
        {{ csrf_field()}}
        <button type="submit" class="btn btn-primary" >Cancelar</button>                 
    </form>
</body>
</html> 