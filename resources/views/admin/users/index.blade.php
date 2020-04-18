@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Empresas</div>
            
				<div class="card-group">
                 @foreach($users as $user)                             
				  <div class="card">
				    <img src="/images/nina.jpg" class="card-img-top" alt="...">
				    <div class="card-body">
				      <h5 class="card-title">{{$user->name}}</h5>
				      <p class="card-text">Avenida Riva Palacio 292 email: {{$user->email}} </p>
				      <div class="ec-stars-wrapper">
						<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
						<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
						<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
						<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
						<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
					</div>

				      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
				    </div>
				  </div>
				  
				@endforeach
				</div>



<!--
                <div class="card-body">
       
                </div>-->
            </div>
        </div>
    </div>
</div>
@endsection
