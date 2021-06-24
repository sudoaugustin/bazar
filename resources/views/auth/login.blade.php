@extends('layouts.authForm')
@section('script')
<script type="text/javascript" src="js/login.js">
</script>
@endsection
@section('form')
<h2 class="text-2xl text-indigo-900 font-bold mb-4">{{ config('app.name') }}</h2>
<form class="shadow-md rounded-lg p-10 bg-white" method="POST" action="login">
  @csrf

  <p class="text-2xl font-bold text-gray-700">Sign in to your account</p>
  <div class="space-y-4 py-8">
    <fieldset class="space-y-3">
      <label for="email">Email</label>
      <div class="textField @error('email') err @enderror">
        <input class="bg-gray-50 focus:outline-none w-96 p-3 rounded-md border" type="text" name="email"
          value="{{ old('email') }}" autofocus placeholder="e.g.auguestin304@gmail.com">
      </div>
      <label for="email" class="msg">
        @error('email')
        {{ $message }}
        @enderror
      </label>
    </fieldset>
    <fieldset class="space-y-3">
      <label for="password">Password </label>
      <div class="passwordField @error('password') err @enderror">
        <input class="bg-gray-50 focus:outline-none w-96 p-3 rounded-md border" type="password" name="password"
          placeholder="Enter your password">

      </div>
      <label for="password" class="msg">
        @error('password')
        {{$message}}
        @enderror
      </label>
    </fieldset>
    <fieldset>
      <div class="flex justify-between">

        <div class="inline-flex items-baseline space-x-1">
          <input class="w-4 h-4 rounded appearance-none border-2 border-gray-300" type="checkbox" name="remember"
            id="remember" {{ old('remember') ? 'checked' : '' }}>
          <label class="text-base relative -top-0.5 text-gray-700" for="remember">
            Remember Me
          </label>
        </div>
        <a href="{{ route('password.request') }}"
          class="inline-block text-indigo-700 after:bg-indigo-400 after:bg-opacity-60 after:content-[''] after:block after:w-full after:h-1 after:-top-2 after:relative">Forget
          Password?</a>
      </div>
    </fieldset>
    <div class="btn">
      <input class="bg-indigo-600 hover:bg-indigo-800 rounded-md w-full py-2 text-white" type="submit" name="submit"
        value="Login">
    </div>
    <div class="btn outlined">
      <a class="rounded-md w-full py-2 font-medium block text-center text-indigo-600" href="register">Signup</a>
    </div>
  </div>
</form>
@endsection