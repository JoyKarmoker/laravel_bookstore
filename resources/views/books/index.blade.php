@extends('layout')

@section('page-content')
    <h1>Hello, world!</h1>
    <table class="table table-striped table-bordered">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Details</th>
        </tr>
        
        @foreach ($books as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->author}}</td>
                <td><a href="{{route('books.show', $book->id)}}">Details</a></td>
            </tr>
            
        @endforeach
    </table>

    {{$books->links()}}

@endsection




