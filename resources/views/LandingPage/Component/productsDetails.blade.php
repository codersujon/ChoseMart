<style>

 
 
    .navbar {
        background-color: #007bff;
    }

    .orange-bg {
        background-color: #ffc107;
        color: #212529;
    }
    body {
    font-family: 'Open Sans', sans-serif;
}

h1, h5 {
    font-family: 'Oswald', sans-serif;
}

.col-md-6 img {
max-width: 100%;
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
border-radius: 8px;
margin-bottom: 20px;
}
.col-md-6 {
padding: 20px;
    }

    p {
        line-height: 1.6;
        color: #555;
    }

    #subscribe {
        padding: 40px 0;
        text-align: center;
        color: #fff;
    }

    input.form-control {
        max-width: 300px;
        margin-right: 10px;
    }

    .buy-now-button {
        background-color: #212529;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }
    footer {
            text-align: center;
            padding: 10px;
            background-color: #f8f9fa;
            /*position: fixed;*/
            bottom: 0;
            width: 100%;
        }
        


/* increment and decrement  */

.quantity {
    margin-top: 20px;
}

.quantity label {
    font-size: 18px;
    margin-bottom: 10px;
    display: block;
}

.input-group {
    width: 150px; /* Adjust the width as needed */
 /* Center the input group */
}

.input-group-prepend,
.input-group-append {
    height: 38px;
}

.btn-outline-secondary {
    color: #007bff;
}

input.form-control {
    text-align: center;
    font-size: 16px;
}

#decrementBtn,
#incrementBtn {
    font-size: 18px;
}

.btn-outline-secondary:hover {
    color: #0056b3;
}

.btn-outline-secondary:focus {
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

#orderBtn {
    font-weight: bold;
    font-size: 16px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

#orderBtn:hover {
    background-color: #0069d9; /* Change color on hover */
}

/* hero section  */



   .hero-section {
       position: relative;
       height: 20vh;
      
       background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y2xvdGhpbmclMjBzdG9yZXxlbnwwfHwwfHx8MA%3D%3D') ;
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
       background-color: #ff5e14;
       color: #fff;
       border-radius: 5px;
       transition: background-color 0.3s ease;
   }

   .hero-button:hover {
       background-color: #ff3b00;
   }

   .fa-chevron-down {
       font-size: 2rem;
       margin-top: 20px;
       color: #fff;
       cursor: pointer;
   }
   .container {
max-width: 960px;
}

.border-top { border-top: 1px solid #e5e5e5; }
.border-bottom { border-bottom: 1px solid #e5e5e5; }
.border-top-gray { border-top-color: #adb5bd; }

.box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }

.lh-condensed { line-height: 1.25; }
</style>





<div class="hero-section" style="min-height:200px; padding:50px!important;">
<div class="hero-content ">
   <h1 class="hero-title"> Shop Details </h1>
</div>
<i class="fas fa-chevron-down"></i>
</div>


<div class="col-md-8 col-lg-8 col-sm-10  m-auto mt-5 ">
<div class="row">
   <div class="col-md-6">
       <img src="{{ asset('public/images/' . $data->image) }}" alt="" height="400vh" width="400vh">
   </div>
   <div class="col-md-6">
     <form action="{{ route('addToChart') }}" method="post"> 
       @csrf 
       <input type="hidden" name="product_id" value="{{$data->id}}">
       <h1> {{$data->title }} </h1>
       <input type="hidden" name="price" value="{{$data->discount_price}}">
        <h5 class="text-danger"><s>Price : ৳ {{$data->old_price}}</s></h5>
       <h5>Price : ৳ {{$data->discount_price}} </h5>
       <p> {{$data->short_des}} </p>

       <div class="form-group">
            Select Size
           <br>
               <?php 
                   $sizeData = $data->size;
                   $zizeArray = explode(',', $sizeData);
                   foreach ($zizeArray as  $size) {
                   
                   ?>
                  
                  <label style="font-size: 20px;">   <input type="radio" name="size" value="{{$size}}" required=""> {{$size}}</label>

                   <?php }
               
               ?>
          
       </div>
       <div class="form-group">
      
         
           <p> Select Color</p>
               <?php 
                   $sizeData = $data->color;
                   $zizeArray = explode(',', $sizeData);
                   foreach ($zizeArray as  $size) {
                   
                   ?>
                  
                  <label style="font-size: 20px;" >
                      <input type="radio" name="color" value="{{$size}}" required=""> {{$size}}</label>

                   <?php }
               
               ?>
          
       </div>
   


       <div class="row m-0 p-0">
           <div class="col-md-12 m-0 p-0">
               <div class="quantity m-0 p-0">
                   <label for="quantity m-0 p-0 "> Quantity :  </label>
                   <div class="input-group">
                       <div class="input-group-prepend">
                           <button class="btn btn-outline-secondary" type="button" id="decrementBtn">-</button>
                       </div>
                       <input type="number" name="qty" class="form-control" id="quantity" value="1">
                       <div class="input-group-append">
                           <button class="btn btn-outline-secondary" type="button" id="incrementBtn">+</button>
                       </div>
                   </div>
               </div>
           </div>
           <div class="col-md-12 text-start mt-3 p-0" >  
               <button type="submit" class="btn btn-primary btn-block" id="orderBtn">অর্ডার করুন</button>
           </div>
       </div>   
   </div>
</form> 
</div>
</div>

{{-- our releted product  --}}

<div class=" col-md-8 col-lg-8 col-sm-10  m-auto  mt-2 mb-5 ">
<h2 class="mb-4">Related Products</h2>
<div class="row">
<!-- Product 1 -->
@php
  $relatedProducts = App\Models\Product::latest()->take(3)->get();
@endphp

@foreach($relatedProducts as $item)
<div class="col-md-4">
   <div class="card mt-2 text-center">
     <a href="{{ route('product.show', ['id' => $item->id]) }}">
       <img  src="{{ asset('public/images/' . $item->image) }}" class="card-img-top" alt="...">
     </a>  
       <div class="card-body">
           <h5 class="card-title">{{$item->title}}</h5>
           <p class="card-text">{{$item->short_des}}</p>
           <h5 class="text-danger"><s>৳ {{$data->old_price}}</s></h5>
           <h5>৳ {{$item->discount_price}}</h5>
           <a href="{{ route('product.show', ['id' => $item->id]) }}">
             <button class="buy-now-button" style="font-size: 2vh; font-weight:600; font-family:popins;"> অর্ডার করুন <i class="fas fa-arrow-circle-right"></i></button>
           </a> 
        </div>
   </div>
</div>
@endforeach


</div>


</div>



<script>
// JavaScript for quantity increment and decrement
document.addEventListener('DOMContentLoaded', function () {
   var quantityInput = document.getElementById('quantity');
   var incrementBtn = document.getElementById('incrementBtn');
   var decrementBtn = document.getElementById('decrementBtn');

   incrementBtn.addEventListener('click', function () {
       quantityInput.value = parseInt(quantityInput.value) + 1;
   });

   decrementBtn.addEventListener('click', function () {
       if (parseInt(quantityInput.value) > 1) {
           quantityInput.value = parseInt(quantityInput.value) - 1;
       }
   });
});
</script>
