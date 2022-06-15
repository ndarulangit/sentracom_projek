
<?php $__env->startSection('Judul Halaman', 'Sentracom'); ?>
<?php $__env->startSection('Header', 'Service'); ?>
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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Service</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Order Form</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Detail Order</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="<?php echo e(route ('user.service.post')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-xl-8">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="code">Kode Laptop / Nama Laptop
                                                    </label>
                                                    <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="code" name="code" style="color:grey;" placeholder="Masukkan (Nama_barang-Kode_barang) disini ...">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="type">Jenis Service
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control default-select" id="type" name="type">
                                                            <option value=" " disabled selected>Pilihlah Dibawah Ini</option>
                                                            <option value="Software">Software</option>
                                                            <option value="Hardware">Hardware</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="mdate">Booking Tanggal
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" name="mdate" class="form-control" placeholder="Booking Tanggal disini ..." id="mdate" style="color:grey;">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="ket">Keterangan
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <textarea class="form-control" id="ket" name="ket" rows="5" style="color:grey;" placeholder="Masukkan Keterangan Lengkap.."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 text-right">
                                                <button type="submit" class="btn btn-lg btn-primary">Checkout</button>
                                            </div>

                                        </div>
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
        <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('\layout\viewnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sentracom_projek\resources\views/users/service_1.blade.php ENDPATH**/ ?>