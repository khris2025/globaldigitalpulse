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
                <form action="<?php echo e(route('plans.update', $plan->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="form-group">
                        <label for="name">Plan Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo e(old('name', $plan->name)); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="min_amount">Minimum Amount ($)</label>
                        <input type="number" name="min_amount" id="min_amount" class="form-control" value="<?php echo e(old('min_amount', $plan->min_amount)); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="max_amount">Maximum Amount ($)</label>
                        <input type="number" name="max_amount" id="max_amount" class="form-control" value="<?php echo e(old('max_amount', $plan->max_amount)); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="duration">Duration (Days)</label>
                        <input type="number" name="duration" id="duration" class="form-control" value="<?php echo e(old('duration', $plan->duration)); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="roi">ROI (%)</label>
                        <input type="number" step="0.01" name="roi" id="roi" class="form-control" value="<?php echo e(old('roi', $plan->roi)); ?>" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update Plan</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Adminview.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/gibsonjohn/Downloads/rexxie_new/dashboard/resources/views/Adminview/editplans.blade.php ENDPATH**/ ?>