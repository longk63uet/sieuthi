@extends('admin_layout')
@section('content')
	{{-- <section class="wrapper"> --}}
		<!-- //market-->
		<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Lượt xem</h4>
					<h4>{{$totalView}}</h4>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Người dùng</h4>
						<h4>{{$userNumber}}</h4>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-usd"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Doanh thu</h4>
						<h4>{{$totalSale}} VNĐ</h4>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Đơn hàng</h4>
						<h4>{{$totalOrder}}</h4>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>	

				<!-- </div>
			</div>
		</div> -->
		
			<div class="clearfix"> </div>
		<!-- </div> -->
			
				<div class="col-md-12 agile-last-left agile-last-middle">
					<div class="agile-last-grid">
						<div class="area-grids-heading">
							<h3>Báo cáo theo ngày</h3>
						</div>
						<div id="graph"></div>
						
					</div>
				</div>
				
			<!-- </div> -->

			<div>
			<div class="col-md-6 stats-info widget" style="margin-top: 35px; ">
					<div class="area-grids-heading">
						<h3>Đơn hàng</h3>
					</div>
					<div id="donut"></div>
					<script>
						$(document).ready(function () {
							
							getData();
							var chart = Morris.Bar({
							element: 'graph',
							xkey: 'day',
							ykeys: ['total', 'sum'],
							labels: ['Số đơn hàng', 'Doanh thu'],
							xLabelAngle: 10
							});

							function getData(){
								$.ajax({
									type: "get",
									url: "{{url('get-chart-data')}}",
									dataType: "json",
									success: function (response) {
										chart.setData(response);
									}
								});
							};
							function getDonutData(){
									$.ajax({
										type: "get",
										url: "{{url('get-donut-data')}}",
										dataType: "json",
										success: function (response) {
											donut.setData(response);
										}
								});
							};
							getDonutData();
							var donut = Morris.Donut({
								element: 'donut',
								data: [{"value":"","label":""}],
								colors: ['#0b62a4','#A87D8E','#2D619C','#2D619C'],
							});
							
						});
					</script>

				</div>
				<div class="col-md-6 stats-info widget">
					<div class="stats-info-agileits">
						<div class="stats-title">
							<h4 class="title">Sản phẩm bán chạy</h4>
						</div>
						<div class="stats-body">
							<ul class="list-unstyled">
								@foreach ($product as $item)
									
								
								<li>{{$item->product_name}} <span class="pull-right">{{$item->sold}}</span>  
									<div class="progress progress-striped active progress-right">
										<div class="bar green" style="width:{{$item->sold}}%;"></div> 
									</div>
								</li>
								@endforeach
								
							</ul>
						</div>
					</div>
				</div>
			</div>
				
@endsection