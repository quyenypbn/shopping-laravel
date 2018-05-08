<div id="danh-muc-trai">
						<div class="category">
						<div class="title-category">
							<h4>DANH MỤC SẢN PHẨM</h4>
						</div>
						<div class="content-category">
							<ul class="relative">
								@foreach($loai as $l)
									<li class=""> <a href="{{route('loai-san-pham',$l->id)}}" title="">{{$l->name}}</a>
										<!-- <ul class="sub-menu absolute">
											<li><a href="#" title="">Sản phẩm 1.1</a></li>
											<li><a href="#" title="">Sản phẩm 1.2</a></li>
											<li><a href="#" title="">Sản phẩm 1.3</a></li>
										</ul> -->
									</li>
								@endforeach
								<!-- <li class="relative menu-item-has-children"> <a href="#" title="">Danh mục 2</a>
									<ul class="sub-menu absolute">
										<li><a href="#" title="">Sản phẩm 2.1</a></li>
										<li><a href="#" title="">Sản phẩm 2.2</a></li>
										<li><a href="#" title="">Sản phẩm 2.3</a></li>
									</ul>
								</li>
								<li> <a href="#" title="">Danh mục 3</a></li>
								<li> <a href="#" title="">Danh mục 4</a></li>
								<li> <a href="#" title="">Danh mục 5</a></li>
								<li class="relative menu-item-has-children"> <a href="#" title="">Danh mục 6</a>
									<ul class="sub-menu absolute">
										<li><a href="#" title="">Sản phẩm 6.1</a></li>
										<li><a href="#" title="">Sản phẩm 6.2</a></li>
										<li><a href="#" title="">Sản phẩm 6.3</a></li>
									</ul>
								</li>
							</ul> -->
						</div>
						</div>
				
						
						<div class="online">
							<div class="title-category">
								<h4>HỘ TRỢ TRỰC TUYẾN</h4>
							</div>

							<div class="content-online">
								<ul>
									<li>132 Nguyễn Chí Thanh: 0123456789</li>
									<li>13 Nguyễn Thánh Chi: 0123654789</li>
									<li>12 Thãnh Chí Nguyên: 0123698547</li>
								</ul>
							</div>
						</div>
						<div class="facebook">
							<div class="title-category">
								<h4>FACEBOOK</h4>
							</div>
							<div class="content-fb">
								<br>
							</div>
						</div>
						<div class="youtube">
							<div class="title-category">
								<h4>YOUTUBE</h4>
							</div>
							<div class="content-youtube">
								<br>
							</div>
						</div>
						<div class="so-luong-truy-cap">
							<div class="title-category">
								<h4>SỐ LƯỢNG TRUY CẬP</h4>
							</div>
							<div class="content-sl-truy-cap">
								<br>
							</div>
						</div>
					</div>