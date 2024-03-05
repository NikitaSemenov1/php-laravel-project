@extends('layouts.app')

@section('title', 'Создание карточки товара')

@section('content')
    <div class="card">
        <div class="card-header">
            Создание нового товара
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('books.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Название</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Автор</label>
                    <input type="text" class="form-control" name="author" id="author">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Цена</label>
                    <input type="number" class="form-control" name="price" id="price">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Ссылка на картинку</label>
                    <input type="text" class="form-control" name="img" id="img">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Создать</button>
                <a href="/">
                    <button type="button" class="btn btn-primary">Отмена</button>
                </a>
            </form>
        </div>
    </div>
@endsection
