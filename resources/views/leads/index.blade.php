@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Лиды</h1>
        <p>Всего лидов: {{ $leads->count() }}</p>
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

        <table class="table">

            <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>E-mail</th>
                <th>Номер телефона</th>
                <th>Дата создания</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
            </thead>

            <tbody>
            @foreach($leads as $lead)
                <tr>
                    <td>{{ $lead->id }}</td>
                    <td>{{ $lead->first_name }}</td>
                    <td>{{ $lead->last_name }}</td>
                    <td>{{ $lead->email }}</td>
                    <td>{{ $lead->phone }}</td>
                    <td>{{ $lead->created_at }}</td>
                    <td>
                        <form action="{{ route('leads.update', $lead) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status_id" onchange="this.form.submit()">
                                @foreach(App\Models\Status::all() as $status)
                                    <option value="{{ $status->id }}" {{ $lead->status_id == $status->id ? 'selected' : '' }}>
                                        {{ $status->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('leads.edit', $lead) }}" class="btn btn-primary">Редактировать</a>
                        <form action="{{ route('leads.destroy', $lead) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
