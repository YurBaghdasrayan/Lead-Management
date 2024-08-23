@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            @auth()
            <a href="{{ route('leads.index') }}" class="btn btn-secondary">Вернуться к списку лидов</a>
            @endauth
            <form action="{{ route('leads.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="first_name">Имя</label>
                <input type="text" name="first_name" class="form-control" id="first_name">
            </div>
            <div class="form-group">
                <label for="last_name">Фамилия</label>
                <input type="text" name="last_name" class="form-control" id="last_name">
            </div>
            <div class="form-group">
                <label for="phone">Номер телефона</label>
                <input type="text" name="phone" class="form-control" id="phone">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="message">Текст обращения</label>
                <textarea name="message" class="form-control" id="message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection
