
	<!-- <?php 
		// require_once('header.php');
	 ?> -->
	@include('sub.client.header')
	<!-- content -->
	@yield('content')
	@include('sub.client.footer')
<!-- 	 <?php 
	 	// require_once('footer.php')
	 ?>
 -->
 	@yield('js')

 	@yield('script-add-cart')