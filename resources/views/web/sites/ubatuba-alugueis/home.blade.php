@extends("web.sites.{$tenant->template}.master.master")

@section('content')
    <section class="hero-section" style="background: url('{{url(asset('frontend/'.$tenant->template.'/images/hero-bg.png'))}}')" id="home">
        @if (!empty($slides) && $slides->count() > 0)
            <div class="text-block">            
                <div class="owl-carousel " data-slide="1" data-slide-res="1" data-autoplay="true" data-nav="false" data-dots="true" data-space="0" data-loop="true" data-speed="800">
                    @foreach ($slides as $key => $slide)                     
                    <div class="item">
                        <a {{($slide->target == 1 ? 'target="_blank"' : '')}} href="{{$slide->link}}">
                            <img src="{{$slide->getimagem()}}" alt="{{$slide->titulo}}" class="img-fluid">
                        </a>
                    </div>
                    @endforeach
                </div>                
            </div>
        @endif
    </section>
    
    @if (!empty($destaque) && $destaque->count() > 0)
        <section class="feature-section pad-tb">
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                <div class="common-heading">
                    <h2>{{$destaque->titulo}}</h2>
                    <p>{{$destaque->headline}}</p>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                <div class="about-feature">
                    <div class="row mt45">
                    <div class="col-lg-5">
                        <h4 class="h4-heading">Key Highlights of Project</h4>
                        <ul class="list-features">
                        <li>Located in Heart of the City</li>
                        <li>On Main City Road</li>
                        <li>2 Floors for Parking</li>
                        <li>Earthquake Resistance Structure</li>
                        <li>Near to all Major Govt. Institutions</li>
                        <li>100% Power Back-up in Common Area</li>
                        <li>3-Tier Security</li>
                        <li>Loan from all Leading Banks</li>
                        </ul>
                    </div>
                    <div class="col-lg-7">
                        <div class="feature-image">
                            <img src="{{$destaque->cover()}}" alt="{{$destaque->titulo}}" class="img-fluid">
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>

        @if($destaque->images()->get()->count())
            <section class="gallery-section pad-tb" id="fotos">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="common-heading">
                                <h2>Fotos</h2>          
                            </div>
                        </div>
                    </div>
                    <div class="row img-gallery-magnific m-spc98 mt15">
                        @foreach($destaque->images()->get() as $image) 
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="gallery-">
                                <a class="image-popup-gallery" href="{{ $image->url_image }}" title="{{$destaque->titulo}}">
                                    <img src="{{ $image->url_cropped_slide_gallery }}" alt="{{$destaque->titulo}}" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        @endforeach                        
                    </div>
                </div>
            </section>
        @endif

        <div class="enquire-form pad-tb" id="reservar">
            <div class="container">
              <div class="row">      
                <div class="col-lg-12 pl0" id="form">
                  <div class="form-block">
                    <div class="form-header">
                      <h2><span>Pré-reserva</span></h2>
                    </div>
                    <form action="" method="post" class="j_formsubmit" autocomplete="off">
                      <div class="fieldsets"> 
                        <div class="row">      
                          <div class="col-lg-12 alertas"></div>                
                        </div> 
                        <div class="row">      
                          <div class="col-lg-4">
                            <input class="noclear" type="hidden" name="action" value="prereserva" />
                            <!-- HONEYPOT -->
                            <input type="hidden" class="noclear" name="bairro" value="" />
                            <input type="text" class="noclear" style="display: none;" name="cidade" value="" />
                            <label><b>Nome</b></label>
                            <input type="text" name="nome">
                          </div>
                          <div class="col-lg-4">
                            <label><b>Email</b></label>
                            <input type="text" name="email">
                          </div>
                          <div class="col-lg-4">
                            <label><b>Telefone</b></label>
                            <input type="text" name="telefone">
                          </div>
                        </div>
                        <div class="row">      
                          <div class="col-lg-4">
                            <label><b>Checkin</b></label>
                            <input type="text" class="default-date-picker" name="checkin">
                          </div>
                          <div class="col-lg-4">
                            <label><b>Checkout</b></label>
                            <input type="text" class="default-date-picker" name="checkout">
                          </div>
                          <div class="col-lg-4">
                            <label><b>Número de pessoas</b></label>
                            <select name="pessoas">
                              <option value="">Selecione</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                            </select>
                          </div>
                        </div>
                        <div class="row">      
                          <div class="col-lg-12">
                            <label><b>Informações adicionais</b></label>
                            <textarea rows="4" name="mensagem"></textarea>
                          </div>                
                        </div>
                      </div>
                      <div class="fieldsets"> <button type="submit" id="b_nome">Enviar Agora</button> </div>
                      <p class="trm"><i class="fas fa-lock"></i>Não enviamos spam, respeitamos sua privacidade.</p>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    @endif
@endsection