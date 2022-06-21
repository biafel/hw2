@extends('layouts.log_reg');

@section('script')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
<script src="{{asset('js/login.js')}}" defer></script>
@endsection

@section('info')
        @csrf
           <h1>Accedi!</h1>
           <label>Nome utente <input type='text' name='username'></label>
           <label>Password <input type='password' name='password'></label>
           <button type="submit" name="register">Accedi</button>
           <div class="signup">Non hai un account? <a href="{{ route('register') }}">Iscriviti</a>
@endsection