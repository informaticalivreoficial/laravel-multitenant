@extends("web.sites.{$tenant->template}.master.master")

@section('content')

<!-- Welcome Area-->
<section class="welcome-area" id="home">
  <!-- Background Shape-->
  <div class="background-shape">
    <div class="circle1 wow fadeInRightBig" data-wow-duration="4000ms"></div>
    <div class="circle2 wow fadeInRightBig" data-wow-duration="4000ms"></div>
    <div class="circle3 wow fadeInRightBig" data-wow-duration="4000ms"></div>
    <div class="circle4 wow fadeInRightBig" data-wow-duration="4000ms"></div>
  </div>
  <!-- Background Animation-->
  <div class="background-animation">
    <div class="star-ani"></div>
    <div class="cloud-ani"></div>
    <div class="triangle-ani"></div>
    <div class="circle-ani"></div>
    <div class="box-ani"></div>
  </div>      
  <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-6">
                <!-- Content-->
                <div class="welcome-content pe-3">
                    <h2 class="wow fadeInUp" data-wow-duration="1000ms">Sistema imobiliário completo e inteligente</h2>
                    <p class="mb-4 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1000ms">Sua empresa em um nível mais alto e um melhor atendimento a seus clientes, experimente agora 1 mês grátis.</p>
                    <!-- Button Group-->
                    <div class="btn-group-one wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1000ms">
                        <a class="btn saasbox-btn white-btn mt-3 wow fadeInUp" href="{{route('web.planos')}}">Experimente 1 mês grátis</a>
                    </div>
                </div>
            </div>
            <div class="col-10 col-md-6">
                <div class="welcome-thumb hero1 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1000ms">
                    <img src="{{url('frontend/'.$tenant->template.'/img/bg-img/hero-6.png')}}" alt="Experimente 1 mês grátis">
                </div>
            </div>
        </div>
  </div>
</section>

<div class="container"><div class="border-dashed"></div></div>

<!-- About Area-->
<section class="about-area about2">      
    <div class="container">
            <div class="row align-items-center feature3 justify-content-md-center justify-content-lg-between">
                <!-- About Thumbnail Area-->
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="aboutUs-thumbnail mt-120">
                            <img class="w-100" src="{{url('frontend/'.$tenant->template.'/img/bg-img/5.jpg')}}" alt="">
                        </div>
                </div>
                <!-- About Us Content Area-->
                <div class="col-12 col-md-8 col-lg-6"> 
                        <div class="aboutUs-content feature--content mt-120">
                            <div class="section-heading mb-5">
                                    <h6>Muitos recursos</h6>
                                    <h2>Um sistema completo e profissional.</h2>

                                    <ul class="ps-0">
                                        <li>Envio de mensagens</li>
                                        <li>Integração com portais imobiliários</li>
                                        <li>Integrado ao WhatsApp</li>
                                        <li>Seu site com certificado digital SSL</li>
                                        <li>A melhor visualização em qualquer dispositivo</li>
                                    </ul> 
                            </div>
                            <p>Administre e venda imóveis de uma forma inteligente e profissional, nosso sistema é integrado com 
                                as principais plataformas de imóveis do mercado imobiliário.
                            </p>
                            <a class="btn saasbox-btn white-btn mt-5" href="{{route('web.planos')}}">Experimente 1 mês grátis</a>
                        </div>
                </div>
            </div>
    </div>
</section>

<!-- FAQ Area-->
<div class="faq--area section-padding-120-70">   
  <div class="container">
    <div class="row align-items-center justify-content-between">

      <div class="col-12 col-lg-6">
        <div class="faq-content mb-50">
          <h2>Perguntas frequentes</h2>
          <div class="accordion faq--accordian mt-5" id="faqaccordian">
           
            <!-- Single FAQ-->
              <div class="card border-0">
                <div class="card-header" id="headingOne">
                  <button class="btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">1. O que é um site dinâmico gerenciável?</button>
                </div>
                <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#faqaccordian">
                  <div class="card-body">
                    <p>Site dinâmico é um site onde você mesmo, através de um usuário e senha, terá a 
                        possibilidade de gerir todo o conteúdo do site. Neste tipo de site, você mesmo poderá, 
                        sempre que precisar, inserir, alterar ou excluir produtos, serviços, fotos e textos. 
                        A grande vantagem de possuir um site dinâmico, é que seu site nunca ficará desatualizado 
                        e você poderá modificar o conteúdo do site de forma ilimitada e sem ter que pagar nada a 
                        mais por isso.
                        A Informática Livre desenvolveu seu próprio gestor imobiliário chamado de Super Imóveis - Sistema Imobiliário. 
                        Com este sistema, você poderá gerenciar todo o conteúdo do seu site sem precisar ter 
                        conhecimento avançado em informática.
                    </p>
                  </div>
                </div>
              </div>

              <!-- Single FAQ-->
              <div class="card border-0">
                <div class="card-header" id="headingTwo">
                  <button class="btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">2. Quanto tempo demora para eu ter o meu sistema?</button>
                </div>
                <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#faqaccordian">
                  <div class="card-body">
                    <p>Após o cadastro o acesso é imediato, basta configurar as informações da sua empresa e domínio,
                       caso tenha dúvida nossa equipe está disponóvel para auxiliar.</p>
                  </div>
                </div>
              </div>

              <!-- Single FAQ-->
              <div class="card border-0">
                <div class="card-header" id="headingThree">
                  <button class="btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">3. Quais são as vantagens de adquirir um sistema personalizado?</button>
                </div>
                <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#faqaccordian">
                  <div class="card-body">
                    <p>Ao adquirir um sistema web personalizado, você adquire uma série de vantagens. Por ser um 
                        sistema web, você poderá acessá-lo de qualquer lugar desde que tenha um ponto de acesso a 
                        internet disponível. Você ainda irá economizar todo o dinheiro que teria que investir em 
                        infra-estrutura com a compra de equipamentos.<br>
                        Outra grande vantagem de se ter um sistema web personalizado, é que como ele foi 
                        desenvolvido exclusivamente para a sua empresa, ele atenderá 100% das suas necessidades, 
                        fazendo com que os benefícios para a sua empresa se tornem ainda maiores. 
                        Um sistema web personalizado não precisa ser desenvolvido todo de uma só vez. Você pode 
                        ainda optar por adquirir atualizações disponíveis, o que fará com que o sistema esteja 
                        sempre acompanhando a evolução da sua empresa.</p>
                  </div>
                </div>
              </div>

              <!-- Single FAQ-->
              <div class="card border-0">
                <div class="card-header" id="headingThre">
                  <button class="btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThre" aria-expanded="true" aria-controls="collapseThre">3. Quanto tempo demora para o meu site aparecer no Google?</button>
                </div>
                <div class="collapse" id="collapseThre" aria-labelledby="headingThre" data-bs-parent="#faqaccordian">
                  <div class="card-body">
                    <p>Não existe um tempo pré-determinado para que seu site seja indexado pelo Google e pelos 
                        outros buscadores. Este processo pode acontecer em algumas horas ou levar alguns meses. 
                        Isso dependerá muito de como o seu site foi desenvolvido e quantos links externos 
                        (em outros sites) apontam pra ele. A Super Imoveis - Sistemas Imobiliários 
                        desenvolve o seu site de acordo com as orientações divulgadas pelo Google, o que faz com 
                        que o seu site suba de posição de forma mais rápida.</p>
                  </div>
                </div>
              </div>
            
          </div>
        </div>
      </div>

      <div class="col-12 col-lg-6">
        <div class="faq-content">
          <h2> </h2>
          <div class="accordion faq--accordian mt-5" id="faqaccordian">

              <!-- Single FAQ-->
            <div class="card border-0">
              <div class="card-header" id="headingFour">
                <button class="btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">4. Posso testar o sistema Super Imóveis?</button>
              </div>
              <div class="collapse" id="collapseFour" aria-labelledby="headingFour" data-bs-parent="#faqaccordian2">
                <div class="card-body">
                  <p>
                      Sim você pode testar o sistema gratuitamente por 30 dias escolhendo o plano básico:<br>
                      Planos: <a target="_blank" href="{{route('web.planos')}}">>> Acesse aqui</a>
                </p>
                </div>
              </div>
            </div>
            
            <!-- Single FAQ-->
            <div class="card border-0">
              <div class="card-header" id="headingFive">
                <button class="btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">5. Vou pagar para implantar o sistema?</button>
              </div>
              <div class="collapse" id="collapseFive" aria-labelledby="headingFive" data-bs-parent="#faqaccordian2">
                <div class="card-body">
                  <p>
                      Não cobramos para implantar seu sistema, após regularização de domínio, nossa
                      equipe lhe auxilia na configuração necessária para o bom funcionamento do sistema sem custos adicionais.
                  </p>
                </div>
              </div>
            </div>
            
            <!-- Single FAQ-->
            <div class="card border-0">
              <div class="card-header" id="headingSix">
                <button class="btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">6. Posso acessar o sistema pelo Iphone, Ipad ou dispositivos Android?</button>
              </div>
              <div class="collapse" id="collapseSix" aria-labelledby="headingSix" data-bs-parent="#faqaccordian2">
                <div class="card-body">
                  <p>Sim. Você pode acessar de qualquer plataforma. Faça um teste antes de contratar!</p>
                </div>
              </div>
            </div>

            <!-- Single FAQ-->
            <div class="card border-0">
              <div class="card-header" id="headingSix">
                <button class="btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSixx" aria-expanded="true" aria-controls="collapseSixx">7. O que é domínio?</button>
              </div>
              <div class="collapse" id="collapseSixx" aria-labelledby="headingSixx" data-bs-parent="#faqaccordian2">
                <div class="card-body">
                  <p>Domínio é um nome que serve para localizar e identificar o seu site na Internet.<br>
                  Exemplo: www.suaempresa.com.br
                    </p>
                </div>
              </div>
            </div>    

          </div>
        </div>
      </div>

    </div>
  </div>
</div>



<!-- Partner Area-->
<div class="our-partner-area py-5 partner2">
  <div class="container">
    <div class="row">
      <div class="col-12">
      <h4 class="mb-5">Integração com os principais portais</h4>
        <div class="our-partner-slides owl-carousel">
          <div class="single-partner"><img src="{{url('frontend/'.$tenant->template.'/img/partner-img/1.png')}}" alt="Nuroa"></div>
          <div class="single-partner"><img src="{{url('frontend/'.$tenant->template.'/img/partner-img/2.png')}}" alt="Zap"></div>
          <div class="single-partner"><img src="{{url('frontend/'.$tenant->template.'/img/partner-img/3.png')}}" alt="Viva Real"></div>
          <div class="single-partner"><img src="{{url('frontend/'.$tenant->template.'/img/partner-img/4.png')}}" alt="Imóvel Web"></div>
          <div class="single-partner"><img src="{{url('frontend/'.$tenant->template.'/img/partner-img/5.png')}}" alt="Dream Casa"></div>
          <div class="single-partner"><img src="{{url('frontend/'.$tenant->template.'/img/partner-img/6.png')}}" alt="Zip Anúncios"></div>
          <div class="single-partner"><img src="{{url('frontend/'.$tenant->template.'/img/partner-img/1.png')}}" alt=""></div>
          <div class="single-partner"><img src="{{url('frontend/'.$tenant->template.'/img/partner-img/2.png')}}" alt=""></div>
          <div class="single-partner"><img src="{{url('frontend/'.$tenant->template.'/img/partner-img/3.png')}}" alt=""></div>
          <div class="single-partner"><img src="{{url('frontend/'.$tenant->template.'/img/partner-img/4.png')}}" alt=""></div>
          <div class="single-partner"><img src="{{url('frontend/'.$tenant->template.'/img/partner-img/5.png')}}" alt=""></div>
          <div class="single-partner"><img src="{{url('frontend/'.$tenant->template.'/img/partner-img/6.png')}}" alt=""></div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection