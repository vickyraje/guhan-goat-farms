@extends('layouts.user')

@section('title', 'My Account')
@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <div>
        <h1 class="page-title">My Account</h1>
    </div>
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/user')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Account</li>
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
                    action="{{route('user.profile')}}">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="row mb-4">
                        <label for="username" class="col-md-3 form-label">Username <span class="editable-error">*</span></label>
                        <div class="col-md-9">
                            <input class="form-control" id="username" type="text" required value="{{$user->username}}" disabled />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="name" class="col-md-3 form-label">Name </label>
                        <div class="col-md-9">
                            <input class="form-control" id="name" name="name" type="text" value="{{$user->name}}" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="email" class="col-md-3 form-label">Email </label>
                        <div class="col-md-9">
                            <input class="form-control" id="email" name="email" type="email" value="{{$user->email}}" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="mobile" class="col-md-3 form-label">Mobile Number <span class="editable-error">*</span></label>
                        <div class="col-md-9">
                            <input class="form-control" id="mobile" name="mobile" type="tel" maxlength="10" required value="{{$user->mobile}}" />
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
