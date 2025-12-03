<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
    </head>
    <body>
        <h1>WEB PROGRAMMING</h1>
        <hr />
        <a href="/home">Home</a> | <a href="/read">Mahasiswa</a>
        <p>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p><b style="color: red;">{{$error}}</b></p>
                @endforeach
            @endif
            <form action="/create" method="post">
                @csrf
                Name : <input type="text" name="name" value="{{old('name')}}" /><br /><br />
                Email : <input type="email" name="email" value="{{old('email')}}" /><br /><br />
                Score : <input type="number" name="score" value="{{old('score')}}" min="0" max="100" /><br /><br />
                <input type="submit" value="Submit">
            </form>
        </p>
    </body>
</html>