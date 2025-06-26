<?php $__env->startSection('content'); ?>
<?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
   <script>
         Swal.fire({
         icon: 'error',
         title: 'Oops...',
         text: <?php echo json_encode($message, 15, 512) ?>,
      });
   </script>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<?php if(session('success')): ?>
   <script>
      Swal.fire({
         icon: 'success',
         title: 'Success',
         text: <?php echo json_encode(session('success'), 15, 512) ?>,
      });
   </script>
<?php endif; ?>
<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0 font-size-18">On-going Mining</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">On-going Mining</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-12">
               <div class="card">
                  <div class="card-header align-items-center d-flex">
                     <h4 class="card-title mb-0 flex-grow-1">On-going Mining</h4>
                     <div class="flex-shrink-0">
                        <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link active" data-bs-toggle="tab" href="#transactions-all-tab" role="tab">
                              Withdrawals 
                              </a>
                           </li>
                        </ul>
                        <!-- end nav tabs -->
                     </div>
                  </div>
                  <!-- end card header -->
                  <div class="card-body px-0">
                     <div class="tab-content">
                        <div class="tab-pane active" id="transactions-all-tab" role="tabpanel">
                           <div class="table-responsive px-3" data-simplebar >
                              <table id="datatable" class="table nowrap w-100">
                                 <thead>
                                    <tr>
                                       <th>Full Name</th>
                                       <th>Email</th>
                                       <th>Amount</th>
                                       <th>Profit</th>
                                       <th>Coin Type</th>
                                       <th>Status</th>
                                       <th>Transaction ID</th>
                                       <th>Withdrawal Date</th>
                                       <th>Control</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $__currentLoopData = $ongoing_mining; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mining): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <tr>
                                            <td style="font-size: 16px;" class="font-w400"><?php echo e($mining->fullname); ?></td>
                                            <td style="font-size: 16px;" class="font-w400"><?php echo e($mining->email); ?></td>
                                            <td style="font-size: 16px;" class="font-w400"><?php echo e($mining->amount); ?></td>
                                            <td style="font-size: 16px;" class="font-w400"><?php echo e($mining->profit ?? '-'); ?></td>
                                            <td style="font-size: 16px;" class="font-w400"><?php echo e($mining->plan); ?></td>
                                            <td style="font-size: 16px;" class="font-w400"><?php echo e($mining->status); ?></td>
                                            <td style="font-size: 16px;" class="font-w400"><?php echo e($mining->transid); ?></td>
                                            <td style="font-size: 16px;" class="font-w400">
                                            <?php echo e($mining->created_at ? $mining->created_at->format('F j, Y g:i A') : '-'); ?>

                                            </td>
                                            <td>
                                            <a href="<?php echo e(route('miningplans.end', ['id' => $mining->id])); ?>" class="btn btn-rounded btn-danger" onclick="return confirm('Are you sure you want to end this mining plan?')">End</a>
                                            </td>
                                       </tr>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Adminview.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/gibsonjohn/Desktop/dashboard2/resources/views/Adminview/manage_ongoingmining.blade.php ENDPATH**/ ?>