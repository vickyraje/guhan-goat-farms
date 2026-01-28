@extends('layouts.app')

@section('title', 'Edit Member')

@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
   <div>
      <h1 class="page-title">Edit Member</h1>
   </div>
   <div class="ms-auto pageheader-btn">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
         <li class="breadcrumb-item"><a href="{{route('admin.login_user.index')}}">Memebers</a></li>
         <li class="breadcrumb-item active" aria-current="page">Edit Member</li>
      </ol>
   </div>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
   <div class="col-lg-12 col-md-12">
      <div class="card">
         <div class="card-body">
            @include('layouts.error')
            <form class="needs-validation was-validated" method="POST" enctype="multipart/form-data"
               action="{{route('admin.login_user.update',$loginUser->id)}}">
               {{ csrf_field() }}
               @method('PUT')
               <div class="row mb-4">
                  <label for="username" class="col-md-3 form-label">Username <span class="editable-error">*</span></label>
                  <div class="col-md-9">
                     <input class="form-control" id="username" type="text" required value="{{$loginUser->username}}" disabled />
                  </div>
               </div>
               <div class="row mb-4">
                  <label for="name" class="col-md-3 form-label">Name <span class="editable-error">*</span></label>
                  <div class="col-md-9">
                     <input class="form-control" id="name" name="name" type="text" value="{{$loginUser->name}}" required/>
                  </div>
               </div>
               <div class="row mb-4">
                  <label for="email" class="col-md-3 form-label">Email <span class="editable-error">*</span></label>
                  <div class="col-md-9">
                     <input class="form-control" id="email" name="email" type="email" value="{{$loginUser->email}}"/>
                  </div>
               </div>
               <div class="row mb-4">
                  <label for="mobile" class="col-md-3 form-label">Mobile Number <span class="editable-error">*</span></label>
                  <div class="col-md-9">
                     <input class="form-control" id="mobile" name="mobile" type="tel" maxlength="10" required value="{{$loginUser->mobile}}" />
                  </div>
               </div>
               <div class="row mb-4">
                  <label for="whatsapp" class="col-md-3 form-label">WhatsApp Number <span class="editable-error">*</span></label>
                  <div class="col-md-9">
                     <input class="form-control" id="whatsapp" name="whatsapp" type="tel" maxlength="10" required value="{{$loginUser->whatsapp}}" />
                  </div>
               </div>
               <div class="row mb-4">
                  <label for="state" class="col-md-3 form-label">State <span class="editable-error">*</span></label>
                  <div class="col-md-9">
                        <select name="state" id="state" class="form-select" required>
                           <option value="">Select State</option>
                           @foreach ($states as $state)
                           <option @if ($loginUser->state == $state->id) selected @endif value="{{$state->id}}">{{$state->name}}</option>
                           @endforeach
                        </select>
                  </div>
               </div>
               <div class="row mb-4">
                  <label for="city" class="col-md-3 form-label">City <span class="editable-error">*</span></label>
                  <div class="col-md-9">
                        <select name="city" id="city" class="form-select" required>
                           <option value="">Select City</option>
                           @foreach ($cities as $city)
                           <option @if ($loginUser->city == $city->name) selected @endif value="{{$city->name}}">{{$city->name}}</option>
                           @endforeach
                        </select>
                  </div>
               </div>
               <div class="row mb-4">
                  <label for="status" class="col-md-3 form-label">Status <span class="editable-error">*</span></label>
                  <div class="col-md-9">
                        <select name="status" id="status" class="form-select" required>
                           @php
                              $statues = ['Disable', 'Enable'];
                           @endphp
                           <option value="">Select Status</option>
                           @foreach ($statues as $key => $status)
                           <option @if ($loginUser->status == $key) selected @endif value="{{$key}}">{{$status}}</option>
                           @endforeach
                        </select>
                  </div>
               </div>
               <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection

@section('scripts')

    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#state').change(function(){
        var stateId = $(this).val();
        $.ajax({
            type:'POST',
            url:"{{ route('admin.city_list') }}",
            data:{state:stateId},
            dataType: 'JSON',
            success:function(data){
                var options;
                options = options +  '<option value="">Select City</option>';
                $.each( data.cities, function( key, value ) {
                    options = options + '<option value="'+value.name+'">'+value.name+'</option>';
                });
                $("#city").html(options);
            }
        });
    })
    </script>

@endsection
