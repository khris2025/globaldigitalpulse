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
               <h4 class="mb-sm-0 font-size-18">Manage Mining Plans</h4>
               <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                     <li class="breadcrumb-item active">Manage Mining Plans</li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <form action="<?php echo e(route('miningplans.store')); ?>" method="POST" enctype="multipart/form-data">
               <?php echo csrf_field(); ?>
               <div class="mb-3">
                  <label for="plan_name" class="form-label">Plan Name</label>
                  <input type="text" class="form-control" id="plan_name" name="plan_name" required>
               </div>
               <div class="mb-3">
                  <label for="plan_amount_min" class="form-label">Plan Amount (Min)</label>
                  <input type="number" class="form-control" id="plan_amount_min" name="plan_amount_min" required>
               </div>
               <div class="mb-3">
                  <label for="plan_amount_max" class="form-label">Plan Amount (Max)</label>
                  <input type="number" class="form-control" id="plan_amount_max" name="plan_amount_max" required>
               </div>
               <div class="mb-3">
                  <label for="plan_roi" class="form-label">ROI</label>
                  <input type="number" class="form-control" id="plan_roi" name="plan_roi" required>
               </div>
               <div class="mb-3">
                  <label for="plan_duration" class="form-label">Duration (Days)</label>
                  <input type="number" class="form-control" id="plan_duration" name="plan_duration" required>
               </div>
               <div class="mb-3">
                  <label for="Coin_img" class="form-label">Coin Image</label>
                  <input type="file" class="form-control" id="Coin_img" name="Coin_img" accept="image/*">
               </div>
               <button type="submit" class="btn btn-primary">Add Plan</button>
            </form>
         </div>
      </div>
      <div class="table-responsive">
         <table class="table">
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Amount Min ($)</th>
                  <th>Amount Max ($)</th>
                  <th>Duration (Days)</th>
                  <th>ROI (%)</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody>
               <?php $__currentLoopData = $miningPlans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <tr>
                  <td><?php echo e($plan->name); ?></td>
                  <td><?php echo e($plan->min_amount); ?></td>
                  <td><?php echo e($plan->max_amount); ?></td>
                  <td><?php echo e($plan->duration); ?></td>
                  <td><?php echo e($plan->roi); ?></td>
                  <td>
                     

                     <!-- Form for deleting a plan -->
                     <form action="<?php echo e(route('miningplans.destroy', $plan->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?> <!-- This is crucial to send a DELETE request -->
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this plan?')">Delete</button>
                     </form>
                  </td>
               </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Adminview.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/gibsonjohn/Downloads/dashboard/resources/views/Adminview/manage_mining.blade.php ENDPATH**/ ?>