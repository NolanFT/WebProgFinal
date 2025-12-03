<!DOCTYPE html>
<html>
    <head>
        <title>Edit</title>
    </head>
    <body>
        <h1>WEB PROGRAMMING</h1>
        <hr />
        <a href="/home">Home</a> | <a href="/read">Mahasiswa</a>
        <p>
            <h2>Score Update</h2>
            <ul>
                <li>Name : {{$name}}</li>
                <li>Email : {{$email}}</li>
                <li>Score : {{$score}}</li>
            </ul>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p><b style="color: red;">{{$error}}</b></p>
                @endforeach
            @endif
            <h3>New Score</h3>
            <form action="/update/{{$id}}" method="post">
                @csrf
                Score : <input type="number" name="score" min="0" max="100" /><br /><br />
                <input type="submit" value="Submit">
            </form>
        </p>
    </body>
</html>