@extends('welcome')
@section('content')
    <div class="job_details_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="drag-drop">         
                                            <img id="preview_img" src="{{$url}}/{{$supplier->id}}/image" class="rounded-circle" width="150" height="150" />
                                </div>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <div class="jobs_conetent">
                                    <h3>{{ $supplier->name}}</h3>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            @foreach ($addressP as  $address)
                                            <p> <i class="fa fa-map-marker"></i>{{ $address->adrress }}, {{ $address-> neigborhood }}, {{ $address-> descState }}, C.P. {{ $address->postal_code}} {{ $address-> descCountry }}</p>
                                            <p> 
                                            @endforeach

                                                <p>RFC: {{$supplier->rfc}}</p>

                                                @auth
                                                    <p>Correo: {{$supplier->email}}</p>
                                                    
                                                    @if( isset($supplier->phoneO) && trim($supplier->phoneO) != '') 
                                                    <p>Teléfono de Oficina: {{$supplier->phoneO}}</p> 
                                                    @endif
                                                    
                                                

                                                    @if( isset($supplier->phoneM) && trim($supplier->phoneM) != '')    
                                                    <p>Telefono Celular: {{$supplier->phoneM}}</p>
                                                    @endif
                                                @endauth                                                
                                                <p>Departamento: {{$department->description}}</p>
                                                
                                                <p>Categoría: {{$category->description}}</p>
                                            </p>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Sobre Nosotros</h4>
                            <!--"Aqui va la descripcion"-->
                            <p>Somos una empresa de mayoreo, distribución de Ropa para cabelleros. Hacemos entrega en todo el país, tenemos variedad de ropa, jeans, playeras, camisas, todo lo que necesite para caballeros. Somo tu mejor opción.</p>
                        </div>

                        <!--
                        <div class="single_wrap">
                            <h4>Dirección</h4>
                            <ul>
                                <li>Avenida san jalisco, michoacan, mexico 
                                </li>
                            </ul>
                        </div>-->
                        
                    </div><!--
                    <div class="apply_job_form white-bg">
                        <h4>Pedir Cotización</h4>
                        <form action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input type="text" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input type="text" placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input type="text" placeholder="Celular">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                   <div class="input_field">
                                        <input type="text" placeholder="Horario de contacto">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input_field">
                                        <input type="text" placeholder="Titulo">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input_field">
                                        <textarea name="#" id="" cols="30" rows="10" placeholder="Describe tú necesidad, te contactaremos lo más pronto posible"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit_btn">
                                        <button class="boxed-btn3 w-100" type="submit">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>-->
                </div>
                <div class="col-lg-4">
                    <div class="job_sumary">
                        <div class="summery_header">
                            <h3>Comentarios</h3>
                        </div>
                        <div class="job_content d-flex" >
                                <div class="drag-drop">
                                 <img id="preview_img" src="{{$url}}/{{$supplier->id}}/image" class="rounded-circle" width="130" height="145" />
                                <a href="">
                                    <span class="fa fa-star checked"></span> 
                                    <span class="fa fa-star checked"></span> 
                                    <span class="fa fa-star "></span> 
                                    <span class="fa fa-star "></span> 
                                    <span class="fa fa-star"></span>
                                </a>
                                </div>
                                <div align="rigth">
                                    <p>Es una buena empresa, siempre atentos</p>
                                </div>
                        </div>
                        <a href="">Mostrar más comentarios</a>
                    </div>
                    <div class="share_wrap">
                        <span>Nuestras redes sociales</span>

                            @auth
                             <ul>
                            
                             @if( isset($supplier->l_facebook) )
                                <li>
                                    <a href="{{$supplier->l_facebook}}"  target="_blank"> <i class="fat fa fa-facebook"></i>
                                    </a> 
                                </li>
                             @endif

                            @if( isset($supplier->l_instagram) )
                                <li>
                                    <a href="{{$supplier->l_instagram}}"  target="_blank"> <i class="fat fa fa-instagram"></i>
                                    </a> 
                                </li>
                            @endif

                            @if( isset($supplier->l_twitter) )
                                <li>
                                    <a href="{{$supplier->l_twitter}}"  target="_blank"> <i class="fat fa fa-twitter"></i>
                                    </a> 
                                </li>
                            @endif
                        </ul>
                        @endauth
                    </div>

                   @guest
                       <div class="job_location_wrap">
                            <p>Para ver la información del contacto y redes sociales, necesita
                                <a href="{{ route('login') }}">Iniciar Sesión</a> o <a href="{{ route('register') }}">Registrarse</a>
                            </p>           
                       </div>
                   @endguest
                   <!--     <div class="job_lok_inner">
                            <div id="map" style="height: 200px;"></div>
                            <script>
                              function initMap() {
                                var uluru = {lat: -25.363, lng: 131.044};
                                var grayStyles = [
                                  {
                                    featureType: "all",
                                    stylers: [
                                      { saturation: -90 },
                                      { lightness: 50 }
                                    ]
                                  },
                                  {elementType: 'labels.text.fill', stylers: [{color: '#ccdee9'}]}
                                ];
                                var map = new google.maps.Map(document.getElementById('map'), {
                                  center: {lat: -31.197, lng: 150.744},
                                  zoom: 9,
                                  styles: grayStyles,
                                  scrollwheel:  false
                                });
                              }
                              
                            </script>
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script>
                            
                          </div>
                    </div>-->
                    <div style="display: none;">
                        <input type="text" name="phoneNumber" id="phoneNumber" value="{{$supplier->phoneM}}">
                    </div>
                    <div id="WAButton"></div>  

                </div>
            </div>
        </div>
    </div>
@endsection