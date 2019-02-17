<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Channels</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />    
    <script src="main.js"></script>
</head>
<body>
    <h4>User: {{ $username }}</h4>
    <div>
        <table>
            <thead>
                <tr>
                    <td>Friendly Name</td>
                    <td>Edit</td>
                    <td>Delete</td>
                <tr>
            </thead>
            <tbody>
                @foreach ($channels as $channel)
                    <tr>
                        <td>
                            <a href='/channel/{{ $channel->sid }}'> {{ $channel->friendlyName }} </a>
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
                                    <button type="submit" class="btn btn-primary"  name="sid" value= "{{ $channel->sid }}" >Delete</button>                 
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <form action="{{('/channel/create')}}"method = "post">
        {{ csrf_field()}}
        <label for="channelname">New Channel: </label>
        <input type="text" name="channelname" required>
        <button type="submit" class="btn btn-primary"  name="btnCreate" >Create</button>                 
    </form>
    <form action="{{'/'}}" method = "get">
        {{ csrf_field()}}
        <button type="submit" class="btn btn-primary" >Finish</button>                 
    </form>
</body>
</html>