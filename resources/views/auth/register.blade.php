@extends('layouts.app')
@section('content')
  <h1>Register</h1>
  <form method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
    <p>
      <label for="first_name">First name</label>
      <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required autofocus>
      @if ($errors->has('first_name'))
        <span>{{ $errors->first('first_name') }}</span>
      @endif
    </p>
    <p>
      <label for="last_name">Last name</label>
      <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required>
      @if ($errors->has('last_name'))
        <span>{{ $errors->first('last_name') }}</span>
      @endif
    </p>
    <p>
      <label for="perner">Perner</label>
      <input id="perner" type="text" name="perner" value="{{ old('perner') }}" required>
      @if ($errors->has('perner'))
        <span>{{ $errors->first('perner') }}</span>
      @endif
    </p>
    <p>
      <label for="password">Password</label>
      <input id="password" type="password" name="password" required>
      @if ($errors->has('password'))
        <span>{{ $errors->first('password') }}</span>
      @endif
    </p>
    <p>
      <label for="password-confirm">Confirm password</label>
      <input id="password-confirm" type="password" name="password_confirmation" required>
    </p>
    <p>
      <button type="submit">Register</button>
    </p>
  </form>
@endsection
