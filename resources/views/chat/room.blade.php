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
        <form action="{{'/chat'}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id_member" readonly value="{{ $member->sid }}">
            <button type="submit" class="btn btn-primary"  name="sid" value="{{ $channel->sid }}" >Refresh</button>                 
        </form>   
        <form action="{{'/'}}" method = "get">
            {{ csrf_field()}}
            <button type="submit" class="btn btn-primary" >Finish</button>                 
        </form>     
        <h4>Members List</h4>
        @foreach ($members as $user)
                    <li>{{ $user->identity }} </li> 
        @endforeach
    </div>
    <div>
        <table>
        <tr>
            <td>User</td>
            <td>Time</td>
            <td>Message</td>
        </tr>
        @foreach ($messages as $msj)
        <tr>
            <td>{{ $msj->from }}</td>
            <td>{{ $msj->dateCreated->format('d/m/Y H:i:s') }}</td>
            <td>{{ $msj->body }}</td>
        </tr>           
        @endforeach
        <tr>
            <form action="{{'/chat/room'}}" method="post">
                <td>{{ csrf_field() }}
                    <input type="hidden" name="from" readonly value="{{ $member->identity }}">
                    <label for="msj">Msj:</label>
                </td>
                <td>
                    <input type="text" name="msj" required>
                </td>
                <td>
                    <button type="submit" class="btn btn-primary" name="sid" value="{{ $channel->sid }}">Send</button>                 
                </td>
            </form>
        </tr>
        </table>
    </div>
</body>
</html>