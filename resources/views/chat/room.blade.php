<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Room</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <div>
        <label for="Chat">Chat: {{ $channel->friendlyName }} </label> <br>
        <label for="Username">User: {{ $member->identity }} </label>
        
        <h4>Members List</h4>
        @foreach ($members as $user)
                    <li>{{ $user->identity }} </li>
        @endforeach
    </div>
</body>
</html>