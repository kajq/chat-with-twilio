<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Room</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="fixed-top" style="width: 150px;"> 
        <table>
            <form action="{{'/chat'}}" method="post">
                {{ csrf_field() }}
                <tr>
                    <input type="hidden" name="id_member" readonly value="{{ $member->sid }}">
                    <td><button type="submit" class="btn btn-primary"  name="sid" value="{{ $channel->sid }}" >Refresh</button></td>
                    </form>
                <form action="{{'/'}}" method = "get">
                    {{ csrf_field()}}
                    <td><button type="submit" class="btn btn-danger" >Finish</button></td>
                </tr>
            </form>
        </table> 
        <h6>Members List</h6>
        <ul class="list-group">
        @foreach ($members as $user)            
                @if ($user->identity == $member->identity)  <li class="list-group-item list-group-item-action active"> 
                @else                                       <li class="list-group-item list-group-item-action">
                @endif
                {{ $user->identity }}
            </li>
        @endforeach
        </ul>    
    </div>
    <div class="mx-auto" style="width: 700px;">
        <h4>Chat: {{ $channel->friendlyName }} </h4>
        <table class="table">
        <tr>
            <form action="{{'/chat/room'}}" method="post">
                <td>{{ csrf_field() }}
                    <input type="hidden" name="from" readonly value="{{ $member->identity }}">
                    <label for="msj">Message:</label>
                </td>
                <td>
                    <input type="text" name="msj" maxlength="40" required>
                </td>
                <td>
                    <button type="submit" class="btn btn-primary" name="sid" value="{{ $channel->sid }}">Send</button>                 
                </td>
            </form>
        </tr>
        <tr>
            <th scope="row">User</td>
            <th scope="row">Message</td>
            <th scope="row">Time</td>
        </tr>
        @if(count($messages) < 1 ) <tr><td colspan =2>There are no messages in this chat</td></tr>
        @endif
        @foreach ($messages as $msj)
        <tr>
            <td>{{ $msj->from }}</td>
            <td>{{ $msj->body }}</td>
            <td>{{ $msj->dateCreated->format('d/m/Y H:i:s') }}</td> 
        </tr>           
        @endforeach
        </table>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>