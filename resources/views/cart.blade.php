@extends('layouts.user')

@section('content')
    
 
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Cart</h1>
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

	

	

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									{{-- <th class="product-quantity">Quantity</th> --}}
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
								<form action="" method="post" enctype="multipart/form-data">
									@foreach($cartitems as $cartitem)
										<tr class="table-body-row">
											
											<input type="hidden" name="id{{$cartitem->id}}" value="{{$cartitem->id}}">
											<input type="hidden" name="price{{$cartitem->id}}" value="{{$cartitem->product->price}}">
											<td class="product-remove"><a href="{{Route('CartItem.delete',['id' => $cartitem->id])}}"><i class="far fa-window-close"></i></a></td>
											<td class="product-image"><img src="{{asset('images')}}/{{$cartitem->product->image}}" {{-- style="max-width:352px; max-hieght:352px" --}} alt="{{$cartitem->product->name}}"></td>
											<td class="product-name">{{$cartitem->product->name}}</td>
											<td class="product-price">{{$cartitem->product->price}} jd</td>
											{{-- <td class="product-quantity"><input type="number" name="quantity{{$cartitem->id}}" placeholder="1"></td> --}}
											<td class="product-total">{{$cartitem->subtotal}}</td>
										</tr>
										
									@endforeach
								</form>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td id="total_data">{{$totalSubtotal}} jd</td>
								</tr>
								<tr class="total-data">
									<td><strong>Shipping: </strong></td>
									<td id="shop">2 jd</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td id="Total"></td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="{{Route('Cart')}}" class="boxed-btn">Update Cart</a>
							<a href="{{Route('Checkout')}}" class="boxed-btn black">Check Out</a>
						</div>
					</div>

					<div class="coupon-section">
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<form action="index.html">
								<p><input type="text" placeholder="Coupon"></p>
								<p><input type="submit" value="Apply"></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->

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
