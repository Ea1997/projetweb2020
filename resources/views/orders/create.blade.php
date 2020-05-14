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
<div class="col-md-8">
            <div class="card">
                <div class="card-header">Louer {{$post->item->titre}}</div>

                <div class="card-body">

                <form method="POST" action="/order" enctype="multipart/form-data">
                        @csrf


<input type="hidden" name="post_id" value="{{$post->id}}">

                        <div class="form-group row">
                            <label for="duree" class="col-md-4 col-form-label text-md-right">{{ __('Durée des jours') }}</label>

                            <div class="col-md-6">
                                <input id="duree" type="number" class="form-control @error('duree') is-invalid @enderror" name="duree" value="{{ old('duree')}}" required autocomplete="duree">

                                @error('duree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Louer') }}
                                </button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
