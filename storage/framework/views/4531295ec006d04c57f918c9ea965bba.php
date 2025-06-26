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
                     <h4 class="card-title mb-0 flex-grow-1">Select a suitable Mining plan</h4>
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
                     <h4 class="card-title mb-0 flex-grow-1">Active/Pending Mining</h4>
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
                     <h4 class="card-title mb-0 flex-grow-1">Mining History</h4>
                  </div>
                  <div class="card-body px-0">
                     <div class="px-3" data-simplebar style="max-height: 352px;">
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Userview.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/gibsonjohn/Downloads/dashboard/resources/views/Userview/mining.blade.php ENDPATH**/ ?>