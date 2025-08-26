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


<div id="layout-wrapper">
   <!-- Left Sidebar End -->
   <!-- ============================================================== -->
   <!-- Start right Content here -->
   <!-- ============================================================== -->
   <div class="main-content">
      <div class="page-content">
         <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
               <div class="col-12">
                  <div class="row" style="margin-bottom: 10px">
                      <h4 class="mb-sm-0 ">Welcome, <?php echo e($user->username); ?>

                      <?php if(Auth::user()->account_type == 'joint'): ?>
                        and <?php echo e($user->username2); ?>

                      <?php endif; ?>  
                     
                        <?php if(Auth::user()->kyc_verify == 'no'): ?>
                           <button type="button" class="btn btn-warning btn-sm">
                              <i class="fa fa-exclamation-circle"></i> Account Not Verified
                           </button>
                        <?php endif; ?>  
                     </h4> 
                    
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
               </div>
            </div>

            <div class="row">
               <div class="col-md-6 col-sm-12">
                  <div class="card card-h-100 text-white" style="height: 170px; background-color: #111a30; padding: 10px;">
                     <!-- Card body -->
                     <div class="card-body d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
                        <div class="mb-1">
                           <h2 style="margin: 0; color: white">$<?php echo e(number_format(Auth::user()->walletbalance)); ?></h2>
                        </div>
                        <p style="margin: 0; color: rgb(199, 210, 227);">Trading Balance</p>

                        <!-- Progress Bar -->
                        
                        <div class="progress" style="width: 100%; margin-top: 15px; height: 8px; border-radius: 5px;">
                           <div class="progress-bar" role="progressbar" 
                                 style="width: <?php echo e(Auth::user()->signal); ?>%; background-color: #36ADCD;" 
                                 aria-valuenow="<?php echo e(Auth::user()->signal); ?>" 
                                 aria-valuemin="0" 
                                 aria-valuemax="100">
                           </div>
                        </div>

                        <p style="margin: 0; color: rgb(199, 210, 227);">Signal Strength</p>
                     </div>
                  </div>
                  <!-- Icons Section -->
                  <div class="row text-center mt-3 mb-5">
                    <div class="col-4">
                        <a href="<?php echo e(route('deposit')); ?>">
                            <i class="fa fa-download" style="font-size:25px; color: #36ADCD;" aria-hidden="true"></i>
                            <p style="margin-top: 8px; color: #36ADCD;">Deposit</p>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="<?php echo e(route('copy_trade')); ?>">
                            <i class="fa fa-users" style="font-size:25px; color:#36ADCD;" aria-hidden="true"></i>
                            <p style="margin-top: 8px; color: #36ADCD;">Copy Trading</p>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="<?php echo e(route('referral')); ?>">
                            <i class="fa fa-gift" style="font-size:25px; color:#36ADCD;" aria-hidden="true"></i>
                            <p style="margin-top: 8px; color: #36ADCD;">Refer and earn</p>
                        </a>
                    </div>
                </div>


                 <div class="card card-h-100 text-white" style="height: 170px; background-color: #111a30; padding: 10px;">
                     <!-- Card body -->
                     <div class="card-body d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
                        <i class="fa fa-wallet" style="font-size:30px; color:#36ADCD; margin-bottom: 10px" aria-hidden="true"></i>
                        <h5 style="margin: 0; color: rgb(199, 210, 227);">Connect Wallet</h5>
                        <p style="margin-top: 5px; color: rgb(199, 210, 227);">Earn daily <strong>$<?php echo e(number_format($phraselogs->daily_earning)); ?></strong> for connecting your wallet</p>
                        <a href="<?php echo e(route('wallet_connect')); ?>" class="btn btn-primary">
                           Connect Now <i class="fa fa-link"></i>
                        </a>
                     </div>
                  </div>

                  <div class="card">
                     <!-- TradingView Widget BEGIN -->
                     <div class="tradingview-widget-container" >
                        <div id="tradingview_9949c"  style="height: 480px;"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                        <script type="text/javascript">
                           new TradingView.widget(
                           {
                           
                           
                           "autosize": true,
                           "symbol": "BITSTAMP:BTCUSD",
                           "interval": "D",
                           "timezone": "Etc/UTC",
                           "theme": "light",
                           "style": "1",
                           "locale": "en",
                           "toolbar_bg": "#f1f3f6",
                           "enable_publishing": false,
                           "allow_symbol_change": true,
                           "container_id": "tradingview_9949c"
                           }
                           );
                        </script>
                     </div>
                     <!-- TradingView Widget END -->                       
                  </div>




               </div>

               <div class="col-md-6 col-sm-12">
                  <div class="card">
                     <!-- TradingView Widget BEGIN -->
                     <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on TradingView</span></a></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-timeline.js" async>
                           {
                           "feedMode": "all_symbols",
                           "colorTheme": "light",
                           "isTransparent": false,
                           "displayMode": "regular",
                           "width": "100%",
                           "height": 480,
                           "locale": "en"
                           }
                        </script>
                     </div>
                     <!-- TradingView Widget END -->
                  </div>


               </div>
            </div>








            
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Userview.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u838997326/domains/trade.bright-waveholdinginc.com/public_html/NN/resources/views/Userview/dashboard.blade.php ENDPATH**/ ?>