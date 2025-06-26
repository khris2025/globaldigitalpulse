<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Dashboard | User</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- App favicon -->
      <link rel="shortcut icon" href="favicon.png">
      <!-- plugin css -->
      <link href="<?php echo e(asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')); ?>" rel="stylesheet" type="text/css" />
      <!-- preloader css -->
      <link rel="stylesheet" href="<?php echo e(asset('assets/css/preloader.min.css')); ?>" type="text/css" />
      <!-- Bootstrap Css -->
      <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
      <!-- Icons Css -->
      <link href="<?php echo e(asset('assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
      <!-- App Css-->
      <link href="<?php echo e(asset('assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://unpkg.com/feather-icons"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   </head>
   <header id="page-topbar">
      <div class="navbar-header">
         <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
               <a href="#" class="logo logo-dark">
                  <span class="logo-sm">
                     <!-- <img src="../images/safelogo.png" alt="" height="34"> -->
                  </span>
                  
               </a>
               <a href="#" class="logo logo-light">
                  <span class="logo-sm">
                     <!-- <img src="../images/safelogo.png" alt="" height="34"> -->
                  </span>
                  <span class="logo-lg">
                  <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="" height="30%" width="30%"> 
                  </span>
               </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
            <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
               <div class="position-relative">
                  <input type="text" class="form-control" placeholder="Search...">
                  <button class="btn btn-primary" type="button"><i class="bx bx-search-alt align-middle"></i></button>
               </div>
            </form>
         </div>
         <div class="d-flex">
            <div class="mt-3  d-sm-inline-block">
               <div id="google_translate_element"></div>
            </div>
            <div class="dropdown d-inline-block  ms-2">
               <button type="button" class="btn header-item" id="mode-setting-btn">
               <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
               <i data-feather="sun" class="icon-lg layout-mode-light"></i>
               </button>
            </div>
            <div class="dropdown d-inline-block">
               <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown"
                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img class="rounded-circle header-profile-user" src="<?php echo e(asset('assets/images/users/avatar-1.png')); ?>"
                  alt="Header Avatar">
               <span class="d-none d-xl-inline-block ms-1 fw-medium"><?php echo e(Auth::user()->fullname); ?></span>
               <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
               </button>
               <div class="dropdown-menu dropdown-menu-end">
                  <!-- item-->
                  <a class="dropdown-item" href="<?php echo e(route('profile')); ?>"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
                  <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     Logout
                  </a>

                  
               </div>
            </div>
         </div>
      </div>
      <div class="vertical-menu">
         <div data-simplebar class="h-100">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
               <!-- Left Menu Start -->
               <ul class="metismenu list-unstyled" id="side-menu">
                  <li class="menu-title" data-key="t-menu">Menu</li>
                  <li>
                     <a href="<?php echo e(route('dashboard')); ?>">
                     <i data-feather="home"></i>
                     <span data-key="t-dashboard">Dashboard</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo e(route('Investments')); ?>">
                     <i class="fa fa-tags" style="font-size: 15px"></i>
                     <span data-key="t-dashboard">Plans</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo e(route('profile')); ?>">
                     <i data-feather="user"></i>
                     <span data-key="t-dashboard">My Profile</span>
                     </a>
                  </li>

                   <li>
                     <a href="<?php echo e(route('kyc_upload')); ?>">
                     <i data-feather="user"></i>
                     <span data-key="t-dashboard">Account Upgrade</span>
                     </a>
                  </li>

                  <li>
                     <a href="<?php echo e(route('portfolio')); ?>">
                     <i class="fa fa-rocket" style="font-size: 15px"></i>
                     <span data-key="t-dashboard">Portfolio</span>
                     </a>
                  </li>


                  <li class="menu-title mt-2" data-key="t-components">Finances</li>
                  
                  <li>
                     <a href="<?php echo e(route('deposit')); ?>">
                     <i data-feather="credit-card"></i>
                     <span data-key="t-dashboard">Deposit Funds</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo e(route('withdrawal')); ?>">
                     <i data-feather="briefcase"></i>
                     <span data-key="t-dashboard">Withdraw Funds</span>
                     </a>
                  </li>

                  <li>
                     <a href="<?php echo e(route('copy_trade')); ?>">
                     <i class="fa fa-users" style="font-size: 15px;"></i>
                     <span data-key="t-dashboard">Copy Experts</span>
                     </a>
                  </li>


                   <li>
                     <a href="<?php echo e(route('purchase_signals')); ?>">
                     <i class="fa fa-users" style="font-size: 15px;"></i>
                     <span data-key="t-dashboard">Purchase Signals</span>
                     </a>
                  </li>



                  

                  <li class="menu-title mt-2" data-key="t-components">Extras</li>
                  <li>
                     <a href="<?php echo e(route('referral')); ?>">
                     <i data-feather="users"></i>
                     <span data-key="t-dashboard">Manage Referrals</span>
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         <i data-feather="log-out"></i>
                         <span data-key="t-logout">Logout</span>
                     </a>
                     <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                         <?php echo csrf_field(); ?>
                     </form>
                  </li>
                  
                  
                  
               </ul>
            </div>
         </div>
      </div>
   </header>
   
   <script>
      document.querySelector('a[href="<?php echo e(route('logout')); ?>"]').addEventListener('click', function(event) {
          event.preventDefault();
          document.getElementById('logout-form').submit();
      });
   </script>
   <body data-sidebar-size="lg" data-layout-mode="light" data-topbar="light" data-sidebar="light">


      <?php echo $__env->yieldContent('content'); ?>
      






   
      <!-- FOOTER -->
      <footer class="footer">
         <div class="container-fluid">
         <div class="row">
            <div class="col-sm-6">
               <script>document.write(new Date().getFullYear())</script> © BRIGHT WAVE HOLDING INC
               <div class="col-sm-6">
                  <div class="text-sm-end d-none d-sm-block">
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <script type="text/javascript">
         function googleTranslateElementInit() {
           new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
         }
      </script>
      <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
      <!-- Right bar overlay-->
      <div class="rightbar-overlay"></div>
       <!-- JAVASCRIPT -->
        <script>
            feather.replace()
        </script>
        <script src=" <?php echo e(asset('assets/libs/jquery/jquery.min.js')); ?> "></script>
        <script src=" <?php echo e(asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')); ?> "></script>
        <script src="<?php echo e(asset('assets/libs/metismenu/metisMenu.min.js')); ?> "></script>
        <script src="<?php echo e(asset('assets/libs/simplebar/simplebar.min.js')); ?> "></script>
        <script src="<?php echo e(asset('assets/libs/node-waves/waves.min.js')); ?> "></script>


        
        <!-- Plugins js-->
        <script src="<?php echo e(asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')); ?> "></script>
        <script src="<?php echo e(asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')); ?> "></script>
        <!-- dashboard init -->
        <script src="<?php echo e(asset('assets/js/pages/dashboard.init.js')); ?> "></script>
        <script src="<?php echo e(asset('assets/js/app.js')); ?> "></script>  
        <!-- Smartsupp Live Chat script -->
        <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = '00612b43dae8a772c6f05acdb88bb5fe69acf1f0';
        window.smartsupp||(function(d) {
          var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
          s=d.getElementsByTagName('script')[0];c=d.createElement('script');
          c.type='text/javascript';c.charset='utf-8';c.async=true;
          c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
        })(document);
        </script>
        <noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>
        
        

        
       
       


   </body>
</html><?php /**PATH /home/u897955046/domains/global-digitalholdings.com/public_html/dashboard/resources/views/Userview/layouts/app.blade.php ENDPATH**/ ?>