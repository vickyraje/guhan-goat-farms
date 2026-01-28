@extends('layouts.app')

@section('title', 'Pins List')
@section('styles')

@endsection

@section('content')

   <!-- PAGE-HEADER -->
   <div class="page-header">
      <div>
         <h1 class="page-title">Pins List</h1>
      </div>
      <div class="ms-auto pageheader-btn">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ Auth::guard('web')->check() ?  url('/admin') : url('user')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pins List</li>
         </ol>
      </div>
   </div>
   <!-- PAGE-HEADER END -->

   <!-- Row -->
   <div class="row row-sm">
      <div class="col-lg-12">
         <div class="card">
            @if(Auth::guard('web')->check())
            <div class="card-header">
               <a class="btn btn-primary btn-sm" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#addNewPin">Add New Pin</a>
            </div>
            @endif
            <div class="card-body">
               @include('layouts.error')
               <div class="table-responsive">
                  <table class="table table-bordered text-nowrap border-bottom w-100 user-table" id="pin-table">
                     <thead>
                        <tr>
                           <th class="wd-15p border-bottom-0">S.No</th>
                           <th class="wd-15p border-bottom-0">Date</th>
                           <th class="wd-15p border-bottom-0">Username</th>
                           <th class="wd-15p border-bottom-0">Plan</th>
                           <th class="wd-15p border-bottom-0">Pin</th>
                           <th class="wd-25p border-bottom-0">Action</th>
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

   <!-- Add New Client Modal -->
   <div class="modal fade" id="addNewPin" tabindex="-1" role="dialog" aria-labelledby="addNewVideoLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="addNewVideoLabel">Add New Pin</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{route('admin.pin.store')}}">
                  {{ csrf_field() }}
                  @method('POST')
                  <div class="row mb-4">
                     <label for="user_id" class="col-md-3 form-label">User Name <span class="editable-error">*</span></label>
                     <div class="col-md-9">
                        <input class="form-control" id="user_id" name="user_id" type="text" required />
                     </div>
                  </div>
                  <div class="row mb-4">
                     <label for="name" class="col-md-3 form-label">Name <span class="editable-error">*</span></label>
                     <div class="col-md-9">
                        <input class="form-control" id="name" type="text" disabled />
                     </div>
                  </div>
                  <div class="row mb-4">
                     <label for="plan_id" class="col-md-3 form-label">Plan <span class="editable-error">*</span></label>
                     <div class="col-md-9">
                        <select name="plan_id" id="plan_id" class="form-control" required>
                           <option value="">Select Plan</option>
                           @foreach($plans as $plan)
                              <option value="{{$plan->id}}">{{$plan->name}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="row mb-4">
                     <label for="quantity" class="col-md-3 form-label">No of Pins <span class="editable-error">*</span></label>
                     <div class="col-md-9">
                        <input class="form-control" id="quantity" name="quantity" type="number" min="0" />
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
               </form>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>

   @endsection

   @section('scripts')

      <!-- vendor page custom js -->
      <script type="text/javascript">
      $(function () {
         var table = $('#pin-table').DataTable({
            processing: true,
            serverSide: true,
            order: { "column": "0", "dir": "desc" },
            ajax: {
               url: "{{ route('admin.pin.datatable') }}",
               type: "POST",
            },
            columns: [
               {data: 'DT_RowIndex', name: 'id'},
               {data: 'created_at', name: 'created_at'},
               {data: 'username', name: 'username'},
               {data: 'plan.name', name: 'plan.name'},
               {data: 'pin_code', name: 'pin_code'},
               {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
         });
      });
      $('#user_id').change(function(){
         var username = $(this).val();
         $.ajax({
            url: "{{ route('pin.fetch_user') }}",
            type: "POST",
            data: {
               username: username
            },
            success: function(response){
               if(response.status == 1){
                  $('#name').val(response.name);
               } else {
                  $('#name, #user_id').val('');
                  $('#user_id').focus();
                  alert('User not found');
               }
            }
         });
      });
      </script>

@endsection
