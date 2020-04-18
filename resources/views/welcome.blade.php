<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Abastécete</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="css/app.css" rel="stylesheet">
        <!--JQuery-->  
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>  
        <!--Floating WhatsApp css-->  
        <link rel="stylesheet" href="css/floating-wpp.min.css">  
        <!--Floating WhatsApp javascript-->  
        <script type="text/javascript" src="js/floating-wpp.min.js"></script>
    </head>
    <body>

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid ">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">                    
                                <div class="logo">
                                    <a href="index.html">
                                    <h3 style="color: white">A B A S T É C E T E</h3>
                                    </a>
                                </div>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div  class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{ route('home')}}">Inicio</a></li>

                                            @guest
                                                <li><a href="index.html">Sobre Nosotros</a></li>
                                                <li><a href="contact.html">Contacto</a></li>
                                            @endguest

                                            @auth        
                                                <li>
                                                    <a href="{{ route('profile') }}">{{ __('Editar Perfil') }}</a>
                                                </li>    
                                                
                                                <li>
                                                    <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        {{ __('Cerrar Sesión') }}
                                                    </a>
                                                </li>                                                    <div>                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                     @csrf
                                                </form>
                                                </div>
                                            @else
                                                    <li> <a href="{{ route('login') }}">Iniciar Sesión</a></li>
                                                    @if (Route::has('register'))
                                                        <li><a href="{{ route('register') }}">Registrate</a></li>
                                                    @endif
                                        @endauth
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <!-- slider_area_start -->
    
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            @if( isset($isPrincipal) )
            <div class="container">
                 <!-- catagory_area -->
                <div class="catagory_area">
                    <div class="container">
                        <form method="GET" action="{{ route('search') }}">
                        <div class="row cat_search">
                            <div class="col-lg-8 col-md-8">
                                <div class="single_input">
                                    <input type="text" placeholder="Nombre de proveedor o Producto"name="search" id="serach"/>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-12">
                                <div class="job_btn">
                                    <input type="submit" class="boxed-btn3" value="Buscar"/>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>   
            @endif
        </div>
    </div>
    <div class="job_listing_area" id="app">
        @if( isset($suppliers) )
        <div class="container">
            <br>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section_title">
                            <h3>{{$title}}</h3>
                    </div>
                </div>
            </div>
            <div class="job_lists">
            <div class="row">
               @foreach($suppliers  as $supplier)               
                <div class="col-lg-6 col-md-12">
                  <div class="single_jobs white-bg d-flex justify-content-between">
                      <div class="jobs_left d-flex align-items-center">
                          <div class="drag-drop">
                                 <img id="preview_img" src="{{$url}}/{{$supplier->id}}/image" class="rounded-circle" width="130" height="145" />
                          </div>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                          <div class="jobs_conetent">
                              <a><h4>{{$supplier->name}}</h4></a>
                              <div class="links_locat d-flex align-items-center">
                                <div class="location">
                                    <p> <i class="fa fa-map-marker"></i>{{ $supplier->adrress }}, {{ $supplier-> neigborhood }}, {{ $supplier-> descState }},  {{ $supplier-> descCountry }}</p>
                                </div>
                              </div>
                          </div>
                       </div>
                       <div class="jobs_right">
                            <div class="apply_now">
                                <a href="{{ route('getDetail', ['id'=>$supplier->id] )}}" class="boxed-btn3">Más Detalles</a>
                            </div>
                                <br>
                                <span class="fa fa-star checked"></span> 
                                <span class="fa fa-star checked"></span> 
                                <span class="fa fa-star "></span> 
                                <span class="fa fa-star "></span> 
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
<!--    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>-->
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/ajax-form.js"></script>

    <script>
  function loadPreview(input, id) {
    id = id || '#preview_img';
    if (input.files && input.files[0]) {
        var reader = new FileReader();
 
        reader.onload = function (e) {
            $(id)
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
        };
 
        reader.readAsDataURL(input.files[0]);
    }
 }
</script>



    <!--contact js-->
<!--    <script src="js/contact.js"></script>-->
   <!-- <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/main.js"></script>-->

    <script type="text/javascript">  
   $(function () {
           $('#WAButton').floatingWhatsApp({
               phone: $('#phoneNumber').val(), //WhatsApp Business phone number
               headerTitle: '¡Haz tu pedido!', //Popup Title
               popupMessage: 'Hola, ¿que te llevamos?', //Popup Message
               showPopup: true, //Enables popup display
               buttonImage: '<img src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/whatsapp.svg"> ', //Button Image
               //headerColor: 'crimson', //Custom header color
               //backgroundColor: 'crimson', //Custom background button color
               position: "right" //Position: left | right

           });
       });
</script> 
    </body>
</html>
