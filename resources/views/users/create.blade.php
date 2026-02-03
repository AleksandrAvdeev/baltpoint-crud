@extends('users.basis')

@section('content-section')
    @include('users.errors')

    <form role="form" method="post" action="{{ route('register') }}">
        @csrf

        <label>Email&nbsp;&nbsp;&nbsp;</label>
        <input type="email" id="email" placeholder="Email" name="email" value="{{ old('email') }}" minlength="5" maxlength="255" required>
        <br>
        <br>
        <label>Телефон&nbsp;&nbsp;&nbsp;</label>
        <input type="number" id="phone" placeholder="Телефон" name="phone" value="{{ old('phone') }}" maxlength="255">
        <br>
        <br>
        <a href="{{ route('home') }}">Отмена</a>
        <button type="submit">Создать</button>
    </form>

@stop
