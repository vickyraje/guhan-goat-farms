        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                <button type="button" class="btn btn-sm close" data-dismiss="alert">×</button>
            </div>
        @endif

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="btn btn-sm close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if ($message = Session::get('warning'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="btn btn-sm close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
