@extends('\layout\viewnavbar')
@section('Judul Halaman', 'Sentracom')
@section('Header', 'Dashboard')
@section('logo_nav')
{{url('admin')}}
@endsection
@section('header_set')
<li class="nav-item dropdown header-profile">
<a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
<img src="{{asset('assets/images/profile/17.jpg')}}" width="20" alt=""/>
</a>
<div class="dropdown-menu dropdown-menu-right">
<a href="#" class="dropdown-item ai-icon">
<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
<span class="ml-2">Logout </span>
</a>
</div>
</li>
@endsection
@section('dashboard_nav')
<li><a href="{{url('admin/sparepart')}}">Database Sparepart</a></li>
<li><a href="{{url('admin/history')}}">Catatan/History</a></li>
@endsection
@section('content')
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
					</ol>
                </div>
                <!-- row -->
				<div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
									<div class="mb-3 mr-3">
										<h6 class="fs-16 text-black font-w600 mb-0">568 Total Orders</h6>
										<span class="fs-14">Based your preferences</span>
									</div>
									<div class="event-tabs mb-3 mr-3">
										<ul class="nav nav-tabs" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" data-toggle="tab" href="#All" role="tab" aria-selected="true">
													All
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#Sold" role="tab" aria-selected="false">
													Sold
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#Refunded" role="tab" aria-selected="false">
													Refunded
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#Canceled" role="tab" aria-selected="false">
													Canceled
												</a>
											</li>
										</ul>
									</div>
									<div class="d-flex mb-3">
										<select class="form-control style-2 default-select mr-3">
											<option>Newest</option>
											<option>Monthly</option>
											<option>Weekly</option>
										</select>
										<a href="javascript:void(0)" class="btn btn-primary text-nowrap"><i class="fa fa-file-text scale5 mr-3" aria-hidden="true"></i>Generate Report</a>
									</div>
								</div>

                <div class="row">
					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Patient</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example5" class="display min-w850">
                                        <thead>
                                            <tr>
                                                <th>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="checkAll" required="">
														<label class="custom-control-label" for="checkAll"></label>
													</div>
												</th>
                                                <th>Order ID</th>
                                                <th>Date Check in</th>
                                                <th>Name</th>
                                                <th>Assgined</th>
                                                <th>Disease</th>
                                                <th>Status</th>
                                                <th>Table no</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
														<label class="custom-control-label" for="customCheckBox2"></label>
													</div>
												</td>
                                                <td>#P-00001</td>
                                                <td>26/02/2020, 12:42 AM</td>
                                                <td>Tiger Nixon</td>
                                                <td>Dr. Cedric</td>
                                                <td>Cold & Flu</td>
												<td>
													<span class="badge light badge-danger">
														<i class="fa fa-circle text-danger mr-1"></i>
														New Patient
													</span>
												</td>
                                                <td>AB-001</td>
                                                <td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Accept Patient</a>
															<a class="dropdown-item" href="#">Reject Order</a>
															<a class="dropdown-item" href="#">View Details</a>
														</div>
													</div>
												</td>												
                                            </tr>
                                            <tr>
												<td>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="customCheckBox3" required="">
														<label class="custom-control-label" for="customCheckBox3"></label>
													</div>
												</td>
                                                <td>#P-00002</td>
                                                <td>28/02/2020, 12:42 AM</td>
												<td>Garrett Winters</td>
                                                <td>Dr. Cedric</td>
												<td>Sleep Problem</td>
                                                <td>
													<span class="badge light badge-warning">
														<i class="fa fa-circle text-warning mr-1"></i>
														In Treatment
													</span>
												</td>
                                                <td>AB-002</td>
                                                <td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Accept Patient</a>
															<a class="dropdown-item" href="#">Reject Order</a>
															<a class="dropdown-item" href="#">View Details</a>
														</div>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="customCheckBox4" required="">
														<label class="custom-control-label" for="customCheckBox4"></label>
													</div>
												</td>
                                                <td>#P-00003</td>
                                                <td>26/02/2020, 12:42 AM</td>
												<td>Ashton Cox</td>
                                                <td>Dr. Rhona</td>
												<td>Cold & Flu</td>
                                                <td>
													<span class="badge light badge-success">
														<i class="fa fa-circle text-success mr-1"></i>
														Recovered
													</span>
												</td>
                                                <td>AB-003</td>
												<td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Accept Patient</a>
															<a class="dropdown-item" href="#">Reject Order</a>
															<a class="dropdown-item" href="#">View Details</a>
														</div>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="customCheckBox5" required="">
														<label class="custom-control-label" for="customCheckBox5"></label>
													</div>
												</td>
                                                <td>#P-00004</td>
                                                <td>29/02/2020, 12:42 AM</td>
												<td>Ashton Cox</td>
                                                <td>Dr. Cedric</td>
                                                <td>Cold & Flu</td>
                                                <td>
													<span class="badge light badge-warning">
														<i class="fa fa-circle text-warning mr-1"></i>
														In Treatment
													</span>
												</td>
                                                <td>AB-004</td>
                                                <td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Accept Patient</a>
															<a class="dropdown-item" href="#">Reject Order</a>
															<a class="dropdown-item" href="#">View Details</a>
														</div>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="customCheckBox6" required="">
														<label class="custom-control-label" for="customCheckBox6"></label>
													</div>
												</td>
                                                <td>#P-00005</td>
                                                <td>28/02/2020, 12:42 AM</td>
												<td>Ashton Cox</td>
                                                <td>Dr. Cedric</td>
                                                <td>Cold & Flu</td>
                                                <td>
													<span class="badge light badge-warning">
														<i class="fa fa-circle text-warning mr-1"></i>
														In Treatment
													</span>
												</td>
                                                <td>AB-005</td>
                                                <td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Accept Patient</a>
															<a class="dropdown-item" href="#">Reject Order</a>
															<a class="dropdown-item" href="#">View Details</a>
														</div>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="customCheckBox7" required="">
														<label class="custom-control-label" for="customCheckBox7"></label>
													</div>
												</td>
                                                <td>#P-00006</td>
                                                <td>28/02/2020, 12:42 AM</td>
												<td>Ashton Cox</td>
                                                <td>Dr. Rhona</td>
                                                <td>Sleep Problem</td>
												<td>
													<span class="badge light badge-warning">
														<i class="fa fa-circle text-warning mr-1"></i>
														In Treatment
													</span>
												</td>
                                                <td>AB-006</td>
												<td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Accept Patient</a>
															<a class="dropdown-item" href="#">Reject Order</a>
															<a class="dropdown-item" href="#">View Details</a>
														</div>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="customCheckBox8" required="">
														<label class="custom-control-label" for="customCheckBox8"></label>
													</div>
												</td>
                                                <td>#P-00007</td>
                                                <td>26/02/2020, 12:42 AM</td>
												<td>Airi Satou</td>
                                                <td>Dr. Rhona</td>
                                                <td>Cold & Flu</td>
                                                <td>
													<span class="badge light badge-danger">
														<i class="fa fa-circle text-danger mr-1"></i>
														New Patient
													</span>
												</td>
                                                <td>AB-007</td>
                                                <td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Accept Patient</a>
															<a class="dropdown-item" href="#">Reject Order</a>
															<a class="dropdown-item" href="#">View Details</a>
														</div>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="customCheckBox9" required="">
														<label class="custom-control-label" for="customCheckBox9"></label>
													</div>
												</td>
                                                <td>#P-00008</td>
                                                <td>29/02/2020, 12:42 AM</td>
												<td>Airi Satou</td>
                                                <td>Dr. Garrett </td>
                                                <td>Sleep Problem</td>
                                                <td>
													<span class="badge light badge-warning">
														<i class="fa fa-circle text-warning mr-1"></i>
														In Treatment
													</span>
												</td>
                                                <td>AB-008</td>
                                                <td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Accept Patient</a>
															<a class="dropdown-item" href="#">Reject Order</a>
															<a class="dropdown-item" href="#">View Details</a>
														</div>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="customCheckBox10" required="">
														<label class="custom-control-label" for="customCheckBox10"></label>
													</div>
												</td>
                                                <td>#P-00009</td>
                                                <td>25/02/2020, 12:42 AM</td>
												<td>Airi Satou</td>
                                                <td>Dr. Rhona</td>
                                                <td>Cold & Flu</td>
                                                <td>
													<span class="badge light badge-danger">
														<i class="fa fa-circle text-danger mr-1"></i>
														New Patient
													</span>
												</td>
                                                <td>AB-009</td>
                                                <td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Accept Patient</a>
															<a class="dropdown-item" href="#">Reject Order</a>
															<a class="dropdown-item" href="#">View Details</a>
														</div>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="customCheckBox11" required="">
														<label class="custom-control-label" for="customCheckBox11"></label>
													</div>
												</td>
                                                <td>#P-00010</td>
                                                <td>26/02/2020, 12:42 AM</td>
												<td>Airi Satou</td>
                                                <td>Dr. Rhona</td>
                                                <td>Sleep Problem</td>
                                                <td>
													<span class="badge light badge-danger">
														<i class="fa fa-circle text-danger mr-1"></i>
														New Patient
													</span>
												</td>
                                                <td>AB-010</td>
                                                <td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Accept Patient</a>
															<a class="dropdown-item" href="#">Reject Order</a>
															<a class="dropdown-item" href="#">View Details</a>
														</div>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="customCheckBox12" required="">
														<label class="custom-control-label" for="customCheckBox12"></label>
													</div>
												</td>
                                                <td>#P-00011</td>
                                                <td>28/02/2020, 12:42 AM</td>
												<td>Airi Satou</td>
                                                <td>Dr. Rhona</td>
                                                <td>Cold & Flu</td>
												<td>
													<span class="badge light badge-warning">
														<i class="fa fa-circle text-warning mr-1"></i>
														In Treatment
													</span>
												</td>
                                                <td>AB-011</td>
                                                <td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Accept Patient</a>
															<a class="dropdown-item" href="#">Reject Order</a>
															<a class="dropdown-item" href="#">View Details</a>
														</div>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="customCheckBox13" required="">
														<label class="custom-control-label" for="customCheckBox13"></label>
													</div>
												</td>
                                                <td>#P-00012</td>
                                                <td>29/02/2020, 12:42 AM</td>
												<td>Sonya Frost</td>
                                                <td>Dr. Garrett</td>
                                                <td>Sleep Problem</td>
                                                <td>
													<span class="badge light badge-danger">
														<i class="fa fa-circle text-danger mr-1"></i>
														New Patient
													</span>
												</td>
                                                <td>AB-012</td>
                                                <td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Accept Patient</a>
															<a class="dropdown-item" href="#">Reject Order</a>
															<a class="dropdown-item" href="#">View Details</a>
														</div>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="customCheckBox14" required="">
														<label class="custom-control-label" for="customCheckBox14"></label>
													</div>
												</td>
                                                <td>#P-00013</td>
                                                <td>25/02/2020, 12:42 AM</td>
												<td>Sonya Frost</td>
                                                <td>Dr. Rhona</td>
                                                <td>Cold & Flu</td>
												<td>
													<span class="badge light badge-danger">
														<i class="fa fa-circle text-danger mr-1"></i>
														New Patient
													</span>
												</td>
                                                <td>AB-013</td>
                                                <td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Accept Patient</a>
															<a class="dropdown-item" href="#">Reject Order</a>
															<a class="dropdown-item" href="#">View Details</a>
														</div>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="customCheckBox15" required="">
														<label class="custom-control-label" for="customCheckBox15"></label>
													</div>
												</td>
                                                <td>#P-00014</td>
                                                <td>26/02/2020, 12:42 AM</td>
												<td>Sonya Frost</td>
                                                <td>Dr. Garrett</td>
                                                <td>Sleep Problem</td>
                                                <td>
													<span class="badge light badge-warning">
														<i class="fa fa-circle text-warning mr-1"></i>
														In Treatment
													</span>
												</td>
                                                <td>AB-014</td>
                                                <td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Accept Patient</a>
															<a class="dropdown-item" href="#">Reject Order</a>
															<a class="dropdown-item" href="#">View Details</a>
														</div>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="customCheckBox16" required="">
														<label class="custom-control-label" for="customCheckBox16"></label>
													</div>
												</td>
                                                <td>#P-00015</td>
                                                <td>28/02/2020, 12:42 AM</td>
												<td>Sonya Frost</td>
												<td>Dr. Rhona</td>
                                                <td>Cold & Flu</td>
                                                <td>
													<span class="badge light badge-danger">
														<i class="fa fa-circle text-danger mr-1"></i>
														New Patient
													</span>
												</td>
                                                <td>AB-015</td>
                                                <td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Accept Patient</a>
															<a class="dropdown-item" href="#">Reject Order</a>
															<a class="dropdown-item" href="#">View Details</a>
														</div>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="customCheckBox17" required="">
														<label class="custom-control-label" for="customCheckBox17"></label>
													</div>
												</td>
                                                <td>#P-00016</td>
                                                <td>29/02/2020, 12:42 AM</td>
												<td>Sonya Frost</td>
                                                <td>Dr. Garrett</td>
												<td>Sleep Problem</td>
												<td>
													<span class="badge light badge-danger">
														<i class="fa fa-circle text-danger mr-1"></i>
														New Patient
													</span>
												</td>
                                                <td>AB-016</td>
                                                <td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Accept Patient</a>
															<a class="dropdown-item" href="#">Reject Order</a>
															<a class="dropdown-item" href="#">View Details</a>
														</div>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="customCheckBox18" required="">
														<label class="custom-control-label" for="customCheckBox18"></label>
													</div>
												</td>
                                                <td>#P-00017</td>
                                                <td>25/02/2020, 12:42 AM</td>
												<td>Sonya Frost</td>
                                                <td>Dr. Rhona</td>
												<td>Cold & Flu</td>
                                                <td>
													<span class="badge light badge-warning">
														<i class="fa fa-circle text-warning mr-1"></i>
														In Treatment
													</span>
												</td>
                                                <td>AB-017</td>
                                                <td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Accept Patient</a>
															<a class="dropdown-item" href="#">Reject Order</a>
															<a class="dropdown-item" href="#">View Details</a>
														</div>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="customCheckBox19" required="">
														<label class="custom-control-label" for="customCheckBox19"></label>
													</div>
												</td>
                                                <td>#P-00018</td>
                                                <td>26/02/2020, 12:42 AM</td>
												<td>Sonya Frost</td>
                                                <td>Dr. Rhona</td>
                                                <td>Sleep Problem</td>
                                                <td>
													<span class="badge light badge-danger">
														<i class="fa fa-circle text-danger mr-1"></i>
														New Patient
													</span>
												</td>
                                                <td>AB-018</td>
                                                <td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Accept Patient</a>
															<a class="dropdown-item" href="#">Reject Order</a>
															<a class="dropdown-item" href="#">View Details</a>
														</div>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="customCheckBox20" required="">
														<label class="custom-control-label" for="customCheckBox20"></label>
													</div>
												</td>
                                                <td>#P-00019</td>
                                                <td>28/02/2020, 12:42 AM</td>
												<td>Sonya Frost</td>
                                                <td>Dr. Rhona</td>
                                                <td>Cold & Flu</td>
                                                <td>
													<span class="badge light badge-danger">
														<i class="fa fa-circle text-danger mr-1"></i>
														New Patient
													</span>
												</td>
                                                <td>AB-019</td>
												<td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Accept Patient</a>
															<a class="dropdown-item" href="#">Reject Order</a>
															<a class="dropdown-item" href="#">View Details</a>
														</div>
													</div>
												</td>
                                            </tr>
                                            <tr>
												<td>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="customCheckBox21" required="">
														<label class="custom-control-label" for="customCheckBox21"></label>
													</div>
												</td>
                                                <td>#P-00020</td>
                                                <td>25/02/2020, 12:42 AM</td>
												<td>Sonya Frost</td>
                                                <td>Dr. Garrett</td>
                                                <td>Sleep Problem</td>
                                                <td>
													<span class="badge light badge-warning">
														<i class="fa fa-circle text-warning mr-1"></i>
														In Treatment
													</span>
												</td>
                                                <td>AB-020</td>
                                                <td>
													<div class="dropdown ml-auto text-right">
														<div class="btn-link" data-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Accept Patient</a>
															<a class="dropdown-item" href="#">Reject Order</a>
															<a class="dropdown-item" href="#">View Details</a>
														</div>
													</div>
												</td>
                                            </tr>
                                        </tbody>
                                    </table>
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
@endsection