@extends('layouts.user')

@section('title', 'Downline Members List')
@section('styles')

@endsection

@section('content')

   <!-- PAGE-HEADER -->
   <div class="page-header">
      <div>
         <h1 class="page-title">Downline Members List</h1>
      </div>
      <div class="ms-auto pageheader-btn">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('user')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Downline Members Lists</li>
         </ol>
      </div>
   </div>
   <!-- PAGE-HEADER END -->

   <!-- Row -->
   <div class="row row-sm">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               @include('layouts.error')
               <div class="table-responsive">
                  <table class="table table-bordered text-nowrap border-bottom w-100 user-table" id="downline-table">
                     <thead>
                        <tr>
                           <th class="wd-15p border-bottom-0">S.No</th>
                           <th class="wd-15p border-bottom-0">Date</th>
                           <th class="wd-15p border-bottom-0">Username</th>
                           <th class="wd-15p border-bottom-0">Name</th>
                           <th class="wd-25p border-bottom-0">Mobile</th>
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
         var table = $('#downline-table').DataTable({
            processing: true,
            serverSide: true,
            order: { "column": "0", "dir": "desc" },
            ajax: {
               url: "{{ route('user.downline') }}",
               type: "POST",
            },
            columns: [
               {data: 'DT_RowIndex', name: 'id'},
               {data: 'created_at', name: 'created_at'},
               {data: 'username', name: 'username'},
               {data: 'name', name: 'name'},
               {data: 'mobile', name: 'mobile'},
            ]
         });
      });
      </script>

@endsection
