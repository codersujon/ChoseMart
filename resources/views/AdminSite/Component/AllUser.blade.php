<div class="ams-panel-wpr">
    <div class="ams-panel">
        <div class="panel-heading">
            <h1 class="panel-title"> <b> All User </b></h1>
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
                <div class="dataTable-filter">
                </div>
            </div>
           

            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile </th>
                    <th>Address</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($users as $user)
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                      
                          <div class="ms-3">
                            <p class=" mb-1 text-muted">{{$user->name}}</p>
                            
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-muted mb-0">{{$user->email}}</p>
                      </td>
                      <td>
                        <p class="text-muted mb-0">{{$user->mobile}}</p>
                      </td>
                      <td>
                        <p class="text-muted mb-0">{{$user->address}}</p>
                      </td>
                      <td>
                        <form action="{{ route('users.destroy', $user) }}" method="POST">
                          @csrf
                          @method('DELETE')
                      
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete User</button>
                      </form>
                      </td>
                    </tr>

                 @endforeach
                 
                 
                </tbody>
              </table>

















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
