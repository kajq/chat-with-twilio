<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Channels</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="main.js"></script>
</head>
<body>
    <div class="mx-auto" style="width: 700px;">
    <h4>Manage channels</h4>
        <table class="table">
            @if($channel <> null)
                <tr>
                    <form action="{{'/channel/update'}}" method="post">
                        {{ csrf_field() }}
                        <td><label for="channelname">Edit Name: </label></td>
                        <td><input type="text" name="channelname" value="{{ $channel->friendlyName }}"></td>
                        <td></td>
                        <td><button type="submit" class="btn btn-primary"  name="sid" value="{{ $channel->sid }}" >Apply</button></td>                 
                    </form>
                    <form action="{{'/channel/views'}}" method = "get">
                        {{ csrf_field()}}
                        <td><button type="submit" class="btn btn-danger" >Cancel</button></td>
                    </form>
                </tr>
            @else
            <tr>
                <form action="{{('/channel/create')}}"method = "post">
                    {{ csrf_field()}}
                
                    <td><label for="channelname">New Channel: </label></td>
                    <td colspan=2 ><input type="text" name="channelname" required></td>
                    <td><button type="submit" class="btn btn-primary"  name="btnCreate" >Create</button></td>
                </form>
                <form action="{{'/'}}" method = "get">
                    {{ csrf_field()}}
                    <td><button type="submit" class="btn btn-danger" >Finish</button></td>
                </form>
            </tr>
            @endif
                <tr>
                    <th scope="row">Name</th>
                    <th scope="row">Members</th>
                    <th scope="row">Messages</th>
                    <td></td>
                    <td></td>
                <tr>
            <tbody>
                <tr>
                    <td>
                    @if(count($channels) < 1 ) <tr><td colspan =2>There are no channels available</td></tr>
                    @endif
                    </td>
                </tr>
                @foreach ($channels as $channel)
                    <tr>
                        <td>
                            {{ $channel->friendlyName }}
                        </td>
                        <td>
                            {{$channel->membersCount}}
                        </td>
                        <td>
                            {{$channel->messagesCount}}
                        </td>
                        <td>
                            <form action="{{'/channel/edit'}}" method = "POST">
                                {{ csrf_field()}}
                                <button type="submit" class="btn btn-primary"  name="sid" value= "{{ $channel->sid }}" >Edit</button>                 
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{'/channel/delete'}}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger"  name="sid" value= "{{ $channel->sid }}" >Delete</button>                 
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach   
            </tbody>
        </table> 
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>