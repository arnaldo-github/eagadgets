@extends('layouts.basic')
@section('title', 'Criar Conta')

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
        <x-jet-validation-errors class="red-text" />
        </span>
        <form method="POST" action="{{ route('register') }}" class="login-form">
        @csrf
       
        <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">person</i>
              <input type="text"  id="name" name="name" :value="old('name')" required >
              <label for="name"  data-error="wrong" data-success="right">Nome</label>
            </div>
        </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">mail_outline</i>
              <input  name="email" id="email" required type="email">
              <label for="email"  data-error="wrong" data-success="right">Email</label>
            </div>
          </div>
         
       
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">lock_outline</i>
              <input id="password" name="password" required  type="password">
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">lock_outline</i>
              <input id="password_confirmation" name="password_confirmation" required  type="password">
              <label for="password_confirmation">Repita a Password</label>
            </div>
          </div>
          
          <div class="row">
            <div class="input-field col s12">
              <button type="submit" href="#" class="btn waves-effect waves-light col s12">Criar conta</button>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6 m6 l6">
              <p class="margin medium-small"><a href="/login">Login</a></p>
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