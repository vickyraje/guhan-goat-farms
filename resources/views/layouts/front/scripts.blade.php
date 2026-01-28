
            <!-- JavaScript Libraries -->
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
            <script type="text/javascript" src="{{asset('front/lib/easing/easing.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('front/lib/owlcarousel/owl.carousel.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('front/lib/tempusdominus/js/moment.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('front/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('front/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

            <!-- Template Javascript -->
            <script type="text/javascript" src="{{asset('front/js/main.js')}}"></script>
            <script type="text/javascript">
                stickyHeaderHandler();

                // ON WINDOW SCROLL
                $(window).scroll(function () {
                    stickyHeaderHandler();
                });

                function stickyHeaderHandler() {
                    if (!window.homePosition) window.homePosition = $('#navbar').offset().top;
                    var currentOffsetPosition = $(window).scrollTop();

                    if (currentOffsetPosition > window.homePosition) {
                        $('#navbar').addClass('sticky');
                    } else {
                        $('#navbar').removeClass('sticky');
                    }

                    if (!window.homePosition) window.homePosition = $('#navbar2').offset().top;
                    var currentOffsetPosition = $(window).scrollTop();

                    if (currentOffsetPosition > window.homePosition) {
                        $('#navbar2').addClass('sticky2');
                    } else {
                        $('#navbar2').removeClass('sticky2');
                    }
                }
            </script>
