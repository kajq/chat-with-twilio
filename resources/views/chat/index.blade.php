<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chats(tests)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <form action="{{'/channel/login'}}" method = "get">
        {{ csrf_field()}}
        <button type="submit" class="btn btn-primary"  name="sid">Admin channels</button>                 
    </form>
    <h4>Lista de canales</h4>
    <ul>
        @if(count($channels) < 1 ) <li>There are no channels available. Talk to an administrator</li>
        @endif
        @foreach ($channels as $channel)
                <li>
                    <a href="{{ '/chat/login/'.$channel->sid }} "> {{ $channel->friendlyName }} </a>
                </li>
        @endforeach
    </ul>
</body>
</html>