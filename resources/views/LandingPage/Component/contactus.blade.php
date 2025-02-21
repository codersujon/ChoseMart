
<style>




.hero-section1 {
            position: relative;
            height: 30vh;
           
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1559526324-4b87b5e36e44?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') ;
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

        .hero-content1 {
            max-width: 600px;
        }

        .hero-title1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }

        .hero-description1 {
            font-size: 1.25rem;
            margin-bottom: 30px;
            letter-spacing: 0.5px;
        }

        .hero-button1 {
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








            <div class="hero-section1 mb-5 ">
                <div class="hero-content">
                    <h1 class="hero-title"> Contact US  </h1>
                </div>
                <i class="fas fa-chevron-down"></i>
            </div>
           <div class="container">
                @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

           </div>

<div class="container mt-5">
    <div class="row mt-5 ">
        <div class="col-md-6">
            <h3 class="mb-3">Get Touch With US </h3>
           
            <form action="{{ route('contact') }}" method="post" class="bg-white p-4">
                @csrf

                <!-- Name input -->
                <div class="form-outline mb-4">
                    <input type="text" name="name" id="form4Example1" class="form-control" />
                    <label class="form-label" for="form4Example1">Name</label>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" name="email" id="form4Example2" class="form-control" />
                    <label class="form-label" for="form4Example2">Email address</label>
                </div>
                <div class="form-outline mb-4">
                    <input type="mobile" name="mobile" id="form4Example2" class="form-control" />
                    <label class="form-label" for="form4Example2">Mobile</label>
                </div>

                <!-- Message input -->
                <div class="form-outline mb-4">
                    <textarea name="message" class="form-control" id="form4Example3" rows="4"></textarea>
                    <label class="form-label" for="form4Example3">Message</label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block">Send</button>
            </form>
        </div>
        <div class="col-md-6 mt-3">
            <h2 class="mb-3">Contact Information </h2>
            <p> Mobile : {{$data[0]->mobile}} </p>
            <p> Address :{{$data[0]->address}}  </p>
           <div>
            <p>Location</p>
            {!! $data[0]->office_location !!}
        
            </div>
        </div>
    </div>
</div>

