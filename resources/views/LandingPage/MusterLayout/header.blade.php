<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="facebook-domain-verification" content="kpz8lc79hjdrbgxj53oixeqbmseygy" />
<title>Chose Mart</title>
<link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="landingPagestyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<!-- Meta Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1101296901691831');
    fbq('track', 'PageView');
</script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1101296901691831&ev=PageView&noscript=1"
    />
</noscript>
<!-- End Meta Pixel Code -->

    <style>
    body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
        }

        .hero-section {
            position: relative;
            height: 50vh;
           
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://chosemart.com/public/images/Banner.jpg') ;
            display: flex;
            background-repeat: no-repeat;
            background-size: cover;
            flex-direction: column;
            background-attachment: fixed;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff;
        }

        .hero-content {
            max-width: 600px;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }

        .hero-description {
            font-size: 1.25rem;
            margin-bottom: 30px;
            letter-spacing: 0.5px;
        }

        .hero-button {
            display: inline-block;
            padding: 12px 24px;
            font-size: 1.2rem;
            font-weight: 600;
            text-decoration: none;
            background-color: #ee2e24;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .hero-button:hover {
            background-color: #fff;
            color: rgb(236, 58, 4);
        }

        .fa-chevron-down {
            font-size: 2rem;
            margin-top: 20px;
            color: #fff;
            cursor: pointer;
        }
        
        .socialLink a {
            font-size: 20px;
            margin: 0 6px;
            transition: .3s;
        }

        .btn-danger {
            color: #fff;
            background-color: #ee2e24;
            border-color: #ee2e24;
        }
        .btn-danger:hover{
            background-color:rgb(220, 24, 14);
            border-color: rgb(220, 24, 14);
        }
        .text-info {
            color: rgb(220, 24, 14) !important;
        }
        a {
            color: #ee2e24;
            text-decoration: none;
            background-color: transparent;
        }
        .buy-now-button:hover {
            background-color: #ee2e24;
            color: #fff;
        }
        .btn-outline-info {
            color: #ee2e24;
            border-color: #ee2e24;
        }

        .btn-outline-info:hover{
            background: #ee2e24;
            color: #fff !important;
            border: 1px solid transparent;
        }
        
        .btn-outline-info:focus {
            box-shadow: 0 0 0 .2rem rgba(252, 122, 116, 0.3);
        }
</style>

</head>
<body>
<div>
   

    <nav class="  navbar navbar-expand-lg navbar-light bg-light px-2">
        <a class="navbar-brand ml-md-4 ml-sm-3 ml-lg-5" href="{{route('home.index')}}">
            <img class="ml-2" src="{{ asset('logo.jpg') }}" alt="Logo" height="50px" width="180px">
         
        </a>
        <div class="d-flex  text-dark d-sm-none">
            <a  class="btn btn-outline-info " href="{{route('product.checkout')}}">  
                <i class="fa-solid fa-cart-plus"></i>
                @php
                    $totalQuantity = 0;
                    $userToken = Illuminate\Support\Facades\Session::get('user_token');

                    // Assuming 'user_token' is the column in the ProductCart table
                    $productCartModels = App\Models\ProductCart::where('user_token', $userToken)->get();

                    if ($productCartModels->isNotEmpty()) {
                        $totalQuantity = $productCartModels->sum('qty'); // Assuming 'qty' is the quantity column in ProductCart
                    }
                @endphp

                <span class="badge  text-dark ms-1 rounded-pill">
                {{ $totalQuantity }}
                </span>
            </a>

        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                 <a class="nav-link" href="{{route('about.index')}}"> <b>About </b> <span class="sr-only">(current)</span></a> 
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('contact.index')}}"> <b> Contact </b> <span class="sr-only">(current)</span></a> 
           </li>
           <li class="nav-item active">
                    <a class="nav-link" href="{{route('home.index')}}"> <b> Product  </b> <span class="sr-only">(current)</span></a> 
            </li>
            <li class="nav-item active">
                {{-- <a class="nav-link" href="{{route('')}}"> Contact <span class="sr-only">(current)</span></a> --}}
            </li>
        
            
        
            
            </ul>


            
            <div class="d-flex align-items-center">
            
            
            <a class="btn btn-outline-info mr-lg-5 mr-md-5 mr-sm-4 " href="{{route('product.checkout')}}">
            <div class="d-flex text-dark  ">
            
                <i class="fa-solid fa-cart-plus"></i>
                

                    @php
                        $totalQuantity = 0;
                        $userToken = Illuminate\Support\Facades\Session::get('user_token');

                        // Assuming 'user_token' is the column in the ProductCart table
                        $productCartModels = App\Models\ProductCart::where('user_token', $userToken)->get();

                        if ($productCartModels->isNotEmpty()) {
                            $totalQuantity = $productCartModels->sum('qty'); // Assuming 'qty' is the quantity column in ProductCart
                        }
                    @endphp

                <span class="badge  text-dark ms-1 rounded-pill">
                {{ $totalQuantity }}
                </span>
            
        
                </div>
                </a> 
                </div>     
            
            </div>
    </nav>
</div>