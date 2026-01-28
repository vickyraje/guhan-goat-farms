@extends('layouts.user')

@section('title', 'New User Register')
@section('styles')

@endsection

@section('content')

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <div>
                                    <h1 class="page-title">New User Register</h1>
                                </div>
                                <div class="ms-auto pageheader-btn">
                                    <ol class="breadcrumb">
                                       <li class="breadcrumb-item"><a href="{{url('/user')}}">Dashboard</a></li>
                                       <li class="breadcrumb-item active" aria-current="page">New User Register</li>
                                    </ol>
                                </div>
                            </div>
                            <!-- PAGE-HEADER END -->

                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            @include('layouts.error')

                                            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{route('user.login_user.store')}}">
                                                {{ csrf_field() }}
                                                @method('POST')
                                                <div class="row mb-4">
                                                   <label for="name" class="col-md-3 form-label">Name <span class="editable-error">*</span></label>
                                                   <div class="col-md-9">
                                                      <input class="form-control" id="name" name="name" type="text" required autofocus value="{{old('name')?old('name'):''}}" />
                                                   </div>
                                                </div>
                                                <div class="row mb-4">
                                                   <label for="gender" class="col-md-3 form-label">Gender <span class="editable-error">*</span></label>
                                                   <div class="col-md-9">
                                                      @php
                                                         $genders = ['male', 'female'];
                                                      @endphp
                                                      <select name="gender" id="gender" class="form-select" required>
                                                         @foreach($genders as $gender)
                                                         <option @if (old('gender') == $gender) selected @endif value="{{$gender}}">{{ucfirst($gender)}}</option>
                                                         @endforeach
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="row mb-4">
                                                   <label for="email" class="col-md-3 form-label">Email </label>
                                                   <div class="col-md-9">
                                                      <input class="form-control" id="email" name="email" type="email" value="{{old('email')?old('email'):''}}" />
                                                   </div>
                                                </div>
                                                <div class="row mb-4">
                                                   <label for="mobile" class="col-md-3 form-label">Mobile Number <span class="editable-error">*</span></label>
                                                   <div class="col-md-9">
                                                      <input class="form-control" id="mobile" name="mobile" type="tel" maxlength="10" required value="{{old('mobile')?old('mobile'):''}}" />
                                                   </div>
                                                </div>
                                                <div class="row mb-4">
                                                   <label for="whatsapp" class="col-md-3 form-label">WhatsApp Number <span class="editable-error">*</span></label>
                                                   <div class="col-md-9">
                                                      <input class="form-control" id="whatsapp" name="whatsapp" type="tel" maxlength="10" required value="{{old('whatsapp')?old('whatsapp'):''}}" />
                                                   </div>
                                                </div>
                                                <div class="row mb-4">
                                                   <label for="state" class="col-md-3 form-label">State <span class="editable-error">*</span></label>
                                                   <div class="col-md-9">
                                                      <select name="state" id="state" class="form-select" required>
                                                         <option value="">Select State</option>
                                                         @foreach ($states as $state)
                                                         <option @if (old('state') == $state->id) selected @endif value={{$state->id}}>{{$state->name}}</option>
                                                         @endforeach
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="row mb-4">
                                                   <label for="city" class="col-md-3 form-label">City <span class="editable-error">*</span></label>
                                                   <div class="col-md-9">
                                                      <select name="city" id="city" class="form-select" required>
                                                         <option value="">Select City</option>
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="row mb-4">
                                                   <label for="pin_id" class="col-md-3 form-label">Pin <span class="editable-error">*</span></label>
                                                   <div class="col-md-9">
                                                      <input class="form-control" id="pin_id" name="pin_id" type="text" maxlength="6" required value="{{old('pin_id')?old('pin_id'):''}}" />
                                                   </div>
                                                </div>
                                                <div class="row mb-4">
                                                   <label for="password" class="col-md-3 form-label">Password <span class="editable-error">*</span></label>
                                                   <div class="col-md-9">
                                                      <input class="form-control" id="password" name="password" maxlength="20" type="password" required autocomplete="new-password" />
                                                      <small class="editable-error">The password must have at least seven characters and not more than twenty.</small>
                                                   </div>
                                                </div>
                                                <div class="row mb-4">
                                                   <label for="password_confirmation" class="col-md-3 form-label">Confirm New Password <span class="editable-error">*</span></label>
                                                   <div class="col-md-9">
                                                      <input class="form-control" id="password_confirmation" name="password_confirmation" type="password"  required autocomplete="new-password" />
                                                   </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
@endsection

@section('scripts')

         <script type="text/javascript">
         $('#state').change(function(){
               var stateId = $(this).val();
               $.ajax({
                  type:'POST',
                  url:"{{ route('city_list') }}",
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
         @if(old('state'))
         $(function(){
               $.ajax({
                  type:'POST',
                  url:"{{ route('city_list') }}",
                  data:{state:{{old('state')}}},
                  dataType: 'JSON',
                  success:function(data){
                     var options;
                     options = options +  '<option value="">Select City</option>';
                     $.each( data.cities, function( key, value ) {
                        options = options + '<option '+("{{old('city')}}" == value.name ? 'selected' : '')+' value="'+value.name+'">'+value.name+'</option>';
                     });
                     $("#city").html(options);
                  }
               });
         });
         @endif
         $('form').one('submit', function () {
            $(this).find('button[type=submit]').prop('disabled', true);
         });
         $('#mobile, #whatsapp').on('input', function () {
            this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);
         });
         $('#pin_id').on('input', function () {
            this.value = this.value.replace(/[^A-Z0-9]/g, '').slice(0, 6);
         });
         $('#pin_id').change(function(){
            var pinCode = $(this).val();
            if(pinCode.length == 6){
               $.ajax({
                  type:'POST',
                  url:"{{ route('validate_pin') }}",
                  data:{pin_code:pinCode},
                  dataType: 'JSON',
                  success:function(data){
                     if(data.status == 0){
                        alert(data.message);
                        $('#pin_id').val('');
                     }
                  }
               });
            }
         });
        </script>

@endsection
