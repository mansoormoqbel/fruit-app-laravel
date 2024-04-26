@extends('layouts.user')

@section('content')
    
  <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Shop</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	<div id="session-message">
		@if (session('error'))
			<div class="alert alert-danger">
				{{session('error') }}
			</div>

		@endif
		@if (session('success'))
			<div class="alert alert-success">
				{{session('success') }}
			</div>

		@endif
	</div>

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">

			<div class="row product-lists">
				@foreach($products as $product)
						
							<div class="col-lg-4 col-md-6 text-center"  style="max-hieght:519.67px" >
								<div class="single-product-item">
									<div class="product-image">
										<a href="single-product.html"><img src="{{asset('images')}}/{{$product->image}}" style="max-width:352px; max-hieght:352px" alt="{{$product->name}}"></a>
										
									</div>
									<h3>{{$product->name}}</h3>
									
									<p class="product-price"><span>Per Kg</span> {{$product->price}} JD</p>
									<form action="{{Route('addItem')}}" method="post">
										@csrf
										<input type="hidden" name="product" value="{{$product->id}}">
										<input type="hidden" name="price" value="{{$product->price}}">
										<div class="product-quantity">
											<input type="number"  name="quantity1" placeholder="1" required >
										</div>
										
										<button type="submit" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
										
									</form>
									{{-- <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a> --}}
								</div>
							</div>
						
						
				@endforeach
			
				{{-- {{ $products->links() }} --}}
			</div>
			
			{{-- <div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						{{ $products->links() }}
					</div>
				</div>
			</div> --}}
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<li><a href="#">Prev</a></li>
							<li><a href="#">1</a></li>
							<li><a class="active" href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end products -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

	

	@section('script')
        {{-- jquery  --}}
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    
       
        <script>
            
            // Function to hide the session message
            function hideSessionMessage() {
                var sessionMessage = document.getElementById('session-message');
                if (sessionMessage) {
                    sessionMessage.style.display = 'none';
                }
            }

            // Hide the session message after 1 minute (60000 milliseconds)
            setTimeout(hideSessionMessage, 5000);
        </script>
          
    @endsection

	

	

	


   
@endsection
