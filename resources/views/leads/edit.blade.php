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
        <form action="{{ route('leads.update', $lead) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="first_name">Имя</label>
                <input type="text" name="first_name" class="form-control" value="{{ $lead->first_name }}" >
            </div>
            <div class="form-group">
                <label for="last_name">Фамилия</label>
                <input type="text" name="last_name" class="form-control" id="last_name" value="{{ $lead->last_name }}" >

            </div>
            <div class="form-group">
                <label for="phone">Номер телефона</label>
                <input type="text" name="phone" class="form-control" id="phone" value="{{ $lead->phone }}" >
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $lead->email }}" >
            </div>
            <div class="form-group">
                <label for="message">Текст обращения</label>
                <textarea name="message" class="form-control" id="message" required>{{ $lead->message }}</textarea>
            </div>
            <div class="form-group">
                <label for="status_id">Статус</label>
                <select name="status_id" class="form-control" id="status_id" required>
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}" {{ $lead->status_id == $status->id ? 'selected' : '' }}>
                            {{ $status->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
