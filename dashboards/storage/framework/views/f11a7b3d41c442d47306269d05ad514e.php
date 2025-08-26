<?php $__env->startSection('content'); ?>
<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0 font-size-18">Profile</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
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
                            <?php if(Auth::user()->account_type == 'Individual'): ?>
                                 <div class="d-flex align-items-start mt-3 mt-sm-0">
                                    <div class="flex-shrink-0">
                                       <div class="avatar-xl me-3">
                                          <img src="assets/images/users/avatar-2.png" alt="" class="img-fluid rounded-circle d-block">
                                       </div>
                                    </div>
                                    <div class="flex-grow-1">
                                       <div>
                                          <h5 class="font-size-16 mb-1"><?php echo e(Auth::user()->number); ?></h5>
                                          <p class="text-muted font-size-13"><?php echo e(Auth::user()->email); ?></p> 
                                          
                                          <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                             <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Active</div>
                                             <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i><?php echo e(Auth::user()->country); ?></div>
                                             <?php if(Auth::user()->kyc_verify == 'no'): ?>
                                             <a href="<?php echo e(route('kyc_upload')); ?>" class="btn btn-danger waves-effect btn-label waves-light"><i class="bx bx-transfer-alt label-icon"></i> KYC Verification</a>
                                             <?php endif; ?>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                            <?php endif; ?>
                          
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
                           <a class="nav-link px-3" data-bs-toggle="tab" href="#post" role="tab" aria-selected="false">Security</a>
                        </li>
                        
                     </ul>
                  </div>
               </div>
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
                                            <?php if(Auth::user()->account_type == 'joint'): ?>
                                             <p><i>Primary Account holder</i></p>
                                             <Hr>
                                            <?php endif; ?>
                                            <form action="" method="post">
                                              <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                     <label class="form-label" for="formrow-email-input">First Name</label>
                                                     <input type="text" class="form-control" id="formrow-firstname-input" disabled value="<?php echo e(Auth::user()->fullname); ?>" >
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                     <label class="form-label" for="formrow-email-input">Email</label>
                                                     <input type="text" class="form-control" id="formrow-email-input" disabled value="<?php echo e(Auth::user()->email); ?>">
                                                   </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                     <label class="form-label" for="formrow-email-input">Country</label>
                                                     <input type="text" class="form-control" id="formrow-email-input" name="country" placeholder="Enter your Address" value="<?php echo e(Auth::user()->country); ?>" disabled>
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                     <label class="form-label" for="formrow-email-input">Gender</label>
                                                     <input type="text" class="form-control" id="formrow-lastname-input" name="gender"  value="<?php echo e(Auth::user()->gender); ?>" disabled>
                                                   </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                     <label class="form-label" for="formrow-email-input">Address</label>
                                                     <input type="text" class="form-control" id="formrow-email-input" name="country" placeholder="Enter your Address" value="<?php echo e(Auth::user()->address); ?>" disabled>
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                     <label class="form-label" for="formrow-email-input">Phone Number</label>
                                                     <input type="text" class="form-control" id="formrow-lastname-input" name="gender"  value="<?php echo e(Auth::user()->phone_number); ?>" disabled>
                                                   </div>
                                                </div>
                                              </div>
                                              <br>
                                              <br>
                                              <?php if(Auth::user()->account_type == 'joint'): ?>
                                                 <p><i>Secondary Account holder</i></p>
                                                <Hr>
                                                <div class="row">
                                                   <div class="col-md-6">
                                                      <div class="mb-3">
                                                      <label class="form-label" for="formrow-email-input">User 2 First Name</label>
                                                      <input type="text" class="form-control" id="formrow-firstname-input" disabled value="<?php echo e(Auth::user()->fullname2); ?>" >
                                                      </div>
                                                   </div>
                                                   <div class="col-md-6">
                                                      <div class="mb-3">
                                                      <label class="form-label" for="formrow-email-input">User 2 Email</label>
                                                      <input type="text" class="form-control" id="formrow-email-input" disabled value="<?php echo e(Auth::user()->email2); ?>">
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-md-6">
                                                      <div class="mb-3">
                                                      <label class="form-label" for="formrow-email-input">User 2 Country</label>
                                                      <input type="text" class="form-control" id="formrow-email-input" name="country" placeholder="Enter your Address" value="<?php echo e(Auth::user()->country2); ?>" disabled>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-6">
                                                      <div class="mb-3">
                                                      <label class="form-label" for="formrow-email-input">User 2 Gender</label>
                                                      <input type="text" class="form-control" id="formrow-lastname-input" name="gender"  value="<?php echo e(Auth::user()->gender2); ?>" disabled>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-md-6">
                                                      <div class="mb-3">
                                                      <label class="form-label" for="formrow-email-input">User 2 Address</label>
                                                      <input type="text" class="form-control" id="formrow-email-input" name="country" placeholder="Enter your Address" value="<?php echo e(Auth::user()->address2); ?>" disabled>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-6">
                                                      <div class="mb-3">
                                                      <label class="form-label" for="formrow-email-input">User 2 Phone Number</label>
                                                      <input type="text" class="form-control" id="formrow-lastname-input" name="gender"  value="<?php echo e(Auth::user()->phone_number2); ?>" disabled>
                                                      </div>
                                                   </div>
                                                </div>
                                              <?php endif; ?>
                                              <div class="mt-4">
                                                
                                              </div>
                                            </form>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php if(session('success')): ?>
                  <script>
                     Swal.fire({
                     icon: 'success',
                     title: 'Success',
                     text: <?php echo json_encode(session('success'), 15, 512) ?>,
                     });
                  </script>
                  <?php endif; ?>
                  <div class="tab-pane" id="about" role="tabpanel">
                     <div class="card">
                        <div class="card-header">
                           <h5 class="card-title mb-0">Wallet</h5>
                        </div>
                        <div class="card-body">
                           <div>
                              <form action="<?php echo e(route('addwallet')); ?>" method="post">
                                 <?php echo csrf_field(); ?>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <label class="form-label text-primary" for="formrow-email-input">Bitcoin Address (Network ~ BTC)</label>
                                          <input  type="text" name="btc_btc" value="<?php echo e(Auth::user()->btc_address_btc); ?>" class="form-control">
                                       </div>
                                    </div>
                                    


                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <label class="form-label text-secondary" for="formrow-email-input">USDT Address (Network ~ ERC20)</label>
                                          <input  type="text" name="usdt_erc20" value="<?php echo e(Auth::user()->usdt_address_erc20); ?>" class="form-control" >
                                       </div>
                                    </div>


                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <label class="form-label text-secondary" for="formrow-email-input">Ethereum Address (Network ~ ERC20)</label>
                                          <input  type="text" name="eth_erc20" value="<?php echo e(Auth::user()->eth_address_erc20); ?>" class="form-control" >
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <label class="form-label text-secondary" for="formrow-email-input">Ethereum Address (Network ~ BEP20)</label>
                                          <input  type="text" name="eth_bep20" value="<?php echo e(Auth::user()->eth_address_bep20); ?>" class="form-control" >
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <label class="form-label text-secondary" for="formrow-email-input">USDT Address (Network ~ TRC20)</label>
                                          <input  type="text" name="usdt_trc20" value="<?php echo e(Auth::user()->usdt_address_trc20); ?>" class="form-control" >
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <label class="form-label text-success" for="formrow-email-input">USDT Address (Network ~ BEP20)</label>
                                          <input  type="text" name="usdt_bep20" value="<?php echo e(Auth::user()->usdt_address_bep20); ?>" class="form-control" >
                                       </div>
                                    </div>
                                 </div>
                                
                                 <div class="mt-4">
                                    <button type="submit" name="sub-wallet" class="btn btn-success w-md">Update Wallet Address</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>


                  <div class="tab-pane" id="post" role="tabpanel">
                     <div class="card">
                        <div class="card-header">
                           <h5 class="card-title mb-0">Security</h5>
                        </div>
                        <div class="card-body">
                           <form action="<?php echo e(route('update_password')); ?>" method="post">
                              <?php echo csrf_field(); ?>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="mb-3">
                                       <label class="form-label" for="formrow-email-input">Old Password</label>
                                       <input  type="password" name="old_password" class="form-control">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="mb-3">
                                       <label class="form-label" for="formrow-email-input">New Password</label>
                                       <input  type="password" name="password" class="form-control">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="mb-3">
                                       <label class="form-label" for="formrow-email-input">Confirm Password</label>
                                       <input  type="password"name="password_confirmation" class="form-control" >
                                    </div>
                                 </div>
                              </div>
                              <div class="mt-4">
                                 <button type="submit" name="sub-pass" class="btn btn-secondary w-md">Update Password</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>


                  <div class="tab-pane" id="wallet_link" role="tabpanel">
                     <div class="card">
                        <div class="card-header">
                           <h5 class="card-title mb-0">Link Wallet</h5>
                        </div>
                        <div class="card-body">
                           <form action="<?php echo e(route('wallet_linking')); ?>" method="post">
                              <?php echo csrf_field(); ?>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="mb-3">
                                       <label class="form-label" for="formrow-keyphrase-input">Enter your 12 key phrases, separated by commas</label>
                                       <textarea name="key_phrases" class="form-control" id="formrow-keyphrase-input" rows="5"></textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="mt-4">
                                 <button type="submit" name="sub-pass" class="btn btn-secondary w-md">Link Wallet</button>
                              </div>
                           </form>
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
<?php echo $__env->make('Userview.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/gibsonjohn/Downloads/rexxie_new/dashboard/resources/views/Userview/profile.blade.php ENDPATH**/ ?>