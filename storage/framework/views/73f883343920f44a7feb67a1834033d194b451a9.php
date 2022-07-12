
<?php $__env->startSection('Judul Halaman', 'Sentracom'); ?>
<?php $__env->startSection('Header', 'Sparepart'); ?>
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
                                                    <?php $__currentLoopData = $fltr2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($itm->jumlah != 0): ?>
                                                    <tr>
                                                    <th><input type="checkbox" name="subpro[]" value=<?php echo e($itm->id); ?>></th>
                                                    <th><?php echo e($itm->jumlah); ?></th>
                                                    <th><a type="button" data-toggle="modal" data-target="#test_<?php echo e($itm->id); ?>"><?php echo e($itm->nama); ?></th>
                                                    <th><a type="button" data-toggle="modal" data-target="#test_<?php echo e($itm->id); ?>"><?php echo e($itm->merek); ?></th>
                                                    <th>IDR<?php echo e($itm->harga); ?></th>
                                                    <th class="text-center"><select id="single-select" style="border: 0ch;" name="qty[]">
                                                        <option selected disabled value=" "></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select></th>
                                                    <!-- Modal Detail !-->
                                                    <div class="modal fade bd-example-modal-lg" id="test_<?php echo e($itm->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Detail Sparepart</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <div class="row">
                                                                                        <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                                                                                            <!-- Tab panes -->
                                                                                            <div class="tab-content">
                                                                                                <div role="tabpanel" class="tab-pane fade show active" id="first">
                                                                                                <img src="<?php echo e(asset('image/'.$itm->gambar)); ?>" width="200" alt="">                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!--Tab slider End-->
                                                                                        <div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                                                                                            <div class="product-detail-content">
                                                                                                <!--Product details-->
                                                                                                <div class="new-arrival-content pr">
                                                                                                    <h4><?php echo e($itm->nama); ?> <?php echo e($itm->merek); ?></h4>
                                                                                                    <div class="d-table mb-2">
                                                                                                        <p class="price float-left d-block">IDR <?php echo e($itm->harga); ?></p>
                                                                                                    </div>
                                                                                                    <p>Ketersediaan: <span class="item"> <?php echo e($itm->jumlah); ?> <i
                                                                                                                class="fa fa-shopping-basket"></i></span>
                                                                                                    </p>
                                                                                                    <p>Product code: <span class="item">xxx-xxx-<?php echo e($itm->id); ?></span> </p>
                                                                                                    <p class="text-content"><?php echo e($itm->deskripsi); ?></p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Modal End !-->
                                                </tr>
                                                <?php endif; ?>
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
        Content body end !-->
        <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php $__env->stopSection(); ?>
<?php echo $__env->make('\layout\viewnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sentracom_projek\resources\views/users/sparepart_1.blade.php ENDPATH**/ ?>