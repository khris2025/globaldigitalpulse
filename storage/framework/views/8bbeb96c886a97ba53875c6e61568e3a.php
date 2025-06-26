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


<style>
   .card {
      border: none;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
   }

   .card-body {
      padding: 2rem;
   }

   .profile-image {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      margin: 0 auto 1rem;
      display: block;
   }

   .card-title {
      font-weight: bold;
      text-align: center;
      margin-bottom: 1.5rem;
   }

   .info-item {
      margin-bottom: 0.75rem;
   }

   .rating i {
      color: gold;
   }

   .copy-expert {
      background-color: #28a745; /* Green */
      color: white;
      text-align: center;
      padding: 0.75rem;
      border-radius: 5px;
      margin-top: 1rem;
      cursor: pointer;
   }

   .pro-badge {
      position: absolute;
      top: 10px;
      left: 10px;
      background-color: gold; /* Or any color you prefer */
      color: black;
      padding: 5px 10px;
      border-radius: 5px;
      font-weight: bold;
      font-size: small; /* Adjust size as needed */
   }
</style>


<div class="main-content">
   <div class="page-content">






      <div class="row">
         <?php $__currentLoopData = $traders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trader): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="container mt-5">
            <div class="col-md-4">
               <div class="card">
                  <span class="pro-badge">PRO</span>
                  <div class="card-body">
                     <img
                        src="<?php echo e(asset('storage/traders_image/' . $trader->tradersimg)); ?>"
                        alt="Profile"
                        class="profile-image"
                        />
                     <h5 class="card-title"><?php echo e($trader->tradersname); ?></h5>
                     <div class="info-item">
                        <span>Followers</span>
                        <span class="float-end"><?php echo e(number_format($trader->followers)); ?></span>
                     </div>
                     
                     <div class="info-item">
                        <span>Profit Share:</span>
                        <span class="float-end"><?php echo e($trader->profitshare); ?>%</span>
                     </div>
                     <div class="info-item">
                        <span>Profit Share:</span>
                        <span class="float-end">Return Rate: <?php echo e($trader->return_rate); ?>%</span>
                     </div>
                     
                     <div class="rating info-item">
                        Rating:
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                     </div>
                     <div class="copy-expert" data-bs-toggle="modal" data-bs-target="#staticBackdrop" disabled>Copy Expert</div>
                  </div>
               </div>
            </div>
         </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>



      

     




      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <form action="<?php echo e(route('copy_payment')); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <div class="modal-header">
                     <h5 class="modal-title" id="staticBackdropLabel">Copy this trader?</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="col-lg-12">
                        <div class="row">
                           <div class="col-lg-12 mb-3">
                                <div class="alert alert-info" role="alert">
                                    <strong>Important:</strong> Copying this trader would attract a payment of $500.
                                </div>

                                <div class="form-floating ">
                                    <select required id="floatingInput" name="ptype"  class="form-select">
                                        <option value >Select Payment Method </option>
                                        <option value="walletbalance">Wallet Balance</option>
                                    </select>
                                </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                     <button type="submit" name="sub-upd" class="btn btn-primary">Proceed to payment</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Userview.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u838997326/domains/trade.bright-waveholdinginc.com/public_html/NN/resources/views/Userview/copy_trading.blade.php ENDPATH**/ ?>