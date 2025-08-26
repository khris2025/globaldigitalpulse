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
               <h4 class="mb-sm-0 font-size-18">Manage Signals</h4>
               <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                     <li class="breadcrumb-item active">Manage Signals</li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <form action="<?php echo e(route('signals.create')); ?>" method="POST">
               <?php echo csrf_field(); ?>
               <div class="mb-3">
                  <label for="signal_name" class="form-label">Signal Name</label>
                  <input type="text" class="form-control" id="signal_name" name="signal_name" required>
               </div>
               <div class="mb-3">
                  <label for="signal_amount" class="form-label">Signal Amount</label>
                  <input type="number" class="form-control" id="signal_amount" name="signal_amount" required>
               </div>
               <div class="mb-3">
                  <label for="percentage" class="form-label">Percentage</label>
                  <input type="number" class="form-control" id="percentage" name="percentage" required>
               </div>
               <button type="submit" class="btn btn-primary">Add Signal</button>
            </form>
         </div>
      </div>
      <div class="table-responsive">
         <table class="table">
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Amount ($)</th>
                  <th>Percentage (%)</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody>
               <?php $__currentLoopData = $signals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $signal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                     <td><?php echo e($signal->name); ?></td>
                     <td><?php echo e($signal->amount); ?></td>
                     <td><?php echo e($signal->percentage); ?>%</td>
                     <td>
                        <!-- Edit Button -->
                        <a href="<?php echo e(route('signal.edit', $signal->id)); ?>" class="btn btn-primary btn-sm">Edit</a>
                        <!-- Delete Button -->
                        <form action="<?php echo e(route('signal.destroy', $signal->id)); ?>" method="POST" style="display:inline;">
                           <?php echo csrf_field(); ?>
                           <?php echo method_field('DELETE'); ?> <!-- This is crucial to send a DELETE request -->
                           <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this signal?')">Delete</button>
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
<?php echo $__env->make('Adminview.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u897955046/domains/global-digitalholdings.com/public_html/dashboard/resources/views/Adminview/manage_signals.blade.php ENDPATH**/ ?>