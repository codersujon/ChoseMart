<div class="ams-panel-wpr">
    <div class="ams-panel">
        <div class="panel-heading">
            <h1 class="panel-title"> <b>Return  Order  List </b></h1>
         </div>
        <div class="panel-body">
            
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
          
            </div>
            <div class="dataTable">
                <table class="table align-middle mb-0 bg-white">
                    <thead class="bg-light">
                      <tr>
                        <th> SL </th>
                        <th> Name </th>
                        <th> Email </th>
                        <th> Mobile </th>
                        <th> Address </th>
                        <th> Location </th>
                        
                        <th> Total Price </th>
                        <th> Status </th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $invoice)
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            {{$invoice->id}}
                          </div>
                        </td>
                        <td>
                          <p class="fw-normal mb-1">{{$invoice->name}}</p>
                        </td>
                         <td>
                            <p class="fw-normal mb-1">{{$invoice->email}}</p>
                          </td>
                          <td>
                            <p class="fw-normal mb-1">{{$invoice->mobile}}</p>
                          </td>
                          <td>
                            <p class="fw-normal mb-1">{{$invoice->address}}</p>
                          </td>
                          <td>
                            <p class="fw-normal mb-1">{{$invoice->location}}</p>
                          </td>
                          <td>
                            <p class="fw-normal mb-1">{{$invoice->total_price}}</p>
                          </td>

                        <td>
                          <span class="badge badge-success rounded-pill d-inline">{{$invoice->status}}</span>
                        </td>
                      
                        <td>
                            
                           
                            <a class="btn btn-success " href="{{ route('invoiceProduct', ['id' => $invoice->id]) }}">View </a>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$invoice->id + 1}}">
                                    Edit
                                 </button>
                                 
                                 <!-- Modal -->
                                 <div class="modal fade" id="exampleModal{{$invoice->id + 1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                     <div class="modal-dialog" role="document">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLabel">Edit Status  </h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                         </button>
                                         </div>
                                         <div class="modal-body">
                                            <div class="p-4">
                                                <form method="POST" action="{{ route('invoices.update-status', $invoice->id) }}" class="mb-3">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="statusSelect">Update Status:</label>
                                                        <select class="form-control" id="statusSelect" name="status">
                                                          <option value="pending" {{ $invoice->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                          <option value="proccessing" {{ $invoice->status === 'proccessing' ? 'selected' : '' }}>Processing</option>
                                                          <option value="delivary" {{ $invoice->status === 'delivary' ? 'selected' : '' }}>Delivery</option>
                                                          <option value="completed" {{ $invoice->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                                          <option value="cancelled" {{ $invoice->status === 'cancelled' ? 'selected' : '' }}>cancelled</option>
                                                          <option value="return" {{ $invoice->status === 'return' ? 'selected' : '' }}>Return</option>
                                                          <!-- Add more status options as needed -->
                                                      </select>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                                                    </div>
                                                </form>
                                                
                                            </div>
                                         </div>
                                         <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          </div>
                                     </div>
                                     </div>
                                 </div>
                         </td>
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
