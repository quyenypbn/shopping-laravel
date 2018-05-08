	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search " action="extra_search.html" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li class="">
					<a href="{{route('statistical')}}">
					<i class="icon-home"></i>
					<span class="title">Trang chủ</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
				</li>
				<li class=" ">
					<a href="javascript:;">
					<i class="glyphicon glyphicon-list-alt"></i>
					<span class="title">Loại sản phẩm</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{route('type_cate.index')}}">
							<i class="icon-list"></i>
							Danh sách loại sản phẩm</a>
						</li>
						<li>
							<a href="{{route('type_cate.add')}}">
							<i class="icon-plus"></i>
							Thêm loại sản phẩm</a>
						</li>
					</ul>
				</li>
				<li class=" ">
					<a href="javascript:;">
					<i class="glyphicon glyphicon-align-justify"></i>
					<span class="title">Sản phẩm</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{route('cate.index')}}">
							<i class="icon-list"></i>
							Danh sách sản phẩm</a>
						</li>
						<li>
							<a href="{{route('cate.add')}}">
							<i class="icon-plus"></i>
							Thêm sản phẩm</a>
						</li>
					</ul>
				</li>
				<li class="">
					<a href="{{route('order.index')}}">
					<i class="glyphicon glyphicon-shopping-cart"></i>
					<span class="title">Đơn hàng</span>
					<span class="arrow"></span>
					</a>
				</li>
				<li class="">
					<a href="{{route('user.index')}}">
					<i class="glyphicon glyphicon-user"></i>
					<span class="title">Người dùng</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
				</li>
				<li class=" ">
					<a href="javascript:;">
					<i class="glyphicon glyphicon-globe"></i>
					<span class="title">Tin tức</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{route('news.index')}}">
							<i class="icon-list"></i>
							Danh sách tin tức</a>
						</li>
						<li>
							<a href="{{route('news.add')}}">
							<i class="icon-plus"></i>
							Thêm tin tức</a>
						</li>
					</ul>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>