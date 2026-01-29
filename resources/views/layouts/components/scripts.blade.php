        <!-- BACK-TO-TOP -->
        <a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

        <!-- JQUERY JS -->
        <script type="text/javascript" src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

        <!-- BOOTSTRAP JS -->
        <script type="text/javascript" src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

        <!-- SIDE-MENU JS -->
        <script type="text/javascript" src="{{asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>

        <!-- SELECT2 JS -->
	    <script type="text/javascript" src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>

        <!-- STICKY JS -->
        <script type="text/javascript" src="{{asset('assets/js/sticky.js')}}"></script>

        <!-- DATA TABLE JS-->
        <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>

        <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        </script>

        @yield('scripts')

        <!-- COLOR THEME JS -->
        <script type="text/javascript" src="{{asset('assets/js/themeColors.js')}}"></script>

        <!-- CUSTOM JS -->
        <script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>

        <script type="text/javascript">
        $('.slug, .slugs').on('keyup',function(){
            var str = $(this).val()
            .replace(/\s+/g, '-')
            .replace(/&/g, '-and-')
            .replace(/[^\w\-]+/g, '')
            .replace(/\-\-+/g, '-')
            .replace(/^-+/, '')
            .replace(/-+$/, '');
            if ($(this).hasClass('slugs')) {
                $('#slugs').val(str.toLowerCase());
            }
            if ($(this).hasClass('slug')) {
                $('#slug').val(str.toLowerCase());
            }
        });
        </script>
