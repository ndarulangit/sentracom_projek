
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
                <div class="row">
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
                                            <a class="nav-link" data-toggle="tab" href="#profile2">Ordered</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="home1" role="tabpanel">
                                            <div class="table-responsive">
                                                <form action="<?php echo e(route('user.sv_order')); ?>" enctype="multipart/form-data" method="post">
                                                    <?php echo csrf_field(); ?>
                                                <table class="table table-sm mb-0 table-responsive-lg text-black">
                                                    <thead>
                                                        <tr>
                                                            <th class="align-middle">Identitas</th>
                                                            <th class="align-middle pr-2">Tanggal</th>
                                                            <th class="align-middle minw100">Dikirim ke</th>
                                                            <th class="align-middle minw100">Keterangan</th>
                                                            <th class="align-middle text-center">Status</th>
                                                            <th class="align-middle text-center">Harga</th>
                                                            <th class="no-sort"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="orders">
                                                        <?php $__currentLoopData = $sv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr class="btn-reveal-trigger">
                                                                <td class="py-2">
                                                                    <strong class="text-black" style="font-size : 20px;"><?php echo e($data->name); ?></strong><br /><p><?php echo e($data->email); ?><br><?php echo e($data->code); ?></p></td>
                                                                <td class="py-2"><?php echo e($data->booking); ?></td>
                                                                <td class="py-2"><?php echo e($data->alamat); ?></td>
                                                                <td class="py-2"><?php echo e($data->ket); ?></td>
                                                                <?php if($data->status != 'send' && $data->status !='finish'): ?>
                                                                <td class="py-2 text-center"><span class="badge badge-secondary">Process<span class="ml-1 fa fa-check"></span></span></td>
                                                                <td class="py-2 text-center">IDR <?php 
                                                                $num = $data->amount;
                                                                $num = sprintf("%.2f", $num);
                                                                echo number_format($num, 2, ".", ",");?>
                                                                <?php elseif($data->status == 'send'): ?>
                                                                <td class="py-2 text-center"><span class="badge badge-warning"><?php echo e($data->status); ?><span class="ml-1 fa fa-check"></span></span></td>
                                                                <td class="py-2 text-center">IDR <?php 
                                                                $num = $data->amount;
                                                                $num = sprintf("%.2f", $num);
                                                                echo number_format($num, 2, ".", ",");?>
                                                                <?php elseif($data->status == 'finish'): ?>
                                                                <td class="py-2 text-center"><span class="badge badge-success"><?php echo e($data->status); ?><span class="ml-1 fa fa-check"></span></span></td>
                                                                <td class="py-2 text-center">IDR <?php 
                                                                $num = $data->amount;
                                                                $num = sprintf("%.2f", $num);
                                                                echo number_format($num, 2, ".", ",");?>
                                                                </td>
                                                                <td> <div class="dropdown text-sans-serif"><button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-0" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span></button>
                                                                    <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="order-dropdown-0">
                                                                        <div class="py-2"><button class="dropdown-item text-success" value="<?php echo e($data->id); ?>" type="submit" name="order" >Order</button>
                                                                        </div>
                                                                    </div>
                                                                </div></td>
                                                                <?php endif; ?>
                                                        </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                                </form>
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
                                                    <?php $__currentLoopData = $sv1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $od): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($od->status == 'complete' || $od->status == 'cancel'): ?>
                                                <tr>
                                                    <td>#</td>
                                                    <td><?php echo e($od->code); ?> <?php echo e($od->type); ?></td>
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
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('\layout\viewnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sentracom_projek\resources\views/users/checkout_sv.blade.php ENDPATH**/ ?>