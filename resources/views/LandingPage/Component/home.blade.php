
      
  <div class="hero-section">
        <div class="hero-content p-3 ">
            <h1  style="font-size: 4vh; font-weight: 900; font-family: Tahoma, sans-serif;">Best reliable E-Commerce platform in Bangladesh</h1>
            <!-- <p class="hero-description">Explore a wide range of high-quality products for your everyday needs.</p> -->
            <a href="#shop-product" class="hero-button mt-2">Shop Now</a>
        </div>
        <i class="fas fa-chevron-down"></i>
  </div>
  

    <div id="shop-product" class="text-center  mb-5 mt-5 ">
      <h2 class="text-info" style=" font-family: popins; font-weight:600; font-size:5vh;  " > আমাদের প্রডাক্ট সমূহ
      </h2>
    </div>
     <div class="container">
       <div class="row mt-5">
        @if($data && $data->count() > 0)
        @foreach ($data as $item)
        <div class="col-md-4 col-10 m-auto p-1">
            <div class="card text-center p-1" >
              <a href="{{ route('product.show', ['id' => $item->id]) }}">
               
              </a>  
                <div class="card-body">
                      <a href="{{ route('product.show', ['id' => $item->id]) }}">
                        <img src="{{ asset('public/images/' . $item->image) }}" class="card-img-top img-fluid mb-3" alt="...">
                      </a>
                    <h5 class="card-title">{{$item->title}}</h5>
                    <p class="card-text"> Product Code : {{$item->product_code}}</p>
                    <h5 class="text-danger"><s>৳ {{$item->old_price}}</s></h5>
                    <h5>৳ {{$item->discount_price}}</h5>
                    <a href="{{ route('product.show', ['id' => $item->id]) }}">
                      <button class="btn btn-danger" style="font-size: 2vh; font-weight:600; font-family:popins;"> অর্ডার করুন <i class="fas fa-arrow-circle-right"></i></button>
                    </a> 
                 </div>
            </div>
        </div> 
    @endforeach
    @else
        <div class="align-items-center justify-content-center">
          <h1 class="stock-out-heading text-center">Product Stock Out</h1>
      </div>
    @endif
         
         
       </div>
     </div>

</div>
