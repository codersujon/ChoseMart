<style>

h3{
    font-weight: 700;
}
h6{
    font-weight: 400;
}


    .hero-section2 {
                position: relative;
                height: 30vh;
               
                background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1509518408633-d42f618a2bdc?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') ;
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
    
            .hero-content2 {
                max-width: 600px;
            }
    
            .hero-title2 {
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
    


<div class="hero-section2 mb-5 ">
    <div class="hero-content2">
        <h3 class="hero-title2 "> About US  </h3>
    </div>
    <i class="fas fa-chevron-down"></i>
</div>



<div class="container mt-5">
    <h3 class="text-muted">About our Mission </h3>
    <h6 class="text-muted">
     {{$data[0]->our_mission}}
    </h6>
</div>
<div class="container mt-5">
    <h3 class="text-muted">About our Vission </h3>
    <h6 class="text-muted">
        {{$data[0]->our_vision}}
    </h6>
</div>

<!-- <div class="container mt-5">
    <h3 class="text-muted">About our Mission </h3>
    <h6 class="text-muted">
        {{$data[0]->our_privacy}}
    </h6>
</div>

<div class="container mt-5">
    <h3 class="text-muted">About our Mission </h3>
    <h6 class="text-muted">
        {{$data[0]->our_policy}}
    </h6>
</div> -->
