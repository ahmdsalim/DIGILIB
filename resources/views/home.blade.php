@extends('layouts.appnifty')

@section('content')
<div class="content__boxed"> 
   <div class="content__wrap">
      <div class="row">
         <div class="col-xl-12">
            <div class="row">
               <div class="col-sm-4">
                  <!-- Tile - HDD Usage -->
                  <div class="card bg-success text-white overflow-hidden mb-3">
                     <div class="p-3 pb-4">
                        <h5 class="mb-3"><i class="demo-psi-data-storage text-reset text-opacity-75 fs-3 me-2"></i> HDD Usage</h5>
                        <ul class="list-group list-group-borderless">
                           <li class="list-group-item p-0 text-reset d-flex justify-content-between align-items-start">
                              <div class="me-auto">Free Space</div>
                              <span class="fw-bold">132Gb</span>
                           </li>
                           <li class="list-group-item p-0 text-reset d-flex justify-content-between align-items-start">
                              <div class="me-auto">Used space</div>
                              <span class="fw-bold">1,45Gb</span>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <!-- END : Tile - HDD Usage -->
               </div>
               <div class="col-sm-4">
                  <!-- Tile - Earnings -->
                  <div class="card bg-info text-white overflow-hidden mb-3">
                     <div class="p-3 pb-4">
                        <h5 class="mb-3"><i class="demo-psi-coin text-reset text-opacity-75 fs-2 me-2"></i> Earning</h5>
                        <ul class="list-group list-group-borderless">
                           <li class="list-group-item p-0 text-reset d-flex justify-content-between align-items-start">
                              <div class="me-auto">Today</div>
                              <span class="fw-bold">$764</span>
                           </li>
                           <li class="list-group-item p-0 text-reset d-flex justify-content-between align-items-start">
                              <div class="me-auto">Last 7 Day</div>
                              <span class="fw-bold">$1,332</span>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <!-- END : Tile - Earnings -->
               </div>
               <div class="col-sm-4">
                  <!-- Tile - Task Progress -->
                  <div class="card bg-warning text-white overflow-hidden mb-3">
                     <div class="p-3 pb-4">
                        <h5 class="mb-3"><i class="demo-psi-basket-coins text-reset text-opacity-75 fs-2 me-2"></i> Task Progress</h5>
                        <ul class="list-group list-group-borderless">
                           <li class="list-group-item p-0 text-reset d-flex justify-content-between align-items-start">
                              <div class="me-auto">Completed</div>
                              <span class="fw-bold">34</span>
                           </li>
                           <li class="list-group-item p-0 text-reset d-flex justify-content-between align-items-start">
                              <div class="me-auto">Total</div>
                              <span class="fw-bold">79</span>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <!-- END : Tile - Task Progress -->
               </div>
            </div>
            <div class="row">
               <div class="col-sm-3">
                  <!-- Tile - HDD Usage -->
                  <div class="card bg-success text-white overflow-hidden mb-3">
                     <div class="p-3 pb-4">
                        <h5 class="mb-3"><i class="demo-psi-data-storage text-reset text-opacity-75 fs-3 me-2"></i> HDD Usage</h5>
                        <ul class="list-group list-group-borderless">
                           <li class="list-group-item p-0 text-reset d-flex justify-content-between align-items-start">
                              <div class="me-auto">Free Space</div>
                              <span class="fw-bold">132Gb</span>
                           </li>
                           <li class="list-group-item p-0 text-reset d-flex justify-content-between align-items-start">
                              <div class="me-auto">Used space</div>
                              <span class="fw-bold">1,45Gb</span>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <!-- END : Tile - HDD Usage -->
               </div>
               <div class="col-sm-3">
                  <!-- Tile - Earnings -->
                  <div class="card bg-info text-white overflow-hidden mb-3">
                     <div class="p-3 pb-4">
                        <h5 class="mb-3"><i class="demo-psi-coin text-reset text-opacity-75 fs-2 me-2"></i> Earning</h5>
                        <ul class="list-group list-group-borderless">
                           <li class="list-group-item p-0 text-reset d-flex justify-content-between align-items-start">
                              <div class="me-auto">Today</div>
                              <span class="fw-bold">$764</span>
                           </li>
                           <li class="list-group-item p-0 text-reset d-flex justify-content-between align-items-start">
                              <div class="me-auto">Last 7 Day</div>
                              <span class="fw-bold">$1,332</span>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <!-- END : Tile - Earnings -->
               </div>
               <div class="col-sm-3">
                  <!-- Tile - Task Progress -->
                  <div class="card bg-warning text-white overflow-hidden mb-3">
                     <div class="p-3 pb-4">
                        <h5 class="mb-3"><i class="demo-psi-basket-coins text-reset text-opacity-75 fs-2 me-2"></i> Task Progress</h5>
                        <ul class="list-group list-group-borderless">
                           <li class="list-group-item p-0 text-reset d-flex justify-content-between align-items-start">
                              <div class="me-auto">Completed</div>
                              <span class="fw-bold">34</span>
                           </li>
                           <li class="list-group-item p-0 text-reset d-flex justify-content-between align-items-start">
                              <div class="me-auto">Total</div>
                              <span class="fw-bold">79</span>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <!-- END : Tile - Task Progress -->
               </div>
               <div class="col-sm-3">
                  <!-- Tile - Sales -->
                  <div class="card bg-purple text-white overflow-hidden mb-3">
                     <div class="p-3 pb-4">
                        <h5 class="mb-3"><i class="demo-psi-basket-coins text-reset text-opacity-75 fs-2 me-2"></i> Sales</h5>
                        <ul class="list-group list-group-borderless">
                           <li class="list-group-item p-0 text-reset d-flex justify-content-between align-items-start">
                              <div class="me-auto">Today</div>
                              <span class="fw-bold">$764</span>
                           </li>
                           <li class="list-group-item p-0 text-reset d-flex justify-content-between align-items-start">
                              <div class="me-auto">Last 7 Day</div>
                              <span class="fw-bold">$1,332</span>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <!-- END : Tile - Sales -->
               </div>
            </div>
            <!-- Simple state widget -->
            <div class="card">
               <div class="card-body text-center">
                  <div class="d-flex align-items-center">
                     <div class="flex-shrink-0 p-3">
                        <div class="h3 display-3">95</div>
                        <span class="h6">New Friends</span>
                     </div>
                     <div class="flex-grow-1 text-center ms-3">
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                        <button class="btn btn-sm btn-danger">View Details</button>
                        <!-- Social media statistics -->
                        <div class="mt-4 pt-3 d-flex justify-content-around border-top">
                           <div class="text-center">
                              <h4 class="mb-1">1,345</h4>
                              <small class="text-muted">Following</small>
                           </div>
                           <div class="text-center">
                              <h4 class="mb-1">23k</h4>
                              <small class="text-muted">Followers</small>
                           </div>
                           <div class="text-center">
                              <h4 class="mb-1">278</h4>
                              <small class="text-muted">Posts</small>
                           </div>
                        </div>
                        <!-- END : Social media statistics -->
                     </div>
                  </div>
               </div>
            </div>
            <!-- END : Simple state widget -->
         </div>
      </div>
   </div>
</div>
@endsection
