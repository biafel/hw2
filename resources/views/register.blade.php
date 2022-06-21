 @extends('layouts.log_reg');

 @section('script')
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
 <script src="{{asset('js/signup.js')}}" defer></script>
 @endsection

 @section('info')
        @csrf
            <h1>Registrati!</h1>
            <label> <input type="text" id="nome" placeholder="Nome" name="nome" required> </label>
            <label> <input type="text" id="cognome" placeholder="Cognome" name="cognome" required> </label>
            <label> <input type="text" id="username" placeholder="Username" name="username" maxlength="50" required> </label>
            <label> <input type="password" id="password" placeholder="Password" name="password" required> </label>
            <label> <input type="email" id="email" placeholder="Email" name="email" required> </label>
            <button type="submit" name="register">Avanti</button>
            <div>Hai già un account? <a href="{{ route('login') }}">Accedi</a>
 @endsection