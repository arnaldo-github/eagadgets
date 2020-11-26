
@extends('layouts.basic')
@section('title', 'Login')

@section('main')

<div class="container">
    <div id="login-page" class="row">
   
    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
@endif
      <div class="col s12 z-depth-6 card-panel">
        <span style="margin-top: 10px;">
        <x-jet-validation-errors class="mb-4" />
        </span>
        <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf
          <div class="row">
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">mail_outline</i>
              <input  name="email" id="email" type="email">
              <label for="email"  data-error="wrong" data-success="right">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">lock_outline</i>
              <input id="password" name="password" type="password">
              <label for="password">Password</label>
            </div>
          </div>
          
          <div class="row">
            <div class="input-field col s12">
              <button type="submit" href="#" class="btn waves-effect waves-light col s12">Login</button>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6 m6 l6">
              <p class="margin medium-small"><a href="/register">Criar conta</a></p>
            </div>
                    
          </div>
  
        </form>
      </div>
    </div> 
  </div>


<style>


@media only screen and (min-width: 1024px) {
    .container {
        width: 60% !important;
      
    }
}

</style>

@endsection