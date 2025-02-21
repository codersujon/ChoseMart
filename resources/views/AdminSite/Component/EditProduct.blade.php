<div class="ams-main-content-wpr">
             <!--  New Customer -->
            <div class="ams-panel-wpr">
                <div class="ams-panel">
                    <div class="panel-heading">
                        <h5 class="panel-title">Edit Product </h5>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                    <div class="panel-body">
                        <div class="ams-customer-add-form input-double">
                        <form action="{{ route('products.update', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data" class="ams-form">
                                @csrf
                                @method('PUT') 
                                <div class="input-group input-verticle mt-0">
                                    <fieldset class="ams-input input-verticle">
                                        <label for="name">Product Name :</label>
                                        <input type="text"  name="title" id="title" placeholder="Customer Name" value="{{ $data->title }}">
                                    </fieldset>
                                    <fieldset class="ams-input input-verticle">
                                        <label for="Quantity">Quantity:</label>
                                        <input name="quantity" type="number" id="Quantity" placeholder="Quantity " value="{{ $data->quantity }}">
                                    </fieldset>
                                      <fieldset class="ams-input input-verticle">
                                        <label for="Quantity">Product Code </label>
                                        <input name="product_code" type="text" id="product_code" placeholder="Product Oode  " value="{{ $data->product_code }}">
                                    </fieldset>
                                      <fieldset class="ams-input input-verticle">
                                        <label for="color">Color :</label>
                                        <input name="color" type="text" id="color" placeholder="Color " value="{{ $data->color }}">
                                    </fieldset>
                                      <fieldset class="ams-input input-verticle">
                                        <label for="size">Size :</label>
                                        <input name="size" type="text" id="size" placeholder="Size " value="{{ $data->size }}">
                                    </fieldset>
                                    <fieldset class="ams-input input-verticle">
                                        <label for="ByingPrice"> Bying Price </label>
                                        <input name="price" type="number" id="ByingPrice" placeholder="Bying Price" value="{{ $data->price }}">
                                    </fieldset>
                                    <fieldset class="ams-input input-verticle">
                                        <label for="old_price">Old Price :</label>
                                        <input type="number" name="old_price" id="old_price" placeholder="Old Price" value="{{ $data->old_price }}">
                                    </fieldset>
                               
                                   
                                    <fieldset class="ams-input input-verticle">
                                        <label for="discount_price">Discount Price :</label>
                                        <input name="discount_price" type="number" id="discount_price" placeholder="Discount Price " value="{{ $data->discount_price }}">
                                    </fieldset>
                                    <fieldset  style=" border:2px dotted red; height:20h; width:25vh; padding:1vh;">
                                        <label for="Image"> <h6 class="text-dark">Image :</h6></label>
                                        <input type="file" name="image" id="Image">
                                    </fieldset>
                                   
                                
                                </div>
                                <fieldset class="ams-input input-verticle mt-40 p-3">
                                    <label for="textbox">Short Description </label>
                                    <textarea name="short_des" id="textbox" cols="5" rows="5">{{ $data->short_des }}</textarea>
                                </fieldset>
                                <fieldset class="text-center text-md-end text-lg-end ">
                                    <button type="submit" class="btn btn-block mt-4 submit-btn"><i class="far fa-save"></i> Save Change  </button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>