@extends('layouts.user')

@section('title', 'Change Password')
@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <div>
        <h1 class="page-title">Change Password</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/vendor')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                @include('layouts.error')
                <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                    action="{{route('user.change_password')}}">
                    {{ csrf_field() }}
                    @method('POST')
                    <div class="row mb-4">
                        <label for="old" class="col-md-3 form-label">Old Password <span class="editable-error">*</span></label>
                        <div class="col-md-9">
                            <input class="form-control" id="old" name="old" type="password" required autocomplete="current-password" value="{{old('old')?old('old'):''}}" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="password" class="col-md-3 form-label">New Password <span class="editable-error">*</span></label>
                        <div class="col-md-9">
                            <input class="form-control" id="password" name="password" type="password" required autocomplete="new-password" value="{{old('password')?old('password'):''}}" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="password_confirmation" class="col-md-3 form-label">Confirm New Password <span class="editable-error">*</span></label>
                        <div class="col-md-9">
                            <input class="form-control" id="password_confirmation" name="password_confirmation" type="password"  required autocomplete="new-password" />
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

@endsection
