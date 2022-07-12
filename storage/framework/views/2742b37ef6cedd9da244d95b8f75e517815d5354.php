
<?php $__env->startSection('Judul Halaman', 'Sentracom'); ?>
<?php $__env->startSection('Header', 'Pemesanan'); ?>
<?php $__env->startSection('logo_nav'); ?>
<?php echo e(url('/')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('header_set'); ?>
<li class="nav-item dropdown header-profile">
<a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
<img src="<?php echo e(asset('assets/icons/ava.png')); ?>" width="20" class="img-fluid rounded-circle" alt="">
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
</li>
<?php $__env->stopSection(); ?>
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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Pemesanan</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">List Order</a></li>
					</ol>
                </div>

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home1">Checkout</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile1">Tracking</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile2">Ordered</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="home1" role="tabpanel">
                                        <div class="table-responsive">
                                            <form action="<?php echo e(route('user.sp.order')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                            <table class="table table-sm mb-0 table-responsive-lg text-black">
                                                <thead>
                                                    <tr>
                                                        <th class="align-middle">Identitas</th>
                                                        <th class="align-middle minw100">Dikirim ke</th>
                                                        <th class="align-middle minw100">Barang</th>
                                                        <th class="align-middle text-center">Status</th>
                                                        <th class="align-middle text-center">Harga</th>
                                                        <th class="no-sort"></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="orders">
                                                    <?php $__currentLoopData = $sp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr class="btn-reveal-trigger">
                                                        <td class="py-2">
                                                        <strong class="text-black" style="font-size : 20px;"><?php echo e($data->name); ?></strong><br /><p><?php echo e($data->email); ?></p></td>
                                                        <td class="py-2"><?php echo e($data->alamat); ?></td>
                                                        <td class="py-2"><?php echo e($data->nama); ?> <?php echo e($data->merek); ?></td>
                                                        <td class="py-2 text-center"><span class="badge badge-secondary"><?php echo e($data->status); ?><span class="ml-1 fa fa-check"></span></span></td>
                                                        <td class="py-2 text-center">IDR <?php echo e(($data->harga)*($data->jumlah)); ?>

                                                            </td>
                                                        <td class="py-2 text-right">
                                                            </td>
                                                        <td><input type="checkbox" name="cekot[]" value=<?php echo e($data->id); ?>></td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="pt-3"><button type="submit" class="btn btn-lg btn-primary">Order</button></div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="profile1">
                                        <div class="pt-4">
                                            <div class="col-xl-12">
                                                <!-- Default accordion -->
                                                <?php $__currentLoopData = $sp1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $track): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($track->status != 'complete'&& $track->status != 'cancel'): ?>
                                                <div id="accordion-one" class="accordion accordion-primary">
                                                    <div class="accordion__item">
                                                        <table>
                                                        <tr>
                                                        <div class="accordion__header collapsed rounded-lg" data-toggle="collapse" data-target="#default_<?php echo e($track->id); ?>">
                                                            <span class="accordion__header--text"><?php echo e($track->nama); ?> <?php echo e($track->merek); ?></span>
                                                            <span class="accordion__header--indicator"></span>
                                                        </div>
                                                        <div id="default_<?php echo e($track->id); ?>" class="collapse accordion__body" data-parent="#accordion-one">
                                                            <div class="accordion__body--text">
                                                                <div id="DZ_W_TimeLine11" class="widget-timeline dz-scroll style-1 height370">
                                                                    <ul class="timeline">
                                                                        <li>
                                                                            <div class="timeline-badge dark"></div>
                                                                            <a class="timeline-panel text-muted">
                                                                                <h4 class="mb-0">Pending</h4>
                                                                                <p>Pesanan berhasil dicheckout</p>
                                                                            </a>
                                                                        </li>
                                                                        <?php if($track->status == 'send'): ?>
                                                                            <div class="timeline-badge warning">
                                                                            </div>
                                                                            <a class="timeline-panel text-muted">
                                                                                <h4 class="mb-0">Sending</h4>
                                                                                <p>Barang sedang dalam pengiriman</p>
                                                                            </a>
                                                                        </li>
                                                                        <?php endif; ?>
                                                                    </ul>
                                                                </div>                                                            
                                                            </div>
                                                        </div>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile2">
                                        <div class="pt-4">
                                            <div class="col-xl-12">
                                            <table id="example5" class="display min-w850">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Barang</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $sp1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $od): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($od->status == 'complete' || $od->status == 'cancel'): ?>
                                            <tr>
                                                <td>#</td>
                                                <td><?php echo e($od->nama); ?> <?php echo e($od->merek); ?></td>
                                                <td>
                                                    <?php if($od->status == 'cancel'): ?>
                                                    <span class="badge light badge-dark">
                                                        <i class="fa fa-circle text-dark mr-1"></i>
                                                        Canceled
                                                    </span>
                                                    </td>
                                                    <?php elseif($od->status == 'complete'): ?>
                                                    <span class="badge light badge-success">
                                                        <i class="fa fa-circle text-success mr-1"></i>
                                                        Completed
                                                    </span>
                                                    </td>
                                                        <?php endif; ?>
                                            </tr>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('\layout\viewnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sentracom_projek\resources\views/users/checkout_sp.blade.php ENDPATH**/ ?>