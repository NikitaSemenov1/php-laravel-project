@extends('layouts.app')

@section('title', 'Заказы')

@section('content')
    <h1>Заказы</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Название</th>
            <th scope="col">Автор</th>
            <th scope="col">Цена</th>
            @role('admin')
            <th scope="col">Пользователь</th>
            @endrole
        </tr>
        </thead>
        <tbody id="tbody">
        @foreach($books as $book)
            <tr>
                <td><img src="{{ $book->img }}" height=120 width=120></td>
                <td id="title">
                    <a href="{{ route('books.show', $book->id) }}">
                        {{ $book->title }}
                    </a>
                </td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->price }}</td>
                @role('admin')
                <td>{{$book->username}}</td>
                @endrole
            </tr>

        @endforeach
        </tbody>
    </table>
@endsection
