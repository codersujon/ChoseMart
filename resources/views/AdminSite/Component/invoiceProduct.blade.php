<div class="ams-panel-wpr mt-5 table-responsive">
    <div class="panel-heading">
            <h1 class="panel-title"> <b> Customer Information </b></h1>
    </div>
    <table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th> invoice number </th>
      <th> Name</th>
      <th> Email</th>
      <th> mobile</th>
      <th> Addres</th>
      <th> Location</th>
      <th> Sub Total </th>
      <th> Shipping cost </th>
      <th> Total</th>
    </tr>
  </thead>
  <tbody>
      
    <tr>
        <td>  <p class="fw-normal mb-1"> {{$invoice->invoice_number}} </p></td>
        <td>
            <p class="fw-normal mb-1"> {{$invoice->name}} </p>
        </td>
        <td>  <p class="fw-normal mb-1"> {{$invoice->email}} </p> </td>
        <td>  <p class="fw-normal mb-1"> {{$invoice->mobile}} </p> </td>
        <td>  <p class="fw-normal mb-1"> {{$invoice->address}} </p> </td>
        <td>  <p class="fw-normal mb-1"> {{$invoice->location}} </p> </td>
        <td>  <p class="fw-normal mb-1"> {{$invoice->total_price}} </p> </td>
         <td>  
        @if($invoice->location=="insideDhaka")
           <p class="fw-normal mb-1"> 70 Tk </p> 
        @else
           <p class="fw-normal mb-1"> 130 TK  </p>
        @endif
        </td>
        <td>  
        @if($invoice->location=="insideDhaka")
           <p class="fw-normal mb-1"> {{$invoice->total_price + 70 }} Tk </p> 
        @else
           <p class="fw-normal mb-1"> {{$invoice->total_price + 130 }} TK  </p>
        @endif
        </td>
        
    </tr>    
       
   
 
  </tbody>
</table>
</div>








<div class="ams-panel-wpr mt-5">
    <div class="ams-panel">
        <div class="panel-heading">
            <h1 class="panel-title"> <b> Invoice Product</b></h1>
         </div>
        <div class="panel-body">
           
            <div class="panel-toolbar">
                <div class="dataTable-length">
                    <label for="supplierList-length">Show
                            <select id="supplierList-length">
                            <option value="10">10</option>
                            <option value="25">25</option>
                           
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
              
            </div>
            <div class="dataTable table-responsive">
                <table class="table align-middle mb-0 bg-white">
                    <thead class="bg-light">
                      <tr>
            
                        <th> Title  </th>
                        <th> Code</th>
                        <th> Quantity </th>
                        <th> Total Price  </th>
                        <th> Size </th>
                        <th> color </th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($invoiceProduct as $item)
                        <tr>
                
                            <td>  <p class="fw-normal mb-1"> {{$item->product->title}} </p> </td>
                            <td>  <p class="fw-normal mb-1"> {{$item->product->product_code}} </p></td>
                            <td>
                                <p class="fw-normal mb-1"> {{$item->qty}} </p>
                            </td>
                           <td>  <p class="fw-normal mb-1"> {{$item->total_price}} </p> </td>
                            <td>  <p class="fw-normal mb-1"> {{$item->size}} </p> </td>
                            <td>  <p class="fw-normal mb-1"> {{$item->color}} </p> </td>
                        </tr>    
                        @endforeach
                  
                    </tbody>
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
