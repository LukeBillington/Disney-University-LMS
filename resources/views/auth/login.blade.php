@extends('layouts.app')
@section('content')
  <h1>Login</h1>
  <form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <p>
      <label for="perner">Perner</label>
      <input id="perner" type="text" name="perner" value="{{ old('perner') }}" required autofocus>
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
      <label>
        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
      </label>
    </p>
    <p>
      <button type="submit">Login</button>
    </p>
  </form>
@endsection
