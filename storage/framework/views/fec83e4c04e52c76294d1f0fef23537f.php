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
                        <!--   style="width: 185px;" alt="logo">-->
                        
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
                     <form action="<?php echo e(route('loginUser')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <p>Please Login your Account</p>
                        <div class="form-outline mb-4">
                           <label class="form-label" for="form2Example22">Email</label>
                           <input type="email" id="form2Example22" name="email" class="form-control" />
                        </div>
                        <div class="form-outline mb-4">
                           <label class="form-label" for="form2Example22">Password</label>
                           <div class="input-group">
                              <input type="password" name="password" id="password" class="form-control" />
                              <div class="input-group-append">
                                 <span class="input-group-text" onclick="togglePasswordVisibility()">
                                    <i class="fa fa-eye" id="togglePasswordIcon"></i>
                                 </span>
                              </div>
                           </div>
                        </div>

                        <script>
                           function togglePasswordVisibility() {
                              const passwordField = document.getElementById('password');
                              const togglePasswordIcon = document.getElementById('togglePasswordIcon');
                              if (passwordField.type === 'password') {
                                 passwordField.type = 'text';
                                 togglePasswordIcon.classList.remove('fa-eye');
                                 togglePasswordIcon.classList.add('fa-eye-slash');
                              } else {
                                 passwordField.type = 'password';
                                 togglePasswordIcon.classList.remove('fa-eye-slash');
                                 togglePasswordIcon.classList.add('fa-eye');
                              }
                           }
                        </script>
                        <a class="text-muted" href="forgot_password">Forgot password? Click Me</a>
                        <br>
                        <br>
                        
                        
                        <input type="submit" value="Login" class="btn btn-outline-danger">
                        <hr>
                        <a class="text-muted" href="register">Don't have an account? Click Me</a>
                     </form>
                  </div>
               </div>
               <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                  
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('unauth.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u838997326/domains/trade.bright-waveholdinginc.com/public_html/NN/resources/views/unauth/login.blade.php ENDPATH**/ ?>