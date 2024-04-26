@extends('layouts.user')

@section('content')
    
 
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Check Out Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->
	<div class="checkout-section mt-150 mb-150">
		<form action="{{Route('OrderPlace')}}" method="POST" enctype="multipart/form-data"> 
			@csrf
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						
						<div class="checkout-accordion-wrap">
							<div class="accordion" id="accordionExample">
							<div class="card single-accordion">
								<div class="card-header" id="headingOne">
									<h5 class="mb-0">
										<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Billing Address
										</button>
									</h5>
								</div>

								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body">
									
									<div class="billing-address-form">
												<input type="hidden" name="id" value="{{$user->id}}">
											<div class="mb-3">
												
												<input type="text" class="form-control   @error('name') is-invalid @enderror" placeholder="name" value="{{ $user->name}}"  id="name" name="name" >
												
											</div>
											<div class="mb-3">
												
												<input type="email" class=" form-control  @error('email') is-invalid @enderror" placeholder="Email"  value="{{ $user->email}}" id="Email"  name="Email">
												
												
											</div>
											<div class="mb-3">
												<input type="text"   class="form-control  " id="address" name="address" placeholder="Address">
												
												
											</div>
											<div class="mb-3">
												<input type="text"   class="form-control  " id="phone" name="phone" value="{{$user->phone_number}}" placeholder="Phone">
												
												
											</div>
											<div class="mb-3">
												<select class="form-select" name="city" id="city">
													<option value="amman">Amman</option>
													<option value="alzraqa">Alzraqa</option>
													<option value="aqaba">Aqaba</option>
													
												</select>
											</div>
											
											{{-- <div class="mb-3">
												<textarea name="bill" class="form-control  " id="bill" cols="30" rows="10" placeholder="Say Something"></textarea>
												
											</div> --}}
											
											
					
										   
											
											
											
											
										
									</div>
									
								</div>
								</div>
							</div>
							<div class="card single-accordion">
								<div class="card-header" id="headingTwo">
								<h5 class="mb-0">
									<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									Shipping Address
									</button>
								</h5>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
								<div class="card-body">
									<div class="shipping-address-form">
										<p>Your shipping address form is here.</p>
									</div>
								</div>
								</div>
							</div>
							<div class="card single-accordion">
								<div class="card-header" id="headingThree">
								<h5 class="mb-0">
									<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									Card Details
									</button>
								</h5>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
								<div class="card-body">
									<div class="card-details">
										<p>Your card details goes here.</p>
									</div>
								</div>
								</div>
							</div>
							</div>

						</div>
					</div>

					<div class="col-lg-4">
						<div class="order-details-wrap">
							<table class="order-details">
								<thead>
									<tr>
										<th>Your order Details</th>
										<th>Price</th>
									</tr>
								</thead>
								<tbody class="order-details-body">
									<tr>
										<td>Product</td>
										<td>Total</td>
									</tr>
									
									@foreach($cartitems as $cartitem)
										<tr class="table-body-row">
											<td class="product-name">{{$cartitem->product->name}}</td>
											<td class="product-price">{{$cartitem->subtotal}} jd</td>
										</tr>
									@endforeach
								</tbody>
								<tbody class="checkout-details">
									<tr>
										<td>Subtotal</td>
										<td id="total_data">{{$totalSubtotal}}  jd</td>
									</tr>
									<tr class="total-data">
										<td>Shipping </td>
										<td id="shop">2 jd</td>
									</tr>
									<tr>
										<td>Total</td>
										<td id="Total"></td>
									</tr>
								</tbody>
							</table>
							<button type="submit" class="boxed-btn">Place Order</button>
							<button type="submit" class="boxed-btn"> <a href="{{Route('test')}}">test</a>  </button>
							{{-- <a href="#" class="boxed-btn">Place Order</a> --}}
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" name="totalSubtotal" value="{{$totalSubtotal}}">
		</form>
	</div>
	<!-- end check out section -->

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
			function calculateTotal() {
            // Get the elements by their IDs
            var subtotalElement = document.getElementById("total_data");
            var shippingElement = document.getElementById("shop");
            var totalElement = document.getElementById("Total");

            // Extract numerical values from the elements
            var subtotal = parseFloat(subtotalElement.innerText);
            var shipping = parseFloat(shippingElement.innerText);

            // Calculate the total
            var total = subtotal + shipping;

            // Display the total in the Total element
            totalElement.textContent = total + " jd";
        }

			// Attach the calculateTotal function to the window's onload event
			window.onload = calculateTotal;
			
				
			// Attach the onPageLoad function to the window's onload event
			window.onload = onPageLoad; 
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