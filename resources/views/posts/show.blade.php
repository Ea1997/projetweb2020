@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
  <div class="col-6">
    <img src="/storage/{{$post->item->image}}" alt="post" class="w-100">
  </div>
  <div class="col-6">
    <div class="d-flex align-items-center">
      <div class="pr-2">
        <img src="{{$post->user->profile->profileImage()}}" class="w-50 rounded-circle mr-0"  alt="">
      </div>
      <div class="font-weight-bold d-flex align-items-center">
      <a href="/profile/{{$post->user->id}}" class="mr-3 ml-0"><span class="text-dark">{{$post->user->name.' '.$post->user->prenom}}</span></a>

      @if(Auth()->check() && $post->user->id == auth()->user()->id)

         <form  action="/post/{{$post->id}}" method="post">
    @csrf
  @method('DELETE')

          <button class="btn btn-primary" style="margin-left: 0.4px;">Supprimer cette annonce</button>

      </form>
      @endif
      </div>

    </div>

    <hr>
      <p><strong><a href="/profile/{{$post->user->id}}"><span class="text-dark">Titre:{{$post->item->titre}}</span></a><br>Description:</strong>{{$post->item->description}}<br><strong>Prix</strong>{{$post->prix}} DH / Jour</p>
<hr>
Catégorie:
<h6><a href="/categorie/{{$post->item->categorie->id}}">{{$post->item->categorie->nom}}</a></h6>
<hr>
@if (Auth::check())
  <h5>Comments:</h5>
     <div id="comment">



     @foreach($post->comments as $comment)
     <div class="d-block">
     <a href="/profile/{{$comment->user->id}}"><strong>{{$comment->user->name}}</strong></a> :
{{$comment->comment}}

</div>
  @endforeach

  </div>
  <form  action="/comments/{{$post->id}}" enctype="multipart/form-data" method="post">
  @csrf



                <input  id="comment" type="text" class="form-control @error('comment') is-invalid @enderror"  value="{{ old('comment')}}" name="comment"  autocomplete="comment" >

                @error('comment')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


<table class="w-100">
<tr>
<td><button class="btn btn-primary mt-2">Commenter</button></td>
<td>
@if(Auth()->user()->id!=$post->user->id)
<a class="btn btn-primary mt-2" href="">Louer cet objet</a>
@endif
</td>
</tr>
</table>


    </form>


@else
<h5>Merci de se connecter pour pouvoir consulter les commentaires</h5>
<a href="/login"><button class="btn btn-primary">Se connecter</button></a>
@endif
  </div>

</div>



</div>
@endsection
