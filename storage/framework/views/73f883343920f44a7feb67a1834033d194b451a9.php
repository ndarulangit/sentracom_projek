
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
<a href="<?php echo e(route ('user.logout')); ?>" class="dropdown-item ai-icon">
<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
<span class="ml-2">Logout </span>
</a>
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
<?php $__env->startSection('content'); ?>
 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Sparepart</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Order Form</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                                <div class="card-header">
                                    <h4>Cari Sparepart</h4>
                                </div>
                                <div class="card-body">
                                    <label for="nama_sparepart">Nama Sparepart</label>
                                    <form action="<?php echo e(route('user.sp')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <select name="nama_sparepart" id="nama_sparepart" class="form-control">
                                        <?php if(isset($cr)): ?>
                                        <option value="<?php echo e($cr); ?>" selected><?php echo e($cr); ?></option>
                                        <?php else: ?>
                                        <option value="" selected disabled>Pilih Sparepart</option>
                                        <?php endif; ?>
                                        <?php $__currentLoopData = $fltr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($opt->nama); ?>"><?php echo e($opt->nama); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <hr>
                                    <div class="class-footer d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(isset($fltr2)): ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>Data</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <form action="<?php echo e(route('user.order')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Jumlah</th>
                                                    <th>Nama</th>
                                                    <th>Merek</th>
                                                    <th>Harga</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $fltr2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                    <th><input type="checkbox" name="subpro" value="<?php echo e($itm->id); ?>"></th>
                                                    <th><?php echo e($itm->jumlah); ?></th>
                                                    <th><?php echo e($itm->nama); ?></th>
                                                    <th><?php echo e($itm->merek); ?></th>
                                                    <th>IDR<?php echo e($itm->harga); ?></th>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="class-footer d-flex justify-content-end">
                                        <button type='submit' class="btn btn-primary">Pilih</button>
                                    </div>
                                </form>
                                <?php endif; ?>
                            </div>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
        <!--**********************************
        Content body end
        ***********************************-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('\layout\viewnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sentracom_projek\resources\views/users/sparepart_1.blade.php ENDPATH**/ ?>