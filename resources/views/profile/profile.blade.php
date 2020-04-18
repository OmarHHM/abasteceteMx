@extends('welcome')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body " >
                    <form id="formUpdate" method="POST" enctype="multipart/form-data" 
                    	 action="{{ route('updateProfile') }}">
                        @csrf
                        @if(session()->has('msg'))
							    <div class="alert alert-success">
							        {{ session()->get('msg') }}
							    </div>
						@endif
                        <div  class="card-header">{{ __('Datos Personales') }} </div>
                        	<br>
                        <div class="col-md-12 d-flex">
							<div class="drag-drop">
					        	<input type="file" multiple="multiple" id="photo" onchange="loadPreview(this);" name="photo"/>
    									
					            		<img id="preview_img" src="{{$url}}/{{$profile->id}}/image" class="rounded-circle" width="150" height="150" />
					            <br>
					            <br>
					            <span class="desc">Sube tú Foto</span>
					        </div>

                            <div class="col-md-8">
	                            <div class="form-group row">
	                            	<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

		                            <div class="col-md-6" >
		                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $profile->name}}" required autocomplete="name" >

		                                @error('name')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
	                        	</div>


		                        <div class="form-group row">
		                            <label for="lastName1" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Paterno') }}</label>

		                            <div class="col-md-6">
		                                <input id="lastName1" type="text" class="form-control @error('name') is-invalid @enderror" name="lastName1" value="{{ $profile->lastName1}}" required autocomplete="name" >
		                            </div>
		                        </div>

		                        <div class="form-group row">
			                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Materno') }}</label>

		                            <div class="col-md-6">
		                                <input id="lastName2" type="text" class="form-control @error('name') is-invalid @enderror" name="lastName2" value="{{ $profile->lastName2}}" required autocomplete="name" >
		                            </div>
		                        </div>


								<div class="form-group row">
		                            <label for="telephone" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono Celular') }}</label>

		                            <div class="col-md-6">
		                                <input id="phoneM" type="tel" class="form-control @error('name') is-invalid @enderror" name="phoneM" value="{{ $profile->phoneM}}" required autocomplete="phoneM"  minlength="10" maxlength="10">
		                            </div>
		                        </div>
                        	</div>	
                        </div>

                        
                    
                       

                        <div  class="card-header">{{ __('Datos de su Dirección') }}</div>
	               			<br>
	               			<div class="form-group row">
	                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

	                            <div class="col-md-6">
	                                <input id="adrress" type="text" class="form-control @error('name') is-invalid @enderror" name="adrress" value="{{ $address->adrress}}" required autocomplete="name"  placeholder="Ej. Avenida Jalisco #340">
	                            </div>
	                        </div>

							<div class="form-group row">
	                            <label for="neigborhood" class="col-md-4 col-form-label text-md-right">{{ __('Colonia y Municipio') }}</label>

	                            <div class="col-md-6">
	                                <input id="neigborhood" type="text" class="form-control @error('name') is-invalid @enderror" name="neigborhood" value="{{ $address->neigborhood}}" required autocomplete="name"  placeholder="Ej. Colonia San Rafael, Municipio de la Rivera">
	                            </div>
	                        </div>


	                        <div class="form-group row">
	                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('País') }}</label>

	                            <div class="col-md-6">
	                            	<select name="country" id="country" class="nice-select wide">
	                                	 @foreach($countries as $key=>$value)
											<option value="{{ $key }}" {{$address->id_country == $key  ? 'selected' : ''}}>{{ $value }}</option>
	                                    @endforeach
    	                            </select>
	                            </div>
	                        </div>

                	        <div class="form-group row">
	                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Provincia') }}</label>

	                            <div class="col-md-6">
	                                <select name="state" id="state" class="nice-select wide">
	                              
		    							@foreach($states as $key=>$value)
	   										<option value="{{ $key }}"  {{$address->id_state == $key  ? 'selected' : ''}}>{{ $value }}</option>
	                                    @endforeach
									 
                                </select>
	                            </div>
	                        </div>

							<div class="form-group row">
	                            <label for="postalCode" class="col-md-4 col-form-label text-md-right">{{ __('Código Postal') }}</label>

	                            <div class="col-md-6">
	                                <input id="postal_code" type="text" class="form-control @error('name') is-invalid @enderror" name="postal_code" value="{{ $address->postal_code}}" required   placeholder="Ej. 67089" minlength="5" maxlength="5">
	                            </div>
	                        </div>

	 						<div class="form-group row mb-0">
	                            <div class="col-md-6 offset-md-4" align="right">
	                                <button type="submit" class="btn btn-primary">
	                                    {{ __('Editar') }}
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

