<div class="ams-main-content-wpr">
             <!--  New Customer -->
            <div class="ams-panel-wpr">
                <div class="ams-panel">
                    <div class="panel-heading">
                        <h5 class="panel-title">Add Product </h5>
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
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data"  class="ams-form">
                                @csrf
                                <div class="input-group input-verticle mt-0">
                                    <fieldset class="ams-input input-verticle">
                                        <label for="name">Product Name : <strong class="text-danger">*</strong></label>
                                        <input type="text"  name="title" id="title" placeholder="Customer Name" value="{{ old('title') }}">
                                    </fieldset>
                                    <fieldset class="ams-input input-verticle">
                                        <label for="name">Product Code : <strong class="text-danger">*</strong></label>
                                        <input type="text"  name="product_code" id="title" placeholder="Customer Name" value="{{ old('title') }}">
                                    </fieldset>
                                    <fieldset class="ams-input input-verticle">
                                        <label for="Quantity">Quantity: <strong class="text-danger">*</strong></label>
                                        <input name="quantity" type="number" id="Quantity" placeholder="Quantity " value="{{ old('quantity') }}">
                                    </fieldset>
                                    <div class="form-group">
                                        <label for="size"> Size </label>
                                        <input type="text" name="size" class="form-control" placeholder="size , , ,">
                                    </div>
                                  
                                    <fieldset class="ams-input input-verticle">
                                        <label for="ByingPrice"> Bying Price <strong class="text-danger">*</strong></label>
                                        <input name="price" type="number" id="ByingPrice" placeholder="Bying Price" value="{{ old('price') }}">
                                    </fieldset>
                                    <div class="form-group">
                                        <label for="size"> Color </label>
                                        <input type="text" name="color" class="form-control" placeholder="color , , ,">
                                    </div>
                                    <fieldset class="ams-input input-verticle">
                                        <label for="old_price">Old Price : <strong class="text-danger">*</strong></label>
                                        <input type="number" name="old_price" id="old_price" placeholder="Old Price" value="{{ old('old_price') }}">
                                    </fieldset>
                               
                                   
                                    <fieldset class="ams-input input-verticle">
                                        <label for="discount_price">Discount Price : <strong class="text-danger">*</strong></label>
                                        <input name="discount_price" type="number" id="discount_price" placeholder="Discount Price " value="{{ old('discount_price') }}">
                                    </fieldset>
                                    <fieldset  style=" border:2px dotted red; height:20h; width:35vh; padding:1vh;">
                                        <label for="Image"> <h6 class="text-dark">Image : <strong class="text-danger">*</strong></h6> (width:500px and height: 500px)</label>
                                        <input type="file" name="image" id="Image">
                                    </fieldset>
                                   
                                
                                </div>
                                <fieldset class="ams-input input-verticle mt-40">
                                    <label for="textbox">Short Description <strong class="text-danger">*</strong></label>
                                    <textarea name="short_des" id="textbox" cols="5" rows="5" value="{{ old('short_des') }}"></textarea>
                                </fieldset>
                                <fieldset class="text-center text-md-end text-lg-end ">
                                    <button type="submit" class="btn btn-block mt-4 submit-btn"><i class="far fa-save"></i> Add Product </button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>