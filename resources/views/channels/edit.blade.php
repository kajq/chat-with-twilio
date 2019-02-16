<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Channel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <form action="{{'/update'}}" method="post">
        {{ csrf_field() }}
        <label for="oldname">Old Name: </label>
        <input type="text" name="oldname" value="{{ $channel->friendlyName }}">
        <label for="channelname">New Name Channel: </label>
        <input type="text" name="channelname">
        <button type="submit" class="btn btn-primary"  name="sid" value="{{ $channel->sid }}" >Editar</button>                 
    </form>
    
</body>
</html>