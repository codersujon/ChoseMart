            <div class="ams-panel-wpr">
                <div class="ams-panel">
                    <div class="panel-heading">
                        <h1 class="panel-title"> <b>Product List </b></h1>
                        <a href="{{ route('product.create') }}" class="panel-item">+ Add Product</a>
                    </div>
                    <div class="panel-body">
                        <div class="panel-search">
                           
                            <div class="panel-advanced-search">
                                <form action="">
                                    <fieldset class="ams-input input-verticle">
                                        <label for="adds">Address 1</label>
                                        <input type="text" id="adds" placeholder="">
                                    </fieldset>
                                    <fieldset class="ams-input input-verticle">
                                        <label for="email">Payment method</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Any</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                          </select>
                                    </fieldset>
                                    <fieldset class="ams-input input-verticle">
                                        <label for="date">Payment Date</label>
                                        <div class="payment-date">
                                            <input type="text" name="datetimes" id="date"/>
                                            <i class="fas fa-calendar-alt"></i>
                                            <span></span> <i class="fa fa-caret-down"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="ams-input input-verticle">
                                        <label for="email">Tax Exempt Status</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Any</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                          </select>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div class="panel-toolbar">
                            <div class="dataTable-length">
                                <label for="supplierList-length">Show
                                        <select id="supplierList-length">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        </select>
                                    Entries
                                </label>
                            </div>
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
                            <div class="dataTable-filter">
                                <label for="supplier-search" class="visually-hidden"></label>
                                <input type="text" placeholder="Search Here" id="supplier-search" />
                            </div>
                        </div>
                        <div class="dataTable">
                            <table id="supplierList" class="table " style="width: 100%">
                                <thead>
                                    <tr style="width:100% !important;"  >
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Description</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Quantity</th>t
                                        <th>Buying Price</th>
                                        <th>Old Price</th>
                                        <th>New Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if ($data->isEmpty())
                                    <tr>
                                        <td colspan="8">No data available.</td>
                                    </tr>
                                @else

                               
                                    @foreach($data as $product)
                                    
                                    <tr class="2">
                                        <td data-label="SL"><h5> {{$product->id}}</h5></td>
                                        <td data-label="Name">
                                          <img src="{{ asset('public/images/' . $product->image) }}"  alt="{{ $product->name }}" style="height: 150px; width: 150px; border-radius: 10px;"  >
                                        </td>
                                        <td data-label="Business Name"><h2> {{$product->title}} </h2></td>
                                        <td data-label="Mobile">{{$product->short_des}}</td>
                                        <td data-label="Mobile">{{$product->size}}</td>
                                        <td data-label="Mobile">{{$product->color}}</td>
                                        
                                        <td data-label="Supplier Due">{{$product->quantity}}</td>
                                        <td data-label="Total Purchase">{{$product->price}}</td>
                                        <td data-label="Paid Amount">{{$product->old_price}}</td>
                                        <td data-label="Supplier Due">{{$product->discount_price}}</td>
                                        
                                     
                                        <td data-label="Action">
                                           
                                             <a class="btn btn-success" href="{{ route('products.edit', ['id' => $product->id]) }}"> Edit </a>
                                           
                                            <form method="POST" action="{{ route('products.destroy', ['id' => $product->id]) }}" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="text-decoration:none;"  class="text-white btn btn-danger btn-link btn-rounded">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                             @endif    
                             
                                
                                </tbody>
                                <tfoot>
                                    <tr></tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="dataTable-info-wpr">
                            <div class="dataTable-info" id="supplierList-info">
                                Showing 1 to 10 of 10 entries
                            </div>
                            <div class="dataTable-pagination" id="supplierList-pagination">
                                <ul class="pagination">
                                    <li><a href="#" class="page-number prev">Previous</a></li>
                                    <li><a href="#" class="page-number active">1</a></li>
                                    <li><a href="#" class="page-number next">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
