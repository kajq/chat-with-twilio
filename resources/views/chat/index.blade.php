<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chats</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <h4>Lista de canales</h4>
    <ul>
        @foreach ($channels as $channel)
                <li>
                    <a href='/chat/{{ $channel->sid }}'> {{ $channel->friendlyName }} </a>
                </li>
        @endforeach
    </ul>
</body>
</html>