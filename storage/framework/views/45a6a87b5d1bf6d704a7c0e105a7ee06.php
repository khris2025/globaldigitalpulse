<?php $__env->startSection('content'); ?>
<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0 font-size-18">Manage-Investment</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Manage-Investment</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-12">
               <div class="card">
                  <div class="card-header align-items-center d-flex">
                     <h4 class="card-title mb-0 flex-grow-1">Manage Investment</h4>
                     <div class="flex-shrink-0">
                        <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link active" data-bs-toggle="tab" href="#transactions-all-tab" role="tab">
                                Investment 
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
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Amount</th>
                                       <th>Plan</th>
                                       <th>Status</th>
                                       <th>Dated Added</th>
                                       <th>Control</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $__currentLoopData = $allInvestment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $investments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td style="font-size: 16px;" class="font-w400"><?php echo e($investments->fullname); ?></td>
                                            <td style="font-size: 16px;" class="font-w400"><?php echo e($investments->email); ?></td>
                                            <td style="font-size: 16px;" class="font-w400">$<?php echo e(number_format($investments->amount)); ?></td>
                                            <td style="font-size: 16px;" class="font-w400"><?php echo e($investments->plan); ?></td>
                                            <td style="font-size: 16px;" class="font-w400"><?php echo e($investments->status); ?></td>
                                            <td style="font-size: 16px;" class="font-w400"><?php echo e($investments->created_at); ?></td>
                                            <td><a href="<?php echo e(route('modify_investments', ['id' => $investments->id])); ?>" class="btn btn-rounded btn-primary">Manage</a></td>
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
<?php echo $__env->make('Adminview.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u838997326/domains/trade.bright-waveholdinginc.com/public_html/NN/resources/views/Adminview/manageinvestment.blade.php ENDPATH**/ ?>