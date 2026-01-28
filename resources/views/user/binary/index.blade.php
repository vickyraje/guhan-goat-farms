@extends('layouts.user')

@section('title', 'Binary Commission')
@section('styles')

@endsection

@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Binary Commission</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                @php
                    $type = Auth::guard('user')->check() ? 'user' : 'admin';
                @endphp
                <li class="breadcrumb-item"><a href="{{url('/'.$type)}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Binary Commission List</li>
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
                        <table class="table table-bordered text-nowrap border-bottom w-100 user-table" id="binary-table">
                            <thead>
                                <tr>
                                <th class="wd-15p border-bottom-0">S.No</th>
                                <th class="wd-15p border-bottom-0">Date</th>
                                @if (!Auth::guard('user')->check())
                                <th class="wd-15p border-bottom-0">Username</th>
                                @endif
                                <th class="wd-15p border-bottom-0">Pair Match</th>
                                <th class="wd-25p border-bottom-0">Amount</th>
                                <th class="wd-25p border-bottom-0">TDS</th>
                                <th class="wd-25p border-bottom-0">SC</th>
                                <th class="wd-25p border-bottom-0">Net Amount</th>
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
            var table = $('#binary-table').DataTable({
                processing: true,
                serverSide: true,
                order: { "column": "0", "dir": "desc" },
                ajax: "{{ route($type.'.binary') }}",
                columns: [
                    @if (Auth::guard('user')->check())
                        {data: 'DT_RowIndex', name: 'id'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'pair_data', name: 'pair_data'},
                        {data: 'amount', name: 'amount'},
                        {data: 'tds', name: 'tds'},
                        {data: 'sc', name: 'sc'},
                        {data: 'transfer_amount', name: 'transfer_amount'},
                    @else
                        {data: 'DT_RowIndex', name: 'id'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'username', name: 'username'},
                        {data: 'pair_data', name: 'pair_data'},
                        {data: 'amount', name: 'amount'},
                        {data: 'tds', name: 'tds'},
                        {data: 'sc', name: 'sc'},
                        {data: 'transfer_amount', name: 'transfer_amount'},
                    @endif
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
