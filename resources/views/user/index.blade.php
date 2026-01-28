@extends('layouts.user')

        @section('title', 'Dashboard')
        @section('styles')

        @endsection

                            @section('content')

                           <!-- PAGE-HEADER -->
                           <div class="page-header">
                              <div>
                                 <h1 class="page-title">Dashboard</h1>
                              </div>
                              <div class="ms-auto pageheader-btn">
                                 <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                 </ol>
                              </div>
                           </div>
                           <!-- PAGE-HEADER END -->

                           <!-- ROW-1 -->
                           <div class="row">
                              @foreach ($all_data as $d => $data)
                              <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
                                 <div class="card overflow-hidden">
                                    <div class="card-body">
                                       <div class="row">
                                          <div class="col">
                                             <h3 class="mb-2 fw-semibold">{{ $data['count'] }}</h3>
                                             <p class="text-muted fs-13 mb-0">{{ $d }}</p>
                                          </div>
                                          <div class="col col-auto top-icn dash">
                                             <div class="counter-icon bg-primary dash ms-auto box-shadow-primary">
                                                <i class="fa fa-{{$data['icon']}}"></i>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                            </div>
                            <!-- ROW-1 END-->

                            @endsection



        @section('scripts')

        @endsection
