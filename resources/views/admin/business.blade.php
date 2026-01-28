@extends('layouts.app')

@section('title', 'Business Incharge Commission')
@section('styles')

@endsection

@section('content')

   <!-- PAGE-HEADER -->
   <div class="page-header">
      <div>
         <h1 class="page-title">Business Incharge Commission</h1>
      </div>
      <div class="ms-auto pageheader-btn">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Business Incharge Commission</li>
         </ol>
      </div>
   </div>
   <!-- PAGE-HEADER END -->

   <!-- Row -->
   <div class="row row-sm">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header border-bottom">
               <h3 class="card-title">Business Incharge Commission {{ date('01-m-Y')}} - {{ date('t-m-Y') }}</h3>
            </div>
            <div class="card-body">
               @include('layouts.error')
               <div class="table-responsive">
                  <table class="table table-bordered text-nowrap border-bottom w-100 user-table" id="business-table">
                     <thead>
                        <tr>
                           <th class="wd-15p border-bottom-0">S.No</th>
                           <th class="wd-15p border-bottom-0">User ID</th>
                           <th class="wd-15p border-bottom-0">Name</th>
                           <th class="wd-15p border-bottom-0">Amount</th>
                        </tr>
                     </thead>
                     <tbody></tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End Row -->

   @endsection

   @section('scripts')

      <!-- vendor page custom js -->
      <script type="text/javascript">
      $(function () {
         var table = $('#business-table').DataTable({
            processing: true,
            serverSide: true,
            order: { "column": "0", "dir": "desc" },
            ajax: {
               url: "{{ route('admin.business') }}",
               type: "POST",
            },
            columns: [
               {data: 'DT_RowIndex', name: 'id'},
               {data: 'username', name: 'username'},
               {data: 'name', name: 'name'},
               {data: 'total_amount', name: 'total_amount'},
            ]
         });
      });
      </script>

@endsection
