@extends('users.basis')

@section('content-section')
    <a href="{{ route('register') }}">Создать пользователя</a>
    <br>
    <br>

    @include('users.messages')

    @if ($paginator->isEmpty())
        <div>Список пользователей пуст</div>
    @else
        <div>
            @if (!is_null($paginator->withQueryString()->previousPageUrl()))
                <a href="{{ $paginator->withQueryString()->previousPageUrl() }}">Предыдущая</a>
            @endif
            @if (!is_null($paginator->withQueryString()->nextPageUrl()))
                <a href="{{ $paginator->withQueryString()->nextPageUrl() }}">Следующая</a>
            @endif
        </div>

        <table border="1">
            <tr>
                <td>ID</td>
                <td>Email</td>
                <td>Телефон</td>
                <td>Дата создания пользователя</td>
                <td>Действия</td>
            </tr>
            @foreach($paginator as $user)
                @php
                    /** @var \App\Baltpoint\Models\User $user */
                @endphp
                <tr>
                    <td>{{ $user->getKey() }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone?->value ?? 'Не указано' }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a href="{{ route('edit', ['user' => $user]) }}">Редактировать</a>
                        <form role="form" method="post" action="{{ route('delete.post', ['user' => $user]) }}">
                            @csrf
                            <button type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <div>
            @if (!is_null($paginator->withQueryString()->previousPageUrl()))
                <a href="{{ $paginator->withQueryString()->previousPageUrl() }}">Предыдущая</a>
            @endif
            @if (!is_null($paginator->withQueryString()->nextPageUrl()))
                <a href="{{ $paginator->withQueryString()->nextPageUrl() }}">Следующая</a>
            @endif
        </div>

    @endif
@stop
