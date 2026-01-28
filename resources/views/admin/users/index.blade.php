@extends('layouts.app')

@section('title', 'Members List')
@section('styles')

@endsection

@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Members List</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Members List</li>
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
                        <table class="table table-bordered text-nowrap border-bottom w-100 user-table" id="member-table">
                            <thead>
                                <tr>
                                <th class="wd-15p border-bottom-0">S.No</th>
                                <th class="wd-15p border-bottom-0">DOR</th>
                                <th class="wd-25p border-bottom-0">Sponsor</th>
                                <th class="wd-15p border-bottom-0">Username</th>
                                <th class="wd-15p border-bottom-0">Plan</th>
                                <th class="wd-15p border-bottom-0">Name</th>
                                <th class="wd-25p border-bottom-0">Mobile</th>
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

   @endsection

   @section('scripts')

        <!-- vendor page custom js -->
        <script type="text/javascript">
        $(function () {
            var table = $('#member-table').DataTable({
                processing: true,
                serverSide: true,
                order: { "column": "0", "dir": "desc" },
                ajax: "{{ route('admin.login_user.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'sponsor', name: 'sponsor'},
                    {data: 'username', name: 'username'},
                    {data: 'plan', name: 'plan'},
                    {data: 'name', name: 'name'},
                    {data: 'mobile', name: 'mobile'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
        </script>

        <!-- DATA TABLE JS-->
        <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
        <script src="{{asset('assets/js/table-data.js')}}"></script>

@endsection
