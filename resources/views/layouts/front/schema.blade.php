        <meta name="og:title" content="{{$product->meta_title}}" />
        <meta name="og:description" content="{{$product->meta_description}}" />
        <meta property="og:image:alt" content="{{$product->slug}}">
        <meta name="og:url" content="{{url()->current()}}" />
        @php
            $image = explode(',', $product->image);
        @endphp
        
        <meta name="og:image" content="{{asset('public/assets/images/product/'.$image[0])}}" />
        <meta property="og:image:url" content="{{asset('public/assets/images/product/'.$image[0])}}">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:type" content="image/jpg">
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:width" content="300" />
        <meta property="og:image:height" content="300" />

        <!--Product Start-->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org/", 
            "@type": "Product", 
            "name": "{{$product->name}}",
            "image": "{{asset('public/assets/images/product/'.$image[0])}}",
            "description": "{!! $product->description !!}",
            "offers": {
                "@type": "Offer",
                "url": "{{url()->current()}}",
                "priceCurrency": "INR",
                "price": "{{$product->offer_price?$product->offer_price:$product->selling_price}}",
                "priceValidUntil": "{{date('Y-12-31')}}",
                "availability": "https://schema.org/LimitedAvailability",
                "itemCondition": "https://schema.org/NewCondition"
            },
            "areaServed": ["{{$product->vendors?$product->vendors->areas->name:''}}"]
        }
        </script>