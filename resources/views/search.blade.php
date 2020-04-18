@extends('welcome')
@section('content')
 <div class="container">
            <br>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section_title">
                        <h3>Proveedores encontrados</h3>
                    </div>
                </div>
            </div>
            <div class="job_lists">
            <div class="row">
               @foreach($suppliers  as $supplier)               
                <div class="col-lg-6 col-md-12">
                  <div class="single_jobs white-bg d-flex justify-content-between">
                      <div class="jobs_left d-flex align-items-center">
                          <div class="thumb">
                              <img src="images/svg_icon/1.svg" alt="">
                          </div>
                          <div class="jobs_conetent">
                              <a href="job_details.html"><h4>{{$supplier->name}}</h4></a>
                              <div class="links_locat d-flex align-items-center">
                                <div class="location">
                                    <p> <i class="fa fa-map-marker"></i>{{ $supplier->adrress }}, {{ $supplier-> neigborhood }}, {{ $supplier-> descState }},  {{ $supplier-> descCountry }}</p>
                                </div>
                              </div>
                          </div>
                       </div>
                       <div class="jobs_right">
                           <a type="button" class="btn-floating btn-sm btn-ins">
                             <i class="fab fa-whatsapp"></i>
                           </a>    

                                  <a type="button" class="btn-floating btn-sm btn-fb">
                                    <i class="fab fa-facebook-f"></i>
                                  </a>

                                   <a type="button" class="btn-floating btn-sm btn-ins">
                                    <i class="fab fa-instagram"></i>
                                  </a>                    

                                    <br>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                <div class="location">
                                       <a >
                                        <p> <i class="fa fa-comments"></i>Comentarios</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
endsection