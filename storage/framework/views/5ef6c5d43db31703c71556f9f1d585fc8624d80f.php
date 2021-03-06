
<?php $__env->startSection('Judul Halaman', 'Sentracom'); ?>
<?php $__env->startSection('Header', 'Pemesanan'); ?>
<?php $__env->startSection('logo_nav'); ?>
<?php echo e(url('/')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('header_set'); ?>
<li class="nav-item dropdown header-profile">
<a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
<img src="<?php echo e(asset('assets/images/profile/17.jpg')); ?>" width="20" alt=""/>
</a>
<div class="dropdown-menu dropdown-menu-right">
<a href="#" class="dropdown-item ai-icon">
<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
<span class="ml-2">Daftar / Masuk </span>
</a>
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
        <li><a href="<?php echo e(url('user/checkout')); ?>">Service</a></li>
        <li><a href="<?php echo e(url('user/checkout')); ?>">Sparepart</a></li>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm mb-0 table-responsive-lg text-black">
                                        <thead>
                                            <tr>
                                                <th class="align-middle">Identitas</th>
                                                <th class="align-middle pr-2">Date</th>
                                                <th class="align-middle minw100">Ship To</th>
                                                <th class="align-middle text-center">Status</th>
                                                <th class="align-middle text-center">Amount</th>
                                                <th class="no-sort"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="orders">
                                            <tr class="btn-reveal-trigger">
                                                    <td class="py-2">
                                                        <strong class="text-black">#181</strong></a> by <strong class="text-black">Ricky
                                                        Antony</strong><br /><a href="mailto:ricky@example.com">ricky@example.com</td>
                                                    <td class="py-2">20/04/2020</td>
                                                    <td class="py-2">Ricky Antony, 2392 Main Avenue, Penasauka, New Jersey 02149
                                                        <p class="mb-0 text-500">Via Flat Rate</p>
                                                    </td>
                                                    <td class="py-2 text-center"><span class="badge badge-secondary">Pending<span
                                                                class="ml-1 fa fa-check"></span></span>
                                                    </td>
                                                    <td class="py-2 text-center">$99
                                                    </td>
                                                    <td class="py-2 text-right">
                                                    <div class="dropdown text-sans-serif"><button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-0" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span></button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="order-dropdown-0">
                                                            <div class="py-2"><a class="dropdown-item text-success" href="#!">Invoice</a>
                                                                <div class="dropdown-divider"></div><a class="dropdown-item text-warning" href="#!">Tracking</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="btn-reveal-trigger">
                                                    <td class="py-2">
                                                        <strong class="text-black">#181</strong></a> by <strong class="text-black">Ricky
                                                        Antony</strong><br /><a href="mailto:ricky@example.com">ricky@example.com</td>
                                                    <td class="py-2">20/04/2020</td>
                                                    <td class="py-2">Ricky Antony, 2392 Main Avenue, Penasauka, New Jersey 02149
                                                        <p class="mb-0 text-500">Via Flat Rate</p>
                                                    </td>
                                                    <td class="py-2 text-center"><span class="badge badge-success">Completed<span
                                                                class="ml-1 fa fa-check"></span></span>
                                                    </td>
                                                    <td class="py-2 text-center">$99
                                                    </td>
                                                    <td class="py-2 text-right">
                                                    <div class="dropdown text-sans-serif"><button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-0" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span></button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="order-dropdown-0">
                                                            <div class="py-2"><a class="dropdown-item text-success" href="<?php echo e(url('/user/invoice')); ?>">Invoice</a>
                                                                <div class="dropdown-divider"></div><a class="dropdown-item text-warning" href="<?php echo e(url('/user/history')); ?>">Tracking</a>
                                                            </div>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('\layout\viewnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sentracom_projek\resources\views/users/checkout.blade.php ENDPATH**/ ?>