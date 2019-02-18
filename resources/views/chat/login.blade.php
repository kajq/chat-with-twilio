<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="main.js"></script>
</head>
<body>
    <div class="mx-auto" style="width: 400px;">
        <br>
        <h4>Login Chat: {{ $channel->friendlyName }} </h4>
        <table>
            <form action="{{'/chat/valide_user'}}" method="post">
                <tr>
                    {{ csrf_field() }}
                    <td><label for="name">Friendly Name: </label></td>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <td><button type="submit" class="btn btn-primary" name="sid" value="{{ $channel->sid }}">Login</button></td>
            </form>
            <form action="{{'/'}}" method="get">
                {{ csrf_field()}}
                    <td><button type="submit" class="btn btn-danger" >Cancel</button></td>
                </tr>
            </form>
        </table>    
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html> 