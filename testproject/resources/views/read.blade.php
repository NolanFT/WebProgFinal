<!DOCTYPE html>
<html>
    <head>
        <title>Mahasiswa</title>
    </head>
    <body>
        <h1>WEB PROGRAMMING</h1>
        <hr />
        <a href="/home">Home</a> | <a href="/read">Mahasiswa</a>
        <p>
            @forelse($mahasiswas as $mahasiswa)
                No : {{$loop->iteration}} <br><br>
                Name : {{$mahasiswa->name}} <br><br>
                Email : {{$mahasiswa->email}} <br><br>
                Score : {{$mahasiswa->score}} <br><br>
                <a href="/edit/{{$mahasiswa->id}}"><button>Edit</button></a>
                 | <a href="/delete/{{$mahasiswa->id}}"><button>Delete</button></a>
                 <br><br>
            @empty
                <b>No data</b>
            @endforelse
        </p>
    </body>
</html>