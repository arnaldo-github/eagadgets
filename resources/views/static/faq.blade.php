@extends('layouts.basic')
@section('title', 'EA Gadgets - Perguntas frequentes')

@section('main')
<div class="container ">
    <div class="card" style="padding: 50px;">
    
    <h1 class="center">Perguntas Frequentes</h1>

    <div class="container ">
    <ul class="collapsible">
    <li>
      <div class="collapsible-header"><i class="material-icons">place</i>Como faço para receber o meu produto?</div>
      <div class="collapsible-body"><span>Um entregador virá ao seu encontro após, disponibilizar o seu endereço. As entregas em Maputo e Matola são
           grátis 
</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">local_atm</i>Quais são as formas de pagamento?</div>
      <div class="collapsible-body">
            <p>O pagamento é efetuado depois de receber o produto.
</p>
<ol>
<li>Transferência bancária</li>

<li>M-pesa</li>

<li>conta Móvel</li>

<li>Cash</li>
</ol>

      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">high_quality</i>Qual é a garantia dos produtos?</div>
      <div class="collapsible-body"><span>Oferecemos uma garantia incondicional de
30 dias após o recebimento do produto.</span></div>
    </li>
  </ul>
    </div>
    </div>
<script>
 document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, options);
  });
</script>
</div>
@endsection