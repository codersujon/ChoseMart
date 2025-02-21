
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- responsive tag -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="UTF-8">

    <!-- responsive tag -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Chose Mart</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/css/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/css/fontawesome/css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/css/mdi.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/css/style.css') }}"> <!-- Template Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/css/responsive.css') }}">

    <style>
        .brand-logo img{
            max-width: 90%;
        }
    </style>

</head>
<body>
    
    <!-- SideBar -->
    <div class="ams-sidebar">
        <div class="brand-logo">
            <a class="text-white" href="{{ route('dashboard') }}">
               <img src="{{ asset('logo.jpg') }}" alt="Chose Mart" class="img-fluid">
            </a>
        </div>
        <div class="sidebar-search">
            <input type="text" placeholder="Search">
            <i class="fas fa-search"></i>
        </div>
        <ul class="sidebar-menu">
            <li><a href="{{ route('dashboard') }}" class="active"><i class="fas fa-columns nav-icon"></i><span>Dashboard</span></a></li>
            
         
            <li class="has-menu"><a class="has-children"><i class="fa fas fa-cubes nav-icon"></i><span>Products</span><span class="nav-expand"><i class="fas fa-angle-right"></i></span></a>
                <ul class="sub-menu">
                    <li class="menu-name"><a href="{{ route('products.index') }}"> Product List</a></li>
                    <li><a href="{{ route('product.create') }}" >Add Product</a></li>
                </ul>
            </li>
            
            <li class="has-menu"><a href="#" class="has-children"><i class="fas fa-briefcase nav-icon"></i><span> Order </span><span class="nav-expand"><i class="fas fa-angle-right"></i></span></a>
                <ul class="sub-menu">
                    <li class="menu-name"><a href="{{ route('order.list') }}">Order list</a></li>
                    <li class="menu-name"><a href="{{ route('pendingOrder') }}">Pending list</a></li>
                    <li class="menu-name"><a href="{{ route('proccesingOrder') }}">Proccesing list</a></li>
                    <li class="menu-name"><a href="{{ route('returnOrder') }}">Return list</a></li>
                    <li class="menu-name"><a href="{{ route('delivaryOrder') }}">Delivary list</a></li>
                    <li class="menu-name"><a href="{{ route('completedOrder') }}">Completed list</a></li>
                    <li class="menu-name"><a href="{{ route('cencelOrder') }}">Cencel list</a></li>
                </ul>
               
             

            </li>
            <li class="has-menu"><a href="#" class="has-children"><i class="fas fa-users-cog nav-icon"></i><span>User</span><span class="nav-expand"><i class="fas fa-angle-right"></i></span></a>
                <ul class="sub-menu">
                    <li class="menu-name"><a href="{{route('allUser')}}">All User</a></li>
                    <li><a href="{{route('admin.resistration')}}">Create User</a></li>   
                </ul>
            </li>
           
          
        
        </ul>
    </div>

    <!-- Main Content -->
    <div class="ams-dashboard ams-main-content">
        <!-- Nav Menu -->
        <div class="ams-nav-wpr">
            <span class="nav-toggle">
                <i class="fas fa-bars"></i>
            </span>
         
            <div class="nav-right">

                <div class="ams-admin-wpr">
                                                 
                        <div class="admin-details ">
                            <a href="{{route('logout')}}" class="btn btn-danger"> Logout</a>
                         
                        </div>
                 
                  
                </div>
                <span class="nav-item menu-stack"><i class="fas fa-ellipsis-v"></i></span>
            </div>
        </div>