
<?php $__env->startSection('Judul Halaman', 'Sentracom'); ?>
<?php $__env->startSection('Header', 'Sparepart'); ?>
<?php $__env->startSection('logo_nav'); ?>
<?php echo e(url('/')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('header_set'); ?>
<li class="nav-item dropdown header-profile">
<a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
<img src="<?php echo e(asset('assets/images/profile/17.jpg')); ?>" width="20" alt=""/>
</a>
<div class="dropdown-menu dropdown-menu-right">
<form action="<?php echo e(route ('user.logout')); ?>" method="post">
    <?php echo csrf_field(); ?>
<button type="submit" class="dropdown-item ai-icon">
<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
<span class="ml-2">Logout </span>
</form>
</div>
</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('dashboard_nav'); ?>
<li><a href="<?php echo e(url('user/service')); ?>">Service</a></li>
<li><a href="<?php echo e(url('user/sparepart')); ?>">Sparepart</a></li>
<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Checkout</a>
<ul aria-expanded="false">
        <li><a href="<?php echo e(url('user/checkout_sv')); ?>">Service</a></li>
        <li><a href="<?php echo e(url('user/checkout_sp')); ?>">Sparepart</a></li>
    </ul>
</li><?php $__env->stopSection(); ?>
<?php $__env->startSection('dahsboard_nav_profile'); ?>
<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
    <i class="flaticon-381-layer-1"></i>
    <span class="nav-text">Users</span>
</a>
<ul aria-expanded="false">
    <li><a href="<?php echo e(url('user/profile')); ?>">Profile</a></li>
</ul>
</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Sparepart</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Checkout</a></li>
					</ol>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-header"> Invoice <strong><?php echo e(date('Y/m/d')); ?></strong> <span class="float-right">
                                    <strong>Status: </strong><span class="badge badge-info">Process</span></span> </div>
                            <div class="card-body">
                                <div class="row mb-5">
                                    <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                        <h6>From:</h6>
                                        <div> <span class="badge badge-primary mb-2">Sentracom</span> </div>
                                        <div>71-101 Szczecin, Poland</div>
                                        <div>Email: info@webz.com.pl</div>
                                        <div>Phone: +48 444 666 3333</div>
                                    </div>
                                    <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                        <h6>To:</h6>
                                        <div> <span class="badge badge-success mb-2"><?php echo e($inv['0']->name); ?></span> </div>
                                        <div><?php echo e($inv['0']->alamat); ?></div>
                                        <div>Email: <?php echo e($inv['0']->email); ?></div>
                                        <div>Phone: <?php echo e($inv['0']->nowa); ?></div>
                                    </div>
                                    <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end justify-content-md-center justify-content-xs-start">
                                        <div class="row align-items-center">
											<div class="col-sm-9"> 
												<div class="brand-logo mb-3">
													<img class="logo-abbr mr-2" src="<?php echo e(asset ('assets/images/logo.png')); ?>" alt="">
													<img class="logo-compact" src="<?php echo e(asset ('assets/images/logo-text.png')); ?>" alt="">
												</div>
                                                <?php
                                                $total = 0;
                                                for ($i=0; $i <count($inv) ; $i++) { 
                                                    $total += $inv[$i]->harga*$inv[$i]->jumlah;
                                                    # code...
                                                }
                                                ?>
                                                <span>Transfer sesuai harga : <br><strong class="d-block mt-1"><?php echo e($total); ?></strong>
                                                    <strong>=========================</strong></span><br>
                                                <small class="text-muted">No. Rekening = xx xxxxx xxx</small>
                                            </div>
                                            <div class="col-sm-3 m-0"> <img src="<?php echo e(asset('assets/images/bni.png')); ?>" class="img-fluid"> </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="center">#Kode</th>
                                                <th>Nama Item</th>
                                                <th>Merek</th>
                                                <th class="right">Harga</th>
                                                <th class="center">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $inv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="center">xxx<?php echo e($itm->order_id); ?></td>
                                                <td class="left strong"><?php echo e($itm->nama); ?></td>
                                                <td class="left"><?php echo e($itm->merek); ?></td>
                                                <td class="right">IDR <?php echo e($itm->harga); ?></td>
                                                <td class="center"><?php echo e($itm->jumlah); ?></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 mt-3">
                                    <table class="table table-clear">
                                        <form action="<?php echo e(route('invoice.post', $total)); ?>" method="post" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <tbody>
                                                <tr class="left">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="bukti" class="custom-file-input">
                                                            <label class="custom-file-label">Upload Bukti Transfer disini</label>
                                                        </div>
                                                    </div>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-4 col-sm-5 ml-auto">
                                        <table class="table table-clear">
                                            <tbody>
                                                <tr>
                                                    <td class="left"><strong>Ongkir</strong></td>
                                                    <td class="right"><strong>IDR 14,000</strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="left"><strong>Total</strong></td>
                                                    <td class="right"><strong>IDR <?php echo e($total+14000); ?></strong><br>
                                                </tr>
                                                <tr>
                                                    <td class="left">
                                                    <button name="cancel" value="cancel" type="submit" class="btn btn-secondary btn-lg" href="javascript:void(0)"><i class="ml-0"></i>Cancel</button>
                                                    </td>
                                                    <td class="right">
                                                        <div class="pt-0">
                                                        <button name="order" value="order" type="submit" class="btn btn-primary btn-lg" href="javascript:void(0)"><i class="mr-0"></i>Order</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </form>
                                            </tbody>
                                        </table>
                                    </div>
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
        <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('\layout\viewnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sentracom_projek\resources\views/users/invoice.blade.php ENDPATH**/ ?>