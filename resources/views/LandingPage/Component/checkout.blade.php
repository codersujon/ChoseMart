<style>
    .hero-section {
        position: relative;
        height: 20vh;

        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y2xvdGhpbmclMjBzdG9yZXxlbnwwfHwwfHx8MA%3D%3D');
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
        font-size: 5vh;
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

</style>
<div class="hero-section mb-5 ">
    <div class="hero-content">
        <h1 class="hero-title"> Cart And Checkout </h1>
    </div>
    <i class="fas fa-chevron-down"></i>
</div>

<div class="col-lg-10 m-auto offset-lg mt-5  ">
    <h3 class="text-star mb-2  mt-5">Cart And Checkout </h3>
    <div class="row  mt-5 flex-sm-col-reverse">
        <div class="col-md-5 mb-3">

            <div class="mb-5">

                {{-- <form action="{{ route('placeOrder') }}" method="POST" class="bg-white p-4 rounded"> --}}
                <form method="POST" class="bg-white p-4 rounded" id="OrderForm">
                    @csrf
                    {{-- Name --}}
                    <div class="form-group mt-3">
                        <label for="name"> Name </label>
                        <br>
                        <input class="form-control" type="text" name="name" id="name" placeholder="আপনার নাম" required>
                        
                        <div class="alert-danger">
                            <span class="text-center mt-2" id="name_error" style="padding: 10px 0"></span>
                        </div>
                    
                    </div>
                    {{-- Mobile --}}
                    <div class="form-group mt-3">
                        <label for="name"> Mobile </label>
                        <br>
                        <input class="form-control" type="text" name="mobile" id="mobile"
                            placeholder="আপনার মোবাইল নাম্বার লিখুন" required>
                        
                        <div class="alert-danger">
                            <span class="text-center mt-2" id="mobile_error" style="padding: 10px 0"></span>
                        </div>
                    </div>
                    {{-- Location --}}
                    <div class="form-group mt-3">
                        <label for="location">Location</label>
                        <br>
                        <select class="form-control" name="location" id="location" onchange="getShippingCharge()"
                            required>
                            <option value="" selected>লোকেশন সিলেক্ট করুন</option>
                            @php
                            $ShippingCharge= App\Models\ShippingCharge::get();
                            @endphp
                            @foreach($ShippingCharge as $item)
                            <option value="{{$item->location}}">{{$item->location}} : {{$item->price}}</option>
                            @endforeach
                        </select>
                        <div class="alert-danger">
                            <span class="text-center mt-2" id="location_error" style="padding: 10px 0"></span>
                        </div>
                    </div>
                    {{-- Address --}}
                    <div class="form-group mt-3">
                        <label for="address"> Address </label>
                        <br>
                        <textarea class="form-control" id="address" name="address"
                            placeholder="রোড নাম্বার, বাসা নাম্বার সহ সম্পূর্ণ পিক-আপ পয়েন্টের ঠিকানা লিখুন!" rows="3" required></textarea>
                        <div class="alert-danger">
                            <span class="text-center mt-2" id="address_error" style="padding: 10px 0"></span>
                        </div>
                    </div>

                    <button type="button" class=" mt-2 btn btn-primary btn-block" id="orderBtn"><strong>অর্ডার কনর্ফাম করুন</strong></button>
                </form>
            </div>
        </div>

        <div class="table-responsive-sm col-sm-12 col-md-7 col-lg-7 ">
            <table class="table table-lg table-md table-bordered table-striped bg-white">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th scope="col"> Product </th>
                        <th scope="col"> Price </th>
                        <th scope="col"> Size </th>
                        <th scope="col"> Colour </th>
                        <th scope="col"> Quantity </th>
                        <th scope="col"> Total </th>
                        <th scope="col"> Action </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data as $data)


                    <tr>
                        <th scope="row" class="text-center"><img
                                src="{{ asset('public/images/' . $data->product->image) }}" alt=""
                                class="img-responsive img-thumbnail" style="width: 14vh; height: 12vh;"></th>
                        <td class="text-center">৳{{$data->price }}</td>
                        <td class="text-center">{{$data->size}}</td>
                        <td class="text-center">{{$data->color}}</td>
                        <td class="text-center">
                            <p class="text-center">{{ $data->qty }}</p>
                        </td>

                        <td class="text-center">{{$data->price * $data->qty}} </td>
                        <td class="text-center">

                            <form method="POST" action="{{ route('delete.item') }}">
                                @csrf
                                @method('DELETE')

                                <input type="hidden" name="user_token" value="{{ Session::get('user_token') }}">
                                <input type="hidden" name="color" value="{{ $data->color }}">
                                <input type="hidden" name="size" value="{{ $data->size }}">

                                <button class="btn btn-danger" type="submit"><i
                                        class="fa-solid fa-trash-can"></i></button>
                            </form>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">Sub Total</td>
                        <td>{{ $totalAmount }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Shipping Charge :

                        </td>
                        <td colspan="4">

                            @foreach($ShippingCharge as $item)
                            <option value="{{$item->location}}">{{$item->location}}</option>

                            @endforeach
                        </td>
                        <td>
                            @foreach($ShippingCharge as $item)
                            <option value="{{$item->price}}"> {{$item->price}}</option>

                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="fw-bold"><strong>Total Amount</strong></td>
                        <td class="fw-bold"><strong>{{ $totalAmount  }} + <small> Shipping charge </strong></small></td>
                    </tr>
                    <tr>

                    </tr>
                </tfoot>
            </table>
        </div>

    </div>


</div>

<div class="col-lg-10 m-auto offset-lg mt-5 mt-5">
    <h2 class="mb-5 mt-5 ">Related Products</h2>
    <div class="row">
        <!-- Product 1 -->
        @php
        $relatedProducts = App\Models\Product::latest()->take(3)->get();
        @endphp

        @foreach($relatedProducts as $item)
        <div class="col-md-4">
            <div class="card mt-2 text-center">
                <a href="{{ route('product.show', ['id' => $item->id]) }}">
                    <img src="{{ asset('public/images/' . $item->image) }}" class="card-img-top" alt="..."
                        height="400vh" width="35vh">
                </a>
                <div class="card-body">
                    <h5 class="card-title">{{$item->title}}</h5>
                    <p class="card-text">{{$item->short_des}}</p>
                    <h5>৳{{$item->discount_price}}</h5>
                    <a href="{{ route('product.show', ['id' => $item->id]) }}">
                        <button class="btn btn-outline-danger buy-now-button" style="font-size: 2vh; font-weight:600; font-family:popins;">
                            অর্ডার করুন <i class="fas fa-arrow-circle-right"></i></button>
                    </a>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>


<!--------- Order Confirm OTP Modal ----->
<div class="modal fade shadow mt-3" id="reg_otp-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content m-auto" id="" style="width: 95%">
            <div class="modal-header">
                <p class="modal-title" id="">অর্ডার কনর্ফামেশন ফরম</p>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body m-0">
                <!-- alert start-->
                <div class="alert-success">
                    <span class="text-center mt-2" id="reg_code_sent" style="padding: 10px 0"></span>
                </div>
                <div class="alert-success">
                    <span class="text-center mt-2" id="reg_successful" style="padding: 10px 0"></span>
                </div>
                <div class="alert-warning">
                    <span class="text-center mt-2" id="reg_code_invalid" style="padding: 10px 0"></span>
                </div>
                <div class="alert-warning">
                    <span class="text-center mt-2" id="reg_verification-error" style="padding: 10px 0"></span>
                </div>
                <!-- alert end-->

                <form method="POST" id="reg_code">
                    <label for="code"></label>
                    <input type="text" class="mb-2 form-control" name="code" id="code" placeholder="ভেরিফিকেশন কোডটি লিখুন"
                        autocomplete="off">

                    <button type="button" id="reg_resend" class="btn btn-sm btn-primary mt-2" disabled>Resend code
                        <br> <span class="text-warning reg_timer"></span> </button>
                </form>

            </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Close</button>
                 <button type="button" id="reg_verify" class="btn btn-sm btn-success">Confirm Order</button>
            </div>
        </div>
    </div>
</div>


<script>
    function submitOrder() {
        // Get CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Get values from form elements
        const name = document.getElementById('name').value;
        const mobile = document.getElementById('mobile').value;
        const email = document.getElementById('email').value;
        const location = document.getElementById('location').value;
        const address = document.getElementById('address').value;

        // Prepare data object
        const data = {
            _token: csrfToken,
            name: name,
            mobile: mobile,
            email: email,
            location: location,
            address: address,
        };
        console.log(data[0]);
        alert(data)
        // Send a POST request to the server

    }

</script>
<script>
    $(document).ready(function () {
        var form = $("#quantityForm");
        var quantityInput = $("#quantity");

        $("#decrementBtn").click(function () {
            updateQuantity(-1);
        });

        $("#incrementBtn").click(function () {
            updateQuantity(1);
        });

        function updateQuantity(change) {
            var currentValue = parseInt(quantityInput.val());
            var newValue = currentValue + change;

            // Ensure the quantity is not negative
            if (newValue >= 0) {
                quantityInput.val(newValue);

                // Submit the form to update quantity on the server
                form.submit();
            }
        }
    });
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script>
 $(document).ready(function(){

    var resend = null;
    var timeout =  null;

    // AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // SEND OTP TO THE CUSTOMER
    $(document).on("click", "#orderBtn", function(event){
        event.preventDefault();

        $.ajax({
            url: "/placeOrder",
            type: "POST",
            data: $('#OrderForm').serialize(),
            dataType: "JSON",
            success: function(response){

                if(response.response.code_sent){
                    $('#reg_code_sent').text(response.response.code_sent);
                    $('#reg_code_invalid').text(null);
                }else{
                    $('#reg_code_sent').text(null);
                }

                clearInterval(resend);
                clearTimeout(timeout);

                $('#reg_verify').show();
                $('#reg_resend').show();
                $('#reg_otp-modal').modal({  backdrop: 'static'});
                $('#reg_otp-modal').modal('show');

                $('#reg_resend').prop("disabled",true);
                var i = 60;
                resend = setInterval(function() {
                    $('.reg_timer').text(`in ${--i} sec`)
                },1000);
                // enable resend btn
                timeout = setTimeout(function(){ $('#reg_resend').prop("disabled",false);
                    clearInterval(resend);
                    $('.reg_timer').text(null);
                    $('#sending_error').text(null);
                    $('#sending_error').parent().hide();
                }, 60000);
            },
            error: function(error){
                
                if(error.responseJSON.message == "CSRF token mismatch."){
                    // refresh csrf token
                    $.ajax({
                            url: '/csrf-token',
                            type:'GET',
                        }).done(function (response) {
                            $('#token').val(response.token).trigger('change');
                            console.log( $('#token').val())
                            $('#orderBtn').trigger('click');             
                        }).fail(function (error){
                            window.location.reload();                   
                    }); 
                }
                
                // Validation Error For Name
                if( error.responseJSON.error.name && error.responseJSON.error.name.length > 0){
                    $('#name').addClass('is-invalid');
                    $('#name').css({ 'margin-bottom' : '0' });
                    $('#name_error').text(error.responseJSON.error.name['0']);
                    $('#name_error').show();
                }
                else {
                    $('#name').removeClass('is-invalid');
                    $('#name_error').text(null);
                    $('#name_error').hide();
                }
                
                // Validation Error For Mobile
                if( error.responseJSON.error.mobile && error.responseJSON.error.mobile.length > 0){
                    $('#mobile').addClass('is-invalid');
                    $('#mobile').css({ 'margin-bottom' : '0' });
                    $('#mobile_error').text(error.responseJSON.error.mobile['0']);
                    $('#mobile_error').show();
                }
                else {
                    $('#mobile').removeClass('is-invalid');
                    $('#mobile_error').text(null);
                    $('#mobile_error').hide();
                }
                
                // Validation Error For Location
                if( error.responseJSON.error.location && error.responseJSON.error.location.length > 0){
                    $('#location').addClass('is-invalid');
                    $('#location').css({ 'margin-bottom' : '0' });
                    $('#location_error').text(error.responseJSON.error.location['0']);
                    $('#location_error').show();
                }
                else {
                    $('#location').removeClass('is-invalid');
                    $('#location_error').text(null);
                    $('#location_error').hide();
                }
                
                // Validation Error For Address
                if( error.responseJSON.error.address && error.responseJSON.error.address.length > 0){
                    $('#address').addClass('is-invalid');
                    $('#address').css({ 'margin-bottom' : '0' });
                    $('#address_error').text(error.responseJSON.error.address['0']);
                    $('#address_error').show();
                }
                else {
                    $('#address').removeClass('is-invalid');
                    $('#address_error').text(null);
                    $('#address_error').hide();
                }
                
                // verification code sending error
                if(error.responseJSON.error.sending_error){
                    $('#sending_error').text(error.responseJSON.error.sending_error);
                    $('#sending_error').parent().show();
                }
                else{
                    $('#sending_error').text(null);
                    $('#sending_error').parent().hide();
                }
    
                // frequent request error
                if(error.responseJSON.error.frequent_req){
                    $('#sending_error').text("Try another request ");
                    $('#sending_error').parent().show();
                }
                else{
                    $('#sending_error').text(null);
                    $('#sending_error').parent().hide();
                }
            }
        });

    });

    // VERIFY OTP
    $(document).on("click","#reg_verify", function(){
        var otpCode = $("#code").val();
        $.ajax({
            url: "mobile_verification",
            type:'POST',
            dataType : "JSON",
            data:{
                code: otpCode
            },
            success: function(response){
                if(response.response.reg_successful){
                    // If Number verification done
                    $('#reg_successful').text(response.response.reg_successful);
                    $('#reg_otp-modal').modal('hide');
                }

                if(response.response.data){
                    window.location.assign("https://martexbangladesh.com/order-confirm");
                }

            },
            error: function(error){

                if(error.responseJSON.message == "CSRF token mismatch."){
                    // refresh csrf token
                    $.ajax({
                        url: '/csrf-token',
                        type:'GET',
                    }).done(function (response) {
                        $('#token').val(response.token).trigger('change');
                        console.log( $('#token').val())
                        $('#reg_verify').trigger('click');             
                    }).fail(function (error){
                        window.location.reload();                   
                    });              
                }
                
                // if code invalid
                if(error.responseJSON.error.code_invalid){
                    $('#reg_code_invalid').text(error.responseJSON.error.code_invalid);
                    $('#reg_code_sent').text(null);
                }else {
                    $('#reg_code_invalid').text(null);
                }
                // registration error
                if(error.responseJSON.error.reg_error){
                    $('#sending_error').text(error.responseJSON.error.reg_error);
                    $('#sending_error').parent().show();
                    // $('#reg_successful').text(null);
                    // $('#reg_successful').parent().hide();
                    $('#otp-modal').modal('hide');
                }
            }
        });
    });
    
    // RESEND CODE
    $('#reg_resend').on('click', function (e) {
        e.preventDefault();
        // submit reg form using submit button
        $('#orderBtn').trigger('click');
    });

});   
</script>
