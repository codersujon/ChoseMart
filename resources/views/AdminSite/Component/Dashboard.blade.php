<div class="ams-info-boxes ams-content-boxes">
                <div class="container">
                    <div class="row">
                       
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <a href="#" class="single-info-box bg-red">
                                <div class="info-box-icon">
                                    <i class="fas fa-shopping-bag"></i>
                                </div>
                                <div class="info-box-content">
                                    @php 
                                      $totalProduct = App\Models\Product::all()->count();
                                      $pendingOrder = App\Models\Invoice::where('status','=','pending')->count();
                                      $proccesingOrder = App\Models\Invoice::where('status','=','proccessing')->count();
                                      $delivary = App\Models\Invoice::where('status','=','delivary')->count();
                                      $completed = App\Models\Invoice::where('status','=','completed')->count();
                                      
                                    @endphp
                                    <h1>{{$totalProduct}}</h1>
                                    <p>Product</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <a href="#" class="single-info-box bg-orange">
                                <div class="info-box-icon">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                                <div class="info-box-content">
                                    <h1>{{$delivary}}</h1>
                                    <p>Total Delivary </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <a href="#" class="single-info-box bg-violate">
                                <div class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="info-box-content">
                                    <h1>{{ $proccesingOrder}}</h1>
                                    <p>Proccesing Order</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <a href="#" class="single-info-box bg-aquamarine">
                                <div class="info-box-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="info-box-content">
                                    <h1>{{$pendingOrder}}</h1>
                                    <p>Pending Order</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <a href="#" class="single-info-box bg-slateblue">
                                <div class="info-box-icon">
                                    <i class="fas fa-shopping-bag"></i>
                                </div>
                                <div class="info-box-content">
                                    <h1>{{$completed}}</h1>
                                    <p>Total Completed Order </p>
                                </div>
                            </a>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
            <!-- Dashboard Charts -->
         