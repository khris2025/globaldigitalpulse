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
               <h4 class="mb-sm-0 font-size-18">Manage Website</h4>
               <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                     <li class="breadcrumb-item active">Manage Website</li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12 col-sm-12 mt-4">
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title">Payment Wallet Addresses</h5>
               </div>
               <div class="card-body">
                  <form method="post" action="<?php echo e(route('update_address')); ?>">
                     <?php echo csrf_field(); ?>
                     <div class="form-row">
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label class="text-secondary">BTC Address (Network ~ Bitcoin)</label>
                              <input type="text" name="btc_address_bitcoin" class="form-control" value="<?php echo e($adminWallet->btc_address_bitcoin); ?>" >
                           </div>
                           <div class="form-group col-md-6 ">
                              <label class="text-secondary">USDT Address (Network ~ ERC20)</label>
                              <input type="text" name="usdt_address_erc20" class="form-control" value="<?php echo e($adminWallet->usdt_address_erc20); ?>">
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label class="text-secondary">Ethereum Address (Network ~ ERC20)</label>
                              <input type="text" name="eth_address_erc20" class="form-control" value="<?php echo e($adminWallet->eth_address_erc20); ?>" >
                           </div>
                           <div class="form-group col-md-6">
                              <label class="text-secondary">Ethereum Address (Network ~ BEP20)</label>
                              <input type="text" name="eth_address_bep20" class="form-control" value="<?php echo e($adminWallet->eth_address_bep20); ?>">
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label class="text-secondary">USDT Address (Network ~ TRC20)</label>
                              <input type="text" name="usdt_address_trc20" class="form-control" value="<?php echo e($adminWallet->usdt_address_trc20); ?>" >
                           </div>
                           <div class="form-group col-md-6">
                              <label class="text-secondary">USDT Address (Network ~ BEP20)</label>
                              <input type="text" name="usdt_address_bep20" class="form-control" value="<?php echo e($adminWallet->usdt_address_bep20); ?>">
                           </div>
                        </div>
                        
                     </div>
                     <div class=" mt-3">
                        <button type="submit" name="" class="btn btn-primary">Update</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>





      <div class="row">
         <div class="col-lg-12 col-sm-12 mt-4">
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title">Phrase Setting</h5>
               </div>
               <div class="card-body">
                  <form method="post" action="<?php echo e(route('wallet_earn')); ?>">
                     <?php echo csrf_field(); ?>
                     <div class="form-row">
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label class="text-secondary">Minimum Amount Required</label>
                              <input type="number" name="min_amount_req" class="form-control" value="<?php echo e($adminWallet->Phrase_min_amount); ?>" >
                           </div>
                           <div class="form-group col-md-6">
                              <label class="text-secondary">Daily Earning Amount</label>
                              <input type="number" name="daily_earning_amount" class="form-control" value="<?php echo e($adminWallet->daily_earning); ?>">
                           </div>
                        </div>
                     </div>
                     <div class=" mt-3">
                        <button type="submit" name="" class="btn btn-primary">Update</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>





      <div class="row">
         <div class="col-lg-12 col-sm-12 mt-4">
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title">Payment Wallet QR Codes</h5>
               </div>
               <div class="card-body">
                  <div class="row">
                     
                     <form method="post" action="<?php echo e(route('upload_qr')); ?>" enctype="multipart/form-data" class="ml-2 col-lg-5">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="form_type" value="btc_address_bitcoin_qr">
                        <div class="form-row">
                           <div class="mb-2" style="text-align: center; margin-top: 1%;" id="circle"> 
                              <?php if($adminWallet->btc_address_bitcoin_qr): ?>
                              <img id="blah" src="<?php echo e(url('storage/qr_images/' . $adminWallet->btc_address_bitcoin_qr)); ?>" style="border-radius: 10%;  height: 150px;" alt="your image" />  
                              <?php endif; ?> 
                           </div>
                           <div class="input-group col-lg-12 row">
                              <div class="custom-file">
                                 <input type="file" class="form-control" required="" name="qr_code">
                              </div>
                           </div>
                        </div>
                        <button type="submit" name="btc_address_bitcoin_qr" class="btn btn-primary mt-1">Update BTC QR (BTC)</button>
                     </form>
                     
                     <!--<form method="post" action="<?php echo e(route('upload_qr')); ?>" enctype="multipart/form-data" class="ml-2 col-lg-5">-->
                     <!--   <?php echo csrf_field(); ?>-->
                     <!--   <input type="hidden" name="form_type" value="btc_address_bep20_qr">-->
                     <!--   <div class="form-row">-->
                     <!--      <div class="mb-2" style="text-align: center; margin-top: 1%;" id="circle"> -->
                     <!--         <?php if($adminWallet->btc_address_bep20_qr): ?>-->
                     <!--         <img id="blah" src="<?php echo e(url('storage/qr_images/' . $adminWallet->btc_address_bep20_qr)); ?>" style="border-radius: 10%;  height: 150px;" alt="your image" />  -->
                     <!--         <?php endif; ?> -->
                     <!--      </div>-->
                     <!--      <div class="input-group col-lg-12 row">-->
                     <!--         <div class="custom-file">-->
                     <!--            <input type="file" class="form-control" required="" name="qr_code">-->
                     <!--         </div>-->
                     <!--      </div>-->
                     <!--   </div>-->
                     <!--   <button type="submit" name="btc_address_bep20_qr" class="btn btn-primary mt-1">Update BTC QR (BEP20)</button>-->
                     <!--</form>-->
                     
                     <form method="post" action="<?php echo e(route('upload_qr')); ?>" enctype="multipart/form-data" class="ml-2 col-lg-5">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="form_type" value="eth_address_erc20_qr">
                        <div class="form-row">
                           <div class="mb-2" style="text-align: center; margin-top: 1%;" id="circle"> 
                              <?php if($adminWallet->eth_address_erc20_qr): ?>
                              <img id="blah" src="<?php echo e(url('storage/qr_images/' . $adminWallet->eth_address_erc20_qr)); ?>" style="border-radius: 10%;  height: 150px;" alt="your image" />  
                              <?php endif; ?> 
                           </div>
                           <div class="input-group col-lg-12 row">
                              <div class="custom-file">
                                 <input type="file" class="form-control" required="" name="qr_code">
                              </div>
                           </div>
                        </div>
                        <button type="submit" name="eth_address_erc20_qr" class="btn btn-primary mt-1">Update ETH QR (ERC20)</button>
                     </form>
                     
                     <form method="post" action="<?php echo e(route('upload_qr')); ?>" enctype="multipart/form-data" class="ml-2 col-lg-5">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="form_type" value="eth_address_bep20_qr">
                        <div class="form-row">
                           <div class="mb-2" style="text-align: center; margin-top: 1%;" id="circle"> 
                              <?php if($adminWallet->eth_address_bep20_qr): ?>
                              <img id="blah" src="<?php echo e(url('storage/qr_images/' . $adminWallet->eth_address_bep20_qr)); ?>" style="border-radius: 10%;  height: 150px;" alt="your image" />  
                              <?php endif; ?> 
                           </div>
                           <div class="input-group col-lg-12 row">
                              <div class="custom-file">
                                 <input type="file" class="form-control" required="" name="qr_code">
                              </div>
                           </div>
                        </div>
                        <button type="submit" name="eth_address_bep20_qr" class="btn btn-primary mt-1">Update ETH QR (BEP20)</button>
                     </form>
                     
                     <form method="post" action="<?php echo e(route('upload_qr')); ?>" enctype="multipart/form-data" class="ml-2 col-lg-5">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="form_type" value="usdt_address_trc20_qr">
                        <div class="form-row">
                           <div class="mb-2" style="text-align: center; margin-top: 1%;" id="circle"> 
                              <?php if($adminWallet->usdt_address_trc20_qr): ?>
                              <img id="blah" src="<?php echo e(url('storage/qr_images/' . $adminWallet->usdt_address_trc20_qr)); ?>" style="border-radius: 10%;  height: 150px;" alt="your image" />  
                              <?php endif; ?> 
                           </div>
                           <div class="input-group col-lg-12 row">
                              <div class="custom-file">
                                 <input type="file" class="form-control" required="" name="qr_code">
                              </div>
                           </div>
                        </div>
                        <button type="submit" name="usdt_address_trc20_qr" class="btn btn-primary mt-1">Update USDT QR (TRC20)</button>
                     </form>
                     
                     <form method="post" action="<?php echo e(route('upload_qr')); ?>" enctype="multipart/form-data" class="ml-2 col-lg-5">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="form_type" value="usdt_address_bep20_qr">
                        <div class="form-row">
                           <div class="mb-2" style="text-align: center; margin-top: 1%;" id="circle"> 
                              <?php if($adminWallet->usdt_address_bep20_qr): ?>
                              <img id="blah" src="<?php echo e(url('storage/qr_images/' . $adminWallet->usdt_address_bep20_qr)); ?>" style="border-radius: 10%;  height: 150px;" alt="your image" />  
                              <?php endif; ?> 
                           </div>
                           <div class="input-group col-lg-12 row">
                              <div class="custom-file">
                                 <input type="file" class="form-control" required="" name="qr_code">
                              </div>
                           </div>
                        </div>
                        <button type="submit" name="usdt_address_bep20_qr" class="btn btn-primary mt-1">Update USDT QR (BEP20)</button>
                     </form>
                     
                     <form method="post" action="<?php echo e(route('upload_qr')); ?>" enctype="multipart/form-data" class="ml-2 col-lg-5">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="form_type" value="usdt_address_erc20_qr">
                        <div class="form-row">
                           <div class="mb-2" style="text-align: center; margin-top: 1%;" id="circle"> 
                              <?php if($adminWallet->usdt_address_erc20_qr): ?>
                              <img id="blah" src="<?php echo e(url('storage/qr_images/' . $adminWallet->usdt_address_erc20_qr)); ?>" style="border-radius: 10%;  height: 150px;" alt="your image" />  
                              <?php endif; ?> 
                           </div>
                           <div class="input-group col-lg-12 row">
                              <div class="custom-file">
                                 <input type="file" class="form-control" required="" name="qr_code">
                              </div>
                           </div>
                        </div>
                        <button type="submit" name="usdt_address_erc20_qr" class="btn btn-primary mt-1">Update USDT QR (ERC20)</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Adminview.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u897955046/domains/global-digitalholdings.com/public_html/dashboard/resources/views/Adminview/manage_website.blade.php ENDPATH**/ ?>