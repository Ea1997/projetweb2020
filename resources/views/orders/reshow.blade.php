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

    @if(isset($user))

    <h2>Vos commandes</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Numéro de commande</th>
                <th>titre d'objet</th>
                <th>Client</th>
                <th>Durée</th>
                <th>Prix totale</th>
                <th>Status</th>

                <th>consulter profile du client</th>
                <th>numéro de téléphone du client</th>
                <th></th>

            </tr>
        </thead>
        <tbody>

            @foreach($user->post as $order)

            @foreach($order->order as $orders)

            <tr>
<td>{{$orders->id}}</td>
<td>{{$orders->post->item->titre}}</td>
<td>{{$orders->user->name.' '.$orders->user->prenom}}</td>
<td>{{$orders->duree}} jours</td>
<td>{{$orders->duree*$orders->post->prix}} MAD</td>
<td>
@if($orders->accepted==0)
non accépté
@else
accépté
@endif
</td>
<td><a href="/profile/{{$orders->user->id}}">visiter le profile</a></td>
<td>
@if($orders->payed==0 || $orders->accepted==0)
non visible
@else
{{$orders->user->telephone}}
@endif
</td>
<td>
@if($orders->payed==0 && $orders->accepted==0)
<a href="/order/{{$orders->id}}/accepted"><button class="btn btn-primary">Accepter</button></a>
@elseif($orders->payed==0 && $orders->accepted==1)
<button disabled class="btn btn-primary">accépté on attend la réponse du client</button>
@elseif($orders->payed==1 && $orders->accepted==1)
<button disabled class="btn btn-primary">Accépté par le client</button>
@endif
</td>

</tr>
@endforeach


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
