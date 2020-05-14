@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">


    <ul class="navbar-nav mr-auto">
    @foreach($data as $d)
      <li class="nav-item active">
        <a class="nav-link" href="/categorie/{{$d->id}}">{{$d->nom}} <span class="sr-only">(current)</span></a>
      </li>

      @endforeach

    </ul>
    <form action="/search" method="post" class="form-inline my-2 my-lg-0">
    {{ csrf_field() }}
      <input class="form-control mr-sm-2" type="search" placeholder="Chercher" name="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">chercher</button>
    </form>
  </div>
</nav>
        <div class="col-md-12">
        <a href="/order/historique"><button class="btn btn-primary mb-5">Historique</button></a>
            <div class="card">


                <div class="card-body">
                <div class="container">
    @if(isset($message))
    <h1>{{$message}}</h1>
    @endif

    @if(isset($orders))

    <h2>Vos commandes</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Numéro de commande</th>
                <th>titre d'objet</th>
                <th>Propriétaire</th>
                <th>Durée</th>
                <th>Prix totale</th>
                <th>Status</th>

                <th>numéro de telephone</th>

                <th></th>

            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->post->item->titre}}</td>
                <td>{{$order->post->item->user->name." ".$order->post->item->user->prenom}}</td>
                <td>{{$order->duree}} jours</td>
                <td>{{$order->duree*$order->post->prix}} MAD</td>
                <td>
                @if($order->accepted==0)
en traitement
@else
accepté par le propriétaire
@endif
@if($order->accepted==1 && $order->payed==1)
<td>{{$order->post->item->user->telephone}}</td>

@else
<td>non visible</td>
@endif
@if($order->accepted==1 && $order->payed==0)
<td><a href="/order/{{$order->id}}/payed"><button class="btn btn-primary" >accepter</button></a></td>
@elseif($order->accepted==1 && $order->payed==1)
<td><button class="btn btn-primary" >payer</button></td>
@else
<td><button class="btn btn-primary" disabled>accepter</button></td>
@endif




                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    @endif


</div>



                </div>
            </div>
        </div>

    </div>
</div>
@endsection
