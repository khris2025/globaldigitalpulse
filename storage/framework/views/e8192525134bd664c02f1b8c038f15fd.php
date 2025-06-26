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
                  <h4 class="mb-sm-0 font-size-18">Deposit-Payment</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                        <li class="breadcrumb-item active">Deposit-Payment</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-5 col-lg-5">
               <div class="card">
                  <div class="card-header border-0 pb-0">
                     <h2 class="card-title">Payment</h2>
                  </div>
                  <div class="card-body pb-0 text-center">
                     <p>You are about to deposit <code>$<?php echo e(number_format($deposit->amount)); ?></code> into your Wallet</p>
                     <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex px-0 justify-content-between">
                           <strong>Trans. ID</strong>
                           <span class="mb-0"><?php echo e($deposit->transid); ?></span>
                        </li>
                        <li class="list-group-item d-flex px-0 justify-content-between">
                           <strong>Date/Time</strong>
                           <span class="mb-0"><?php echo e($deposit->dateadd->format('F j, Y g:i A')); ?></span>
                        </li>
                        <li class="list-group-item d-flex px-0 justify-content-between">
                           <strong>Amount to deposit</strong>
                           <span class="mb-0">$ <?php echo e(number_format($deposit->amount)); ?> </span>
                        </li>
                     </ul>
                  </div>
                  <div class="card-footer pt-3 pb-3 text-center">
                     <span class="text-primary"><i class="fa fa-exclamation-circle"> </i> Please Review the Information and Confirm</span>
                     <div class="row text-center">
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-7">
               <div class="card">
                  <div class="card-header">
                     <h4 class="card-title">Deposit-Payment</h4>
                  </div>
                  <div class="card-body">
                     <div>
                        <div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="text-center">
                                    <h3 class="card-text "></h3>
                                    <p class="card-text">ADDRESS</p>
                                    <div class="mb-2" style="text-align: center; margin-top: 1%;" id="circle">   <img src="<?php echo e(url('storage/qr_images/' . $qr)); ?>" style="border-radius: 10%;  height: 150px;" alt="qrcode" />  </div>
                                    <br>
                                    <form action="<?php echo e(route('upload_proof',  ['id' => $deposit->id])); ?>" method="post" enctype="multipart/form-data">
                                       <?php echo csrf_field(); ?>
                                       <!--<div class="input-group mb-3 input-warning-o">-->
                                       <!--   <div class="input-group-prepend">-->
                                       <!--      <span class="input-group-text">₿</span>-->
                                       <!--   </div>-->
                                       <!--   <input type="text" class="form-control" id="copy" value="<?php echo e($walletAddress); ?>"> <button type="button" onclick="myFunction()" class="btn btn-success">Copy </button>-->
                                       <!--</div>-->
                                       <div class="input-group mb-3 input-warning-o">
                                           <div class="input-group-prepend">
                                              <span class="input-group-text">₿</span>
                                           </div>
                                           <input type="text" class="form-control" id="copy" value="<?php echo e($walletAddress); ?>">
                                           <button type="button" onclick="myFunction()" class="btn btn-success" id="copyButton">Copy</button>
                                        </div>
                                        
                                        <script>
                                        function myFunction() {
                                           // Get the text field
                                           var copyText = document.getElementById("copy");
                                           
                                           // Select the text field
                                           copyText.select();
                                           copyText.setSelectionRange(0, 99999); // For mobile devices
                                           
                                           // Copy the text inside the text field
                                           navigator.clipboard.writeText(copyText.value).then(function() {
                                               alert("Copied the text: " + copyText.value);
                                           }).catch(function(error) {
                                               alert("Failed to copy text: " + error);
                                           });
                                        }
                                        </script>

                                       <?php if($deposit->status == 'unconfirmed' || $deposit->status == 'canceled'): ?>
                                          <div class="mb-4" style="text-align: center;" id="circle">
                                             <br>
                                             <?php if($deposit->proof): ?>
                                             <img id="blah" src="<?php echo e(url('storage/proof_images/' .$deposit->proof)); ?>" style="border-radius: 10%;  height: 150px;" alt="Uploaded Image">
                                             <?php endif; ?>
                                          </div>
                                          <div class="mb-3 d-grid gap-2">
                                             <button type="submit" disabled class="btn btn-primary waves-effect btn-label waves-light">
                                             <i class="bx bx-hourglass bx-spin font-size-16 align-middle me-2"></i>
                                             AWAITING CONFIRMATION
                                             </button>
                                          </div>
                                          <?php else: ?>
                                          <p class="card-text">Upload Payment Proof (Screenshot)</p>
                                          <div class="input-group mb-3 row">
                                             <div class="custom-file">
                                                <input type="file" class="form-control" name="proof_image">
                                             </div>
                                          </div>
                                          <div class="mb-3 d-grid gap-2">
                                             <button type="submit" name="sub-depo" class="btn btn-success waves-effect btn-label waves-light">
                                             <i class="bx bx-check-double label-icon"></i>
                                             PAID 
                                             </button>
                                          </div>
                                       <?php endif; ?>
                                    </form>
                                 </div>
                                 <div class="card-footer">
                                    <ul>
                                       <li>
                                          <p class="card-text text-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"> </i> Be aware of that this order will be cancelled, if you send any other BTC amount.</p>
                                       </li>
                                       <li>
                                          <p class="card-text text-primary"><i class="fa fa-exclamation-circle" aria-hidden="true"> </i> Account will credited once we received your payment.</p>
                                       </li>
                                    </ul>
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
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Userview.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u838997326/domains/trade.bright-waveholdinginc.com/public_html/NN/resources/views/Adminview/02.blade.php ENDPATH**/ ?>