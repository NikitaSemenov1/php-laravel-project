@extends('layouts.app')

@section('title', 'Карточка товара')

@section('content')
    <style>
        .btn_special {
            display: inline-block; /* Строчно-блочный элемент */
            background: green; /* Серый цвет фона */
            color: #fff; /* Белый цвет текста */
            padding: 1rem 1.5rem; /* Поля вокруг текста */
            text-decoration: none; /* Убираем подчёркивание */
            border-radius: 30px; /* Скругляем уголки */
        }
    </style>
    <div><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Название товара" title="Type in a name"
                style="width: 500px; box-sizing: border-box;"></div>
    <div style="padding: 10px"></div>
    <script>
        function clearCart() {
            localStorage.clear();
            alert("Корзина товаров очищена!");
        }

        function showCart() {
            let books = JSON.parse(localStorage.getItem('books'));
            alert(JSON.stringify(books));
        }

        function sendOrder() {
            @guest
            alert('Вы не зарегистрированы');
            @else
            var xhr = new XMLHttpRequest();

            var url = "/orders";

            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.setRequestHeader("X-CSRF-TOKEN", "{{csrf_token()}}");
            let books = JSON.parse(localStorage.getItem('books'));
            let books_id = [];
            books.forEach(book => books_id.push(book['id']));
            const data = JSON.stringify(books_id);
            console.log(data);
            xhr.send(data);

            alert("Заказ отправлен в магазин!")

            clearCart();
            @endguest()
        }
    </script>
    @role('admin')
    @else
    <input id="aaa" type="button" value="Корзина" onclick="showCart();" class="btn btn-info btn-sm" style="margin-right: 10px"/>
    <input id="aaa" type="button" value="Заказать" onclick="sendOrder();" class="btn btn-primary btn-sm" style="margin-right: 10px"/>
    <input id="clickMe" type="button" value="Очистить корзину" onclick="clearCart();" class="btn btn-danger btn-sm" style="margin-right: 10px"/>
    @endrole
    <script>
        function myFunction() {
            var input, filter, i, txtValue, tbody;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            tbody = document.getElementById("tbody");
            tr = tbody.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    @role('admin')
    <a href="{{ route('books.create') }}" class="btn_special">Добавить книгу</a>
    @endrole
    <table class="table">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Название</th>
            <th scope="col">Автор</th>
            <th scope="col">Цена</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody id="tbody">
        @foreach($books as $book)
            <tr id="{{$book->id}}">
                <td><img src="{{ $book->img }}" height=120 width=120></td>
                <td id="title">
                    <a href="{{ route('books.show', $book->id) }}">
                        {{ $book->title }}
                    </a>
                </td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->price }}</td>
                <td>
                    {{--                    По--}}
                    {{--                    @can('product.show')--}}
                    @role('admin')
                    {{--                            <li class="nav-link px-2"> Вы администратор: можете удалить товары!</li>--}}

                    <a href="{{ route('books.edit', $book->id) }}">
                        <button class="btn btn-warning btn-sm">Изменить</button>
                    </a>
                    <form method="POST" action="{{ route('books.destroy', $book->id) }}">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                    @else
                        <input id="button_{{$book->id}}" type="button" value="Добавить в корзину"
                               class="btn btn-success btn-sm"/>
                        <script>

                            document.getElementById("button_{{$book->id}}").addEventListener('click',
                            function add_to_cart() {
                                let books = JSON.parse(localStorage.getItem('books'));
                                if (books == null) {
                                    books = [];
                                }
                                let book = {
                                    "id": "{{$book->id}}",
                                    "title": "{{$book->title}}",
                                    "author": "{{$book->author}}",
                                    "price": {{$book->price}}
                                }
                                localStorage.setItem('entry', JSON.stringify(book));
                                books.push(book);
                                localStorage.setItem('books', JSON.stringify(books));
                                alert('Товар добавлен в корзину!');
                            });
                        </script>
                        @endrole
                </td>
            </tr>

        @endforeach
        </tbody>
        {{--        <tbody>--}}
        {{--        @foreach($users as $user)--}}
        {{--            <h3>{{ $user->name }}</h3>--}}
        {{--        @endforeach--}}
        {{--        </tbody>--}}
    </table>
@endsection
