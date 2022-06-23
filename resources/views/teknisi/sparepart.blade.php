<!DOCTYPE html>
<html lang="en" class="h-100">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Tambah Sparepart</title>
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/chartist/css/chartist.min.css')}}">
    <link href="{{asset('assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="{{asset('assets/vendor/pickadate/themes/default.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/pickadate/themes/default.date.css')}}">
	<link href="{{asset('assets/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
    
    <body class="h-100">
        <!--*******************
              Preloader start
          ********************-->
          <div id="preloader" style="z-index: -1; position:relative;">
              <div class="sk-three-bounce">
                  <div class="sk-child sk-bounce1"></div>
                  <div class="sk-child sk-bounce2"></div>
                  <div class="sk-child sk-bounce3"></div>
              </div>
          </div>
          <!--*******************
          Preloader end
          ********************-->

          
        <!--**********************************
            Content body start
        ***********************************-->
            <div class="container-fluid">
                <div class="row">
					<div class="col-lg-12">
                        <div class="card mt-4">
                            <div class="card-header">
                                <h4 class="card-title">Spareparts</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="{{route('teknisi.sp_p')}}" method="post">
                                    @csrf
                                    <table id="example5" class="display min-w850">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Stok</th>
                                                <th>Nama</th>
                                                <th>Merek</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sp as $itm)
                                            <tr>
                                            <td><input type="checkbox" name="itm[]" value={{$itm->id}}></td>
                                                <td>{{$itm->jumlah}}</td>
                                                <td>{{$itm->nama}}</td>
                                                <td>{{$itm->merek}}</td>
                                                <td>{{$itm->harga}}</td>
                                                <td class="text-center"><select id="single-select" style="border: 0ch;" name="qty[]">
                                                        <option selected disabled value=" "></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="class-footer d-flex justify-content-start">
                                        <button type='submit' class="btn btn-lg btn-primary mr-3" name="cc">Cancel</button>
                                        <button type='submit' value="{{$s[0]}}" class="btn btn-lg btn-primary" name="sl">Select</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
    
        @include('sweetalert::alert')
   <!-- Required vendors -->
   <script src="{{asset('assets/vendor/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/vendor/global/global.min.js')}}"></script>
	<script src="{{asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
	<script src="{{asset('assets/vendor/chart.js/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.min.js')}}"></script>
	<script src="{{asset('assets/js/deznav-init.js')}}"></script>
	<script src="{{asset('assets/vendor/owl-carousel/owl.carousel.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
	
    <!-- Datatable -->
    <script src="{{asset('assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins-init/datatables.init.js')}}"></script>

    <script src="{{asset('assets/vendor/pickadate/picker.js')}}"></script>
    <script src="{{asset('assets/vendor/pickadate/picker.time.js')}}"></script>
    <script src="{{asset('assets/vendor/pickadate/picker.date.js')}}"></script>

     <!-- Material color picker init -->
     <script src="{{asset('assets/js/plugins-init/material-date-picker-init.js')}}"></script>
    
     <!-- Pickdate -->
    <script src="{{asset('assets/js/plugins-init/pickadate-init.js')}}"></script>

	<!-- Chart piety plugin files -->
    <script src="{{asset('assets/vendor/peity/jquery.peity.min.js')}}"></script>
	
	<!-- Apex Chart -->
	<script src="{{asset('assets/vendor/apexchart/apexchart.js')}}"></script>
	
	<!-- Dashboard 1 -->
	<script src="{{asset('assets/js/dashboard/dashboard-1.js')}}"></script>
	
	<script>
		function carouselReview(){
			/*  event-bx one function by = owl.carousel.js */
			jQuery('.event-bx').owlCarousel({
				loop:true,
				margin:30,
				nav:true,
				center:true,
				autoplaySpeed: 3000,
				navSpeed: 3000,
				paginationSpeed: 3000,
				slideSpeed: 3000,
				smartSpeed: 3000,
				autoplay: false,
				navText: ['<i class="fa fa-caret-left" aria-hidden="true"></i>', '<i class="fa fa-caret-right" aria-hidden="true"></i>'],
				dots:true,
				responsive:{
					0:{
						items:1
					},
					720:{
						items:2
					},
					
					1150:{
						items:3
					},			
					
					1200:{
						items:2
					},
					1749:{
						items:3
					}
				}
			})			
		}
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000); 
		});
	</script>
</body>
</html>