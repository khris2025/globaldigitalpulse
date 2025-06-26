@extends('Adminview.layout.app')
@section('content')
@error('message')
   <script>
         Swal.fire({
         icon: 'error',
         title: 'Oops...',
         text: @json($message),
      });
   </script>
@enderror
@if(session('success'))
   <script>
      Swal.fire({
         icon: 'success',
         title: 'Success',
         text: @json(session('success')),
      });
   </script>
@endif
<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0 font-size-18">On-going Mining</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">On-going Mining</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-12">
               <div class="card">
                  <div class="card-header align-items-center d-flex">
                     <h4 class="card-title mb-0 flex-grow-1">On-going Mining</h4>
                     <div class="flex-shrink-0">
                        <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link active" data-bs-toggle="tab" href="#transactions-all-tab" role="tab">
                              Withdrawals 
                              </a>
                           </li>
                        </ul>
                        <!-- end nav tabs -->
                     </div>
                  </div>
                  <!-- end card header -->
                  <div class="card-body px-0">
                     <div class="tab-content">
                        <div class="tab-pane active" id="transactions-all-tab" role="tabpanel">
                           <div class="table-responsive px-3" data-simplebar >
                              <table id="datatable" class="table nowrap w-100">
                                 <thead>
                                    <tr>
                                       <th>Full Name</th>
                                       <th>Email</th>
                                       <th>Amount</th>
                                       <th>Profit</th>
                                       <th>Coin Type</th>
                                       <th>Status</th>
                                       <th>Transaction ID</th>
                                       <th>Withdrawal Date</th>
                                       <th>Control</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($ongoing_mining as $mining)
                                       <tr>
                                            <td style="font-size: 16px;" class="font-w400">{{ $mining->fullname }}</td>
                                            <td style="font-size: 16px;" class="font-w400">{{ $mining->email }}</td>
                                            <td style="font-size: 16px;" class="font-w400">{{ $mining->amount }}</td>
                                            <td style="font-size: 16px;" class="font-w400">{{ $mining->profit ?? '-' }}</td>
                                            <td style="font-size: 16px;" class="font-w400">{{ $mining->plan }}</td>
                                            <td style="font-size: 16px;" class="font-w400">{{ $mining->status }}</td>
                                            <td style="font-size: 16px;" class="font-w400">{{ $mining->transid }}</td>
                                            <td style="font-size: 16px;" class="font-w400">
                                            {{ $mining->created_at ? $mining->created_at->format('F j, Y g:i A') : '-' }}
                                            </td>
                                            <td>
                                            <a href="{{ route('miningplans.end', ['id' => $mining->id]) }}" class="btn btn-rounded btn-danger" onclick="return confirm('Are you sure you want to end this mining plan?')">End</a>
                                            </td>
                                       </tr>
                                    @endforeach
                                 </tbody>
                              </table>
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
@endsection