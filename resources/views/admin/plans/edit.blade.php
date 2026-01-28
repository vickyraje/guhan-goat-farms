@extends('layouts.app')

@section('title', 'Edit Plan')
@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
   <div>
      <h1 class="page-title">Edit Plan</h1>
   </div>
   <div class="ms-auto pageheader-btn">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
         <li class="breadcrumb-item"><a href="{{route('plan.index')}}">Plans</a></li>
         <li class="breadcrumb-item active" aria-current="page">Edit Plan</li>
      </ol>
   </div>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
   <div class="col-lg-12 col-md-12">
      <div class="card">
         <div class="card-body">
               @include('layouts.error')
               <form class="needs-validation was-validated" method="POST" enctype="multipart/form-data" action="{{route('plan.update', $plan->id)}}">
                  {{ csrf_field() }}
                  @method('PUT')
                  <div class="row">
                     <div class="col-md-4">
                           <label for="name" class="form-label">Plan Name <span class="editable-error">*</span></label>
                           <input class="form-control" name="name" id="name" type="text" value="{{ $plan->name }}" required />
                     </div>
                     <div class="col-md-4">
                           <label for="amount" class="form-label">Package Amount <span class="editable-error">*</span></label>
                           <input class="form-control" id="amount" name="amount" type="number" min="0" required value="{{ $plan->amount }}"/>
                     </div>
                     <div class="col-md-4">
                           <label for="divident" class="form-label">Divident <span class="editable-error">*</span></label>
                           <input class="form-control" id="divident" name="divident" type="number" min="0" required value="{{ $plan->dividend }}"/>
                     </div>
                  </div>

                  <div class="row" id="divident_rows">
                     @foreach($plan->amounts as $index => $percentage)
                     <div class="col-md-4">
                           <label for="divident_percentage_{{ $index + 1 }}" class="form-label">Divident Percentage {{ $index + 1 }} <span class="editable-error">*</span></label>
                           <input class="form-control" id="divident_percentage_{{ $index + 1 }}" name="divident_percentage[]" type="number" min="0" required value="{{ $percentage }}"/>
                     </div>
                     @endforeach
                  </div>
                  <div class="row">
                     <div class="col-md-4">
                           <label for="status" class="form-label">Status <span class="editable-error">*</span></label>
                           <select name="status" id="status" class="form-select" required>
                              @php
                                 $statues = ['Disable', 'Enable'];
                              @endphp
                              @foreach ($statues as $key => $status)
                              <option {{ $plan->status == $key ? 'selected' : '' }} value="{{$key}}">{{$status}}</option>
                              @endforeach
                           </select>
                     </div>
                  </div>
                  <button type="submit" class="mt-5 btn btn-primary btn-block">Save Changes</button>
               </form>
         </div>
      </div>
   </div>
</div>
@endsection

@section('scripts')

   <script type="text/javascript">
   $('#divident').on('keyup change', function() {
      var divident = parseInt($(this).val());
      var divident_rows = '';
      for (var i = 1; i <= divident; i++) {
         divident_rows += `
         <div class="col-md-4">
               <label for="divident_percentage_` + i + `" class="form-label">Divident Percentage ` + i + ` <span class="editable-error">*</span></label>
               <input class="form-control" id="divident_percentage_` + i + `" name="divident_percentage[]" type="number" min="0" required/>
         </div>
         `;
      }
      $('#divident_rows').html(divident_rows);
   });
   </script>

@endsection
