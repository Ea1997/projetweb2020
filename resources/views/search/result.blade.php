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
            <div class="card">


                <div class="card-body">
                <div class="container">
    @if(isset($message))
    <h1>{{$message}}</h1>
    @endif
    @if(isset($post))

    <h2>Résultat des annonces</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>

            </tr>
        </thead>
        <tbody>
            @foreach($post as $post)
            <tr>
                <td>{{$post->titre}}</td>
                <td>{{$post->description}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <hr><hr><hr>
    @if(isset($categorie))

<h2>Résulats des catégories</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom de catégorie</th>

        </tr>
    </thead>
    <tbody>
        @foreach($categorie as $post)
        <tr>
            <td><a href="/categorie/{{$post->id}}">{{$post->nom}}</a></td>

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
