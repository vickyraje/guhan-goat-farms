<html>

    <head>
        <title>{{$vendor->business_name}}</title>
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <script src="https://use.fontawesome.com/452826394c.js"><script>
    </head>

    <body>
        <caption><h1>{{$vendor->business_name}}</h1>
        <img alt="{{$vendor->slug}}" src="data:image/png;base64, {!! base64_encode(QrCode::size(250)->generate(url($vendor->slug))) !!} ">
        <h1><i class="fa fa-3x fa-mobile"></i> {{chunk_split($vendor->mobile, 2)}}</h1></caption>
    </body>

</html>
