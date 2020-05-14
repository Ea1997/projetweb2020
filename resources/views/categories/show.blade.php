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
      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">chercher</button>
    </form>
  </div>
</nav>
        <div class="col-md-12">
            <div class="card">

@if(isset($message))
<div class="card-header">{{$message}}</div>
@endif
                <div class="card-body">
                <div class="row pt-6">

@foreach($posts as $post)

<div class="col-4 pb-5">
<div class="card">
            <div class="card-header"><a href="/post/{{$post->id}}">{{$post->item->titre}}</a></div>

            <div class="card-body">
<a href="/post/{{$post->id}}"><img src="/storage/{{ $post->item->image }}" class="w-100" alt="photo"></a>
<h6><a href="/profile/{{$post->user->id}}">{{$post->user->name.' '.$post->user->prenom}}</a></h6>
<h6><a href="/categorie/{{$post->item->categorie->id}}">{{$post->item->categorie->nom}}</a></h6>
<h6>{{$post->created_at}}</h6>
<p>{{$post->description}}</p>
</div>
        </div>
    </div>

@endforeach
</div>
                </div>
            </div>
        </div>
        {{ $posts->links() }}
    </div>
</div>
@endsection
