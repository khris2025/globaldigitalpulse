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
                  <h4 class="mb-sm-0 font-size-18">Choose Plan</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                        <li class="breadcrumb-item active">Choose Plan</li>
                     </ol>
                  </div>
               </div>
               <!-- TradingView Widget -->
               <div class="tradingview-widget-container mb-3">
                  <div class="tradingview-widget-container__widget"></div>
                  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                     {
                     "symbols": [
                         {"proName": "FOREXCOM:SPXUSD", "title": "S&P 500"},
                         {"proName": "FOREXCOM:NSXUSD", "title": "US 100"},
                         {"proName": "FX_IDC:EURUSD", "title": "EUR/USD"},
                         {"proName": "BITSTAMP:BTCUSD", "title": "Bitcoin"},
                         {"proName": "BITSTAMP:ETHUSD", "title": "Ethereum"}
                     ],
                     "showSymbolLogo": true,
                     "colorTheme": "light",
                     "isTransparent": false,
                     "displayMode": "regular",
                     "locale": "en"
                     }
                  </script>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header d-flex">
                     <h4 class="card-title mb-0 flex-grow-1">Select a suitable investment plan</h4>
                     <div class="flex-shrink-0 align-self-end">
                        <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" id="pills-tab" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link px-3 rounded monthly active" id="monthly" data-bs-toggle="pill" href="#month" role="tab" aria-controls="month" aria-selected="true">Plans</a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="month" role="tabpanel" aria-labelledby="monthly">
                           <div class="row">
                              <!-- Loop through each plan -->
                              <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <div class="col-xl-4 col-sm-6">
                                 <div class="card mb-xl-0">
                                    <div class="card-body">
                                       <div class="p-2">
                                          <h5 class="font-size-16"><?php echo e($plan->name); ?></h5>
                                          <h2 class="mt-3">
                                             $<?php echo e(number_format($plan->min_amount)); ?> - $<?php echo e(number_format($plan->max_amount)); ?>

                                             <span class="text-muted font-size-16 fw-medium"></span>
                                          </h2>
                                          <div class="mt-4 pt-2 text-muted">
                                             <p class="mb-3 font-size-15">
                                                <i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Duration: <?php echo e($plan->duration); ?> Days
                                             </p>
                                             <p class="mb-3 font-size-15">
                                                <i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>ROI: <?php echo e($plan->roi); ?>%
                                             </p>
                                          </div>
                                          <div class="mt-4 pt-2">
                                             <form action="<?php echo e(route('user.subscribe.plan', $plan->id)); ?>" method="POST">
                                             <?php echo csrf_field(); ?>
                                             <div class="form-group mb-3">
                                                   <input type="number" class="form-control" name="amount" id="amount" placeholder="Enter amount to invest" required min="<?php echo e($plan->min_amount); ?>" max="<?php echo e($plan->max_amount); ?>">
                                             </div>
                                             <button type="submit" class="btn btn-outline-primary w-100">Subscribe Now</button>
                                          </form>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-8">
               <div class="card">
                  <div class="card-header align-items-center d-flex">
                     <h4 class="card-title mb-0 flex-grow-1">Pending Investment</h4>
                     <div class="flex-shrink-0">
                        <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link active" data-bs-toggle="tab" href="#transactions-all-tab" role="tab">
                              Investments 
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
                                       <th >Date</th>
                                       <th>Trans. ID</th>
                                       <th>Plan</th>
                                       <th>Amount</th>
                                       <th>withdrawal Date</th>
                                       <th>Profit</th>
                                       <th>Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php $__currentLoopData = $pendinginv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendinginvs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                       <td style="font-size: 16px;" class="font-w400"><?php echo e($pendinginvs->created_at->format('F j, Y')); ?></td>
                                       <td style="font-size: 16px;" class="font-w400"><?php echo e($pendinginvs->transid); ?></td>
                                       <td style="font-size: 16px;" class="font-w400"><?php echo e($pendinginvs->plan); ?></td>
                                       <td style="font-size: 16px;" class="font-w400">$<?php echo e(number_format($pendinginvs->amount)); ?></td>
                                       <td style="font-size: 16px;" class="font-w400"><?php echo e($pendinginvs->Withdrawaldate->format('F j, Y')); ?></td>
                                       <td style="font-size: 16px;" class="font-w400">$<?php echo e(number_format($pendinginvs->profit)); ?></td>
                                       <td>
                                          <button type="button " class="btn btn-rounded btn-sm btn-outline-warning">
                                          <i class="bx bx-hourglass bx-spin font-size-16 align-middle me-2"></i><?php echo e($pendinginvs->status); ?>

                                          </button>
                                       </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <!-- end tab pane -->
                        <!-- end tab pane -->
                     </div>
                     <!-- end tab content -->
                  </div>
                  <!-- end card body -->
               </div>
               <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-4">
               <div class="card">
                  <div class="card-header align-items-center d-flex">
                     <h4 class="card-title mb-0 flex-grow-1">Investment History</h4>
                  </div>
                  <div class="card-body px-0">
                     <div class="px-3" data-simplebar style="max-height: 352px;">
                        <ul class="list-unstyled activity-wid mb-0">
                           <?php $__currentLoopData = $completedinv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $completedinvs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <li class="activity-list activity-border">
                              <div class="activity-icon avatar-md">
                                 <span class="avatar-title bg-soft-success text-secondary rounded-circle">
                                 <i class="bx bxs-check-circle font-size-24"></i>
                                 </span>
                              </div>
                              <div class="timeline-list-item">
                                 <div class="d-flex">
                                    <div class="flex-grow-1 overflow-hidden me-4">
                                       <h5 class="font-size-14 mb-1">Transaction ID - <?php echo e($completedinvs->transid); ?></h5>
                                    </div>
                                    <div class="flex-shrink-0 text-end me-3">
                                       <h6 class="mb-1">Investment: <span class="text-success"> $<?php echo e(number_format($completedinvs->amount)); ?> </span> </h6>
                                       <div class="font-size-13">profit: $<?php echo e(number_format($completedinvs->profit)); ?> </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Userview.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u838997326/domains/trade.bright-waveholdinginc.com/public_html/NN/resources/views/Userview/investment.blade.php ENDPATH**/ ?>