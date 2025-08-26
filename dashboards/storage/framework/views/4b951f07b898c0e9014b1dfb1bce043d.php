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

<div class="container py-5 h-100">
   <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
         <div class="card rounded-3 text-black">
            <div class="row g-0">
               <div class="col-lg-6">
                  <div class="card-body p-md-5 mx-md-4">
                     <div class="text-center">
                        <!--<img src="<?php echo e(asset('assets/images/bit-blockdigital_images/logomain.png')); ?>"-->
                           style="width: 185px;" alt="logo">
                        
                     </div>
                     <?php if(session('success')): ?>
                     <div class="alert alert-success">
                        <?php echo e(session('success')); ?>

                     </div>
                     <?php endif; ?>
                     <?php if($errors->any()): ?>
                     <div class="alert alert-danger">
                        <ul>
                           <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <li><?php echo e($error); ?></li>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                     </div>
                     <?php endif; ?>
                     <form action="<?php echo e(route('reset_password_user')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="token" value="<?php echo e($token); ?>">
                        <p>Reset Password</p>
                        <div class="form-outline mb-4">
                           <label class="form-label" for="form2Example22">New Password</label>
                           <div class="input-group">
                             <input type="password" id="new_password" name="password" class="form-control" value="<?php echo e(old('email')); ?>"/>
                             <div class="input-group-append">
                               <span class="input-group-text" onclick="togglePasswordVisibility('new_password')">
                                 <i class="fa fa-eye" id="toggleNewPassword"></i>
                               </span>
                             </div>
                           </div>
                        </div>

                        <div class="form-outline mb-4">
                           <label class="form-label" for="form2Example22">Confirm Password</label>
                           <div class="input-group">
                              <input type="password" id="confirm_password" name="password_confirmation" class="form-control" value="<?php echo e(old('email')); ?>"/>
                              <div class="input-group-append">
                                <span class="input-group-text" onclick="togglePasswordVisibility('confirm_password')">
                                  <i class="fa fa-eye" id="toggleConfirmPassword"></i>
                                </span>
                              </div>
                           </div>
                        </div>

                        <script>
                           function togglePasswordVisibility(fieldId) {
                             var field = document.getElementById(fieldId);
                             var icon = field.nextElementSibling.querySelector('i');
                             if (field.type === "password") {
                               field.type = "text";
                               icon.classList.remove('fa-eye');
                               icon.classList.add('fa-eye-slash');
                             } else {
                               field.type = "password";
                               icon.classList.remove('fa-eye-slash');
                               icon.classList.add('fa-eye');
                             }
                           }
                        </script>


                        <input type="submit" value="Get Started" class="btn btn-outline-danger">
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('unauth.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u838997326/domains/trade.bright-waveholdinginc.com/public_html/NN/resources/views/unauth/reset_password_form.blade.php ENDPATH**/ ?>