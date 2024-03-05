@extends('layouts.app')

@section('title', 'Товар')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ $book->title }}
        </div>
        <div class="card-body">
            <img src="{{$book->img}}">
            <p>Название: {{ $book->title }}</p>
            <p>Автор: {{ $book->author }}</p>
            <p>Цена: {{ $book->price }}</p>
            <p>{{$book->description}}</p>

            <a href="/books" class="btn btn-primary">Назад</a>
        </div>
        <div class="card-body">
        </div>
    </div>
@endsection
