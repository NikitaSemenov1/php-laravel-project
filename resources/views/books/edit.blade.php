@extends('layouts.app')

@section('title', 'Изменение карточки товара')

@section('content')
    <div class="card">
        <div class="card-header">
            Товар
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('books.update', $book->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Название</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $book->title }}">
                </div>

                <div class="mb-3">
                    <label for="article" class="form-label">Автор</label>
                    <input type="text" class="form-control" name="author" id="author" value="{{ $book->author }}">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Цена</label>
                    <input type="number" class="form-control" name="price" id="price" value="{{ $book->price }}">
                </div>

                <div class="mb-3">
                    <label for="article" class="form-label">Ссылка на изображение</label>
                    <input type="text" class="form-control" name="img" id="img" value="{{ $book->img }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <textarea class="form-control" id="description" name="description"
                              rows="3">{{ $book->description }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Сохранить</button>
                <a href="/">
                    <button type="button" class="btn btn-primary">Отмена</button>
                </a>
            </form>
        </div>
    </div>
@endsection
