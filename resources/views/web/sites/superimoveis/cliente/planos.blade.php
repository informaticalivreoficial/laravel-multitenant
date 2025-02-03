@extends("web.sites.{$tenant->template}.master.master")

@section('content')

<div class="breadcrumb--area" style="height: 120px;background-color: #0811fb;"></div>

@if (!empty($planos) && $planos->count() > 0)

<!-- Pricing Plan Area-->
<div class="saasbox-pricing-plan-area bg-gray pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-9 col-lg-7 col-xxl-6">
                <div class="section-heading text-center">
                    <h2>Planos</h2>
                    <p>Todos os planos não tem tempo mínimo de permanência e sem multa por cancelamento.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center g-4 g-lg-5">
            @foreach ($planos as $plano)
              <div class="col-12 col-sm-9 col-md-6 col-lg-5 col-xl-4">
                  <div class="card pricing-card">
                      <div class="pricing-heading" style="margin-bottom: 10px;">
                          <div class="price">
                              <h6>{{$plano->name}}</h6>
                              <span class="fz-12 d-block">R$</span>
                              @if ($plano->avaliacao == 1)
                                <h1 style="text-decoration:line-through;" class="mb-0 display-5 fw-bold text-info">{{$plano->valor}}</h1>
                                <span style="color: darkgreen;" class="fz-12 d-block">30 dias Grátis</span>
                              @else
                                <h1 class="mb-0 display-5 fw-bold text-info">{{$plano->valor}}</h1>
                                <span class="fz-12 d-block">mensal</span>
                              @endif                              
                          </div>
                      </div>
                      <div class="pricing-desc my-2">
                         {!!$plano->content!!}
                      </div>
                      <div class="pricing-btn">
                        <a class="btn btn-info btn-lg rounded-pill" href="{{route('web.assinar',['slug' => $plano->slug])}}">Assinar</a>
                      </div>
                  </div>
              </div>
            @endforeach 
        </div>
    </div>
</div>
<div class="mb-120 d-block"></div>    
@endif
    
@endsection