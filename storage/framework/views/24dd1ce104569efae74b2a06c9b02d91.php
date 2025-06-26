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
         <!-- start page title -->
         <div class="row">
            <div class="col-12">
               <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                     </ol>
                  </div>
               </div>
               <!-- TradingView Widget BEGIN -->
               <div class="tradingview-widget-container mb-3">
                  <div class="tradingview-widget-container__widget"></div>
                  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                     {
                     "symbols": [
                       {
                         "proName": "FOREXCOM:SPXUSD",
                         "title": "S&P 500"
                       },
                       {
                         "proName": "FOREXCOM:NSXUSD",
                         "title": "US 100"
                       },
                       {
                         "proName": "FX_IDC:EURUSD",
                         "title": "EUR/USD"
                       },
                       {
                         "proName": "BITSTAMP:BTCUSD",
                         "title": "Bitcoin"
                       },
                       {
                         "proName": "BITSTAMP:ETHUSD",
                         "title": "Ethereum"
                       }
                     ],
                     "showSymbolLogo": true,
                     "colorTheme": "light",
                     "isTransparent": false,
                     "displayMode": "regular",
                     "locale": "en"
                     }
                  </script>
               </div>
               <!-- TradingView Widget END -->
            </div>
         </div>
         <!-- end page title -->
         <div class="row">
            <div class="col-xl-4 col-md-4">
               <!-- card -->
               <div class="card card-h-100">
                  <!-- card body -->
                  <div class="card-body">
                     <div class="row align-items-center">
                        <div class="col-6">
                           <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Members</span>
                           <h4 class="mb-3">
                              <span><?php echo e($userCount); ?></span>
                           </h4>
                        </div>
                        <div class="col-6">
                           <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                        </div>
                     </div>
                     <div class="text-nowrap">
                        <span class="badge bg-soft-success text-success">+$20.9k</span>
                        <span class="ms-1 text-muted font-size-13">Since last week</span>
                     </div>
                  </div>
                  <!-- end card body -->
               </div>
               <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-4 col-md-4">
               <!-- card -->
               <div class="card card-h-100">
                  <!-- card body -->
                  <div class="card-body">
                     <div class="row align-items-center">
                        <div class="col-6">
                           <span class="text-muted mb-3 lh-1 d-block text-truncate">Total withdrawals</span>
                           <h4 class="mb-3">
                              $<span><?php echo e(number_format($totalwithdrawal)); ?></span>
                           </h4>
                        </div>
                        <div class="col-6">
                           <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                        </div>
                     </div>
                     <div class="text-nowrap">
                        <span class="badge bg-soft-danger text-danger">-29 Trades</span>
                        <span class="ms-1 text-muted font-size-13">Since last week</span>
                     </div>
                  </div>
                  <!-- end card body -->
               </div>
               <!-- end card -->
            </div>
            <!-- end col-->
            <div class="col-xl-4 col-md-4">
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                       <div class="row align-items-center">
                          <div class="col-6">
                             <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Deposits</span>
                             <h4 class="mb-3">
                                $<span><?php echo e(number_format($totalDeposit)); ?></span>
                             </h4>
                          </div>
                          <div class="col-6">
                             <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                          </div>
                       </div>
                       <div class="text-nowrap">
                          <span class="badge bg-soft-danger text-danger">-29 Trades</span>
                          <span class="ms-1 text-muted font-size-13">Since last week</span>
                       </div>
                    </div>
                    <!-- end card body -->
                 </div>
            </div>
            <!-- end col -->
         </div>
         <!-- end row-->
         <div class="row">
            <div class="col-xl-12">
               <div class="card">
                  <div class="card-header align-items-center d-flex">
                     <h4 class="card-title mb-0 flex-grow-1">Pending Transactions</h4>
                     <div class="flex-shrink-0">
                        <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link active" data-bs-toggle="tab" href="#deposittab" role="tab">
                              Deposits 
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="tab" href="#withdrawaltab" role="tab">
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
                        <div class="tab-pane active" id="deposittab" role="tabpanel">
                           <div class="table-responsive px-3" data-simplebar style="max-height: 352px;">
                                <table class="table align-middle table-nowrap table-borderless">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Amount</th>
                                            <th>Payment-Type</th>
                                            <th>Transaction-ID</th>
                                            <th>Date Added</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $pendingDeposit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendingDeposits): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td style="font-size: 16px;" class="font-w400"><?php echo e($pendingDeposits->id); ?></td>
                                                <td style="font-size: 16px;" class="font-w400">$<?php echo e(number_format($pendingDeposits->amount)); ?></td>
                                                <td style="font-size: 16px;" class="font-w400"><?php echo e($pendingDeposits->ptype); ?></td>
                                                <td style="font-size: 16px;" class="font-w400"><?php echo e($pendingDeposits->transid); ?></td>
                                                <td style="font-size: 16px;" class="font-w400"><?php echo e($pendingDeposits->dateadd); ?></td>
                                                <td style="font-size: 16px;">
                                                    <button type="button" class="btn btn-rounded btn-sm btn-outline-warning">
                                                        <i class="bx bx-hourglass bx-spin font-size-16 align-middle me-2"></i>
                                                        <?php echo e($pendingDeposits->status); ?>

                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                           </div>
                        </div>
                        <!-- end tab pane -->
                        <div class="tab-pane" id="withdrawaltab" role="tabpanel">
                           <div class="table-responsive px-3" data-simplebar style="max-height: 352px;">
                                <table class="table align-middle table-nowrap table-borderless">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Amount</th>
                                            <th>Payment-Type</th>
                                            <th>Transaction-ID</th>
                                            <th>Date Added</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $pendingwithdrawal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendingwithdrawals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td style="font-size: 16px;" class="font-w400"><?php echo e($pendingwithdrawals->id); ?></td>
                                                <td style="font-size: 16px;" class="font-w400">$<?php echo e(number_format($pendingwithdrawals->amount)); ?></td>
                                                <td style="font-size: 16px;" class="font-w400"><?php echo e($pendingwithdrawals->ptype); ?></td>
                                                <td style="font-size: 16px;" class="font-w400"><?php echo e($pendingwithdrawals->transid); ?></td>
                                                <td style="font-size: 16px;" class="font-w400"><?php echo e($pendingwithdrawals->dateadd); ?></td>
                                                <td style="font-size: 16px;">
                                                    <button type="button" class="btn btn-rounded btn-sm btn-outline-warning">
                                                        <i class="bx bx-hourglass bx-spin font-size-16 align-middle me-2"></i>
                                                        <?php echo e($pendingwithdrawals->status); ?>

                                                    </button>
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
<?php echo $__env->make('Adminview.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u838997326/domains/home.bright-waveholdinginc.com/public_html/BB/resources/views/Adminview/admin_dashboard.blade.php ENDPATH**/ ?>