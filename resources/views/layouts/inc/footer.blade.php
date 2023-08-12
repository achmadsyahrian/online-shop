<footer class="footer">
	<div class="footer-area">
		<div class="container">
			<div class="row section_gap">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-footer-widget tp_widgets">
						<h4 class="footer_title large_title">Our Mission</h4>
						<p>
							Kami berkomitmen untuk
							menyediakan produk berkualitas dan layanan pelanggan yang terbaik.
						</p>
						<p>
							Dengan platform ini, kami bertujuan untuk menjadikan proses belanja online lebih mudah,
							menyenangkan, dan memuaskan bagi pelanggan kami.
						</p>
					</div>
				</div>
				<div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget tp_widgets">
						<h4 class="footer_title">Quick Links</h4>
						<ul class="list">
							<li><a href="/">Home</a></li>
							<li><a href="/shop">Shop</a></li>
							<li><a href="/cart">Shopping Cart</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget instafeed">
						<h4 class="footer_title">Gallery</h4>
						<ul class="list instafeed d-flex flex-wrap">
							@foreach ($products->take(6) as $product)
							<li><img src="{{ asset('storage/'. $product->photo_1) }}" style="height:75px; object-fit:cover;"
									width="75" alt=""></li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
					<div class="single-footer-widget tp_widgets">
						<h4 class="footer_title">Contact Us</h4>
						<div class="ml-40">
							<p class="sm-head">
								<span class="fa fa-location-arrow"></span>
								Head Office
							</p>
							<p>123, Main Street, Your City</p>

							<p class="sm-head">
								<span class="fa fa-phone"></span>
								Phone Number
							</p>
							<p>
								+123 456 7890 <br>
								+123 456 7890
							</p>

							<p class="sm-head">
								<span class="fa fa-envelope"></span>
								Email
							</p>
							<p>
								free@infoexample.com <br>
								www.infoexample.com
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-bottom">
		<div class="container">
			<div class="row d-flex">
				<p class="col-lg-12 footer-text text-center">
					Created with &hearts; by Quality Parfume &copy; 2023.</p>
			</div>
		</div>
	</div>
</footer>
