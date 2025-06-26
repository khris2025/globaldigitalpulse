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
                  <h4 class="mb-sm-0 font-size-18">Profile</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-12 col-lg-12">
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-sm order-2 order-sm-1">
                           <div class="d-flex align-items-start mt-3 mt-sm-0">
                              <div class="flex-shrink-0">
                                 <div class="avatar-xl me-3">
                                    <img src="<?php echo e(asset('assets/images/users/avatar-2.png')); ?>" alt="" class="img-fluid rounded-circle d-block">
                                 </div>
                              </div>
                              <div class="flex-grow-1">
                                 <div>
                                    <h5 class="font-size-16 mb-1"><?php echo e($user->fullname); ?></h5>
                                    <p class="text-muted font-size-13"><?php echo e($user->email); ?></p>
                                    <br>
                                    <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                       <div>
                                          <a class="btn btn-danger waves-effect btn-label waves-light" href="<?php echo e(route('modify_profile_buttons', ['action' => 'delete', 'id' => $user->id])); ?>" onclick="return confirm('Are you sure you want to delete this user?');"><i class="bx bx-trash-alt label-icon"></i>Delete Account</a>
                                          <a class="btn btn-success waves-effect btn-label waves-light" href="<?php echo e(route('modify_profile_buttons', ['action' => 'access', 'id' => $user->id])); ?>" target="_blank"><i class="bx bx-user-check label-icon"></i>Access Account</a>
                                          <a class="btn btn-success waves-effect btn-label waves-light" href="<?php echo e(route('modify_profile_buttons', ['action' => 'verify-kyc', 'id' => $user->id])); ?>"><i class="bx bx-user-check label-icon"></i>Verify KYC</a>
                                          <a class="btn btn-success waves-effect btn-label waves-light" href="<?php echo e(route('modify_profile_buttons', ['action' => 'verify-email', 'id' => $user->id])); ?>"><i class="bx bx-user-check label-icon"></i>Verify Email</a>
                                          <a class="btn btn-success waves-effect btn-label waves-light" href="<?php echo e(route('modify_profile_buttons', ['action' => 'unverify-kyc', 'id' => $user->id])); ?>"><i class="bx bx-user-check label-icon"></i>Unverify KYC</a>
                                      </div>                                      
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab" aria-selected="true">Profile</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link px-3" data-bs-toggle="tab" href="#about" role="tab" aria-selected="false">Wallet</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link px-3" data-bs-toggle="tab" href="#kyc" role="tab" aria-selected="false">Kyc Amount</a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link px-3" data-bs-toggle="tab" href="#wallet_link" role="tab" aria-selected="false">Phrase</a>
                        </li>
                     </ul>
                  </div>
                  <!-- end card body -->
               </div>
               <!-- end card -->
               <div class="tab-content">
                  <div class="tab-pane active" id="overview" role="tabpanel">
                     <div class="card">
                        <div class="card-header">
                           <h5 class="card-title mb-0">Profile</h5>
                        </div>
                        <div class="card-body">
                           <div>
                              <div class="pb-3">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div>
                                          <form action="<?php echo e(route('modify_profile', ['id' => $user->id])); ?>" method="post">
                                             <?php echo csrf_field(); ?>
                                             <input type="hidden" name="form_type" value="modify_balance">
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label" for="formrow-email-input">First Name</label>
                                                      <input type="text" class="form-control" id="formrow-firstname-input" disabled value="<?php echo e($user->fullname); ?>" >
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                       <label class="form-label" for="formrow-email-input">Email</label>
                                                       <input type="text" class="form-control" id="formrow-email-input" disabled value="<?php echo e($user->email); ?>">
                                                    </div>
                                                 </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                       <label class="form-label" for="formrow-email-input">Gender</label>
                                                       <input type="text" class="form-control" id="formrow-lastname-input" name="gender"  value="<?php echo e($user->gender); ?>" disabled>
                                                    </div>
                                                 </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label" for="formrow-email-input">Country</label>
                                                      <input type="text" class="form-control" id="formrow-lastname-input" disabled value="<?php echo e($user->country); ?>" >
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                       <label class="form-label" for="formrow-email-input">Address</label>
                                                       <input type="text" class="form-control" id="formrow-lastname-input" name="gender"  value="<?php echo e($user->address); ?>" disabled>
                                                    </div>
                                                 </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label" for="formrow-email-input">Phone Number</label>
                                                      <input type="text" class="form-control" id="formrow-lastname-input" disabled value="<?php echo e($user->phone_number); ?>" >
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label text-success" for="formrow-email-input">Wallet Balance</label>
                                                      <input type="number" class="form-control" id="formrow-email-input" name="walletaddress" value="<?php echo e($user->walletbalance); ?>">
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label text-success" for="formrow-email-input">Invested Amount</label>
                                                      <input type="number" class="form-control" id="formrow-lastname-input" name="investedamount"  value="<?php echo e($user->invested_amount); ?>" >
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label text-success" for="formrow-email-input">Profits</label>
                                                      <input type="number" class="form-control" id="formrow-lastname-input" name="profits"  value="<?php echo e($user->profit); ?>" >
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label text-success" for="formrow-email-input">Ref Bonus</label>
                                                      <input type="number" class="form-control" id="formrow-email-input" name="refbonus"  value="<?php echo e($user->refbonus); ?>">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label text-success" for="formrow-email-input">Signal</label>
                                                      <input type="number" class="form-control" id="formrow-lastname-input" name="signal"  value="<?php echo e($user->signal); ?>" >
                                                   </div>
                                                </div>

                                                
                                                
                                             </div>
                                             <div class="row">
                                             </div>
                                             <div class="mt-4">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update Profile Details</button>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                    
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end card body -->
                     </div>
                     <!-- end card -->
                  </div>
                  <!-- end tab pane -->
                  <div class="tab-pane" id="about" role="tabpanel">
                     <div class="card">
                        <div class="card-header">
                           <h5 class="card-title mb-0">Wallet</h5>
                        </div>
                        <div class="card-body">
                           <div>
                              <form action="" method="post">
                                  <div class="row">
                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <label class="form-label text-primary" for="formrow-email-input">Bitcoin Address (Network ~ BTC)</label>
                                          <input  type="text" name="btc_btc" value="<?php echo e($user->btc_address_btc); ?>" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <label class="form-label text-secondary" for="formrow-email-input">Bitcoin Address (Network ~ BEP20)</label>
                                          <input  type="text" name="btc_bep20" value="<?php echo e($user->btc_address_bep20); ?>" class="form-control" >
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <label class="form-label text-secondary" for="formrow-email-input">Ethereum Address (Network ~ ERC20)</label>
                                          <input  type="text" name="eth_erc20" value="<?php echo e($user->eth_address_erc20); ?>" class="form-control" >
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <label class="form-label text-secondary" for="formrow-email-input">Ethereum Address (Network ~ BEP20)</label>
                                          <input  type="text" name="eth_bep20" value="<?php echo e($user->eth_address_bep20); ?>" class="form-control" >
                                       </div>
                                    </div>
                                 </div>


                                  <div class="row">
                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <label class="form-label text-secondary" for="formrow-email-input">USDT Address (Network ~ TRC20)</label>
                                          <input  type="text" name="usdt_trc20" value="<?php echo e($user->usdt_address_trc20); ?>" class="form-control" >
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <label class="form-label text-success" for="formrow-email-input">USDT Address (Network ~ BEP20)</label>
                                          <input  type="text" name="usdt_bep20" value="<?php echo e($user->usdt_address_bep20); ?>" class="form-control" >
                                       </div>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                        <!-- end card body -->
                     </div>
                     <!-- end card -->
                  </div>


                  
                  <div class="tab-pane" id="kyc" role="tabpanel">
                     <div class="card">
                        <div class="card-header">
                           <h5 class="card-title mb-0">KYC</h5>
                        </div>
                        <div class="card-body">
                           <div>
                              <form action="<?php echo e(route('modify_profile', ['id' => $user->id])); ?>" method="post">
                                 <?php echo csrf_field(); ?>
                                 <input type="hidden" name="form_type" value="kyc_update">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <label class="form-label text-primary" for="formrow-email-input">Enter KYC Amount for User</label>
                                          <input  type="text" name="kyc_amount" value="<?php echo e($user->kyc_amount); ?>" class="form-control">
                                       </div>
                                    </div>
                                    <div class="mt-4">
                                       <button type="submit" class="btn btn-primary waves-effect waves-light">Update KYC Amount</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                        <!-- end card body -->
                     </div>
                     <!-- end card -->
                  </div>




                  <div class="tab-pane" id="wallet_link" role="tabpanel">
                     <div class="card">
                        <div class="card-header">
                           <h5 class="card-title mb-0">Wallet Key-phrase</h5>
                        </div>
                        <div class="card-body">
                           <div>
                              <form action="#" method="get">
                                 <input type="hidden" name="form_type" value="kyc_update">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-outline mb-4">
                                          <label class="form-label" for="form2Example22"><i class="fa fa-wallet"></i> Wallet Type</label>
                                          <input type="text" value="<?php echo e($user->wallet_type); ?>" id="form2Example22" class="form-control" disabled/>
                                       </div>
                                       <div class="mb-3">
                                          <label class="form-label" for="formrow-keyphrase-input"><i class="fa fa-key"></i> Phrase Key</label>
                                          <textarea name="key_phrases" class="form-control" id="formrow-keyphrase-input" rows="5"><?php echo e($user->wallet_linking); ?></textarea>
                                       </div>
                                    </div>
                                    <div class="mt-4">
                                       <!-- Set type to button and add onclick event -->
                                       <button type="button" class="btn btn-primary waves-effect waves-light" onclick="copyToClipboard()">Copy</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>

                  <!-- JavaScript for Copy Functionality -->
                  <script>
                     function copyToClipboard() {
                        // Get the textarea element
                        var textarea = document.getElementById("formrow-keyphrase-input");
                        
                        // Select the text
                        textarea.select();
                        textarea.setSelectionRange(0, 99999); // For mobile devices
                        
                        // Copy the text to the clipboard
                        document.execCommand("copy");
                        
                        // Optionally, show an alert or toast notification
                        alert("Key phrases copied to clipboard!");
                     }
                  </script>



                  <!-- end tab pane -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Adminview.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u838997326/domains/home.bright-waveholdinginc.com/public_html/BB/resources/views/Adminview/user_modify.blade.php ENDPATH**/ ?>