<header class="header">
   <div class="header__inner">
      <!-- Brand -->
      <div class="header__brand">
         <div class="brand-wrap">
            <!-- Brand logo -->
            <a href="index.html" class="brand-img stretched-link">
            <img src="{{asset('assets/img/logo.svg')}}" alt="Nifty Logo" class="Nifty logo" width="40" height="40">
            </a>
            <!-- Brand title -->
            <div class="brand-title">DIGILIB</div>
            <!-- You can also use IMG or SVG instead of a text element. -->
         </div>
      </div>
      <!-- End - Brand -->
      <div class="header__content">
         <!-- Content Header - Left Side: -->
         <div class="header__content-start">
            <!-- Navigation Toggler -->
            <button type="button" class="nav-toggler header__btn btn btn-icon btn-sm" aria-label="Nav Toggler">
            <i class="demo-psi-view-list"></i>
            </button>
            <!-- Searchbox -->
            <div class="header-searchbox">
               <!-- Searchbox toggler for small devices -->
               <label for="header-search-input" class="header__btn d-md-none btn btn-icon rounded-pill shadow-none border-0 btn-sm" type="button">
               <i class="demo-psi-magnifi-glass"></i>
               </label>
               <!-- Searchbox input -->
               <form class="searchbox searchbox--auto-expand searchbox--hide-btn input-group">
                  <input id="header-search-input" class="searchbox__input form-control bg-transparent" type="search" placeholder="Type for search . . ." aria-label="Search">
                  <div class="searchbox__backdrop">
                     <button class="searchbox__btn header__btn btn btn-icon rounded shadow-none border-0 btn-sm" type="button" id="button-addon2">
                     <i class="demo-pli-magnifi-glass"></i>
                     </button>
                  </div>
               </form>
            </div>
         </div>
         <!-- End - Content Header - Left Side -->
         <!-- Content Header - Right Side: -->
         <div class="header__content-end">
            <!-- Notification Dropdown -->
            <div class="dropdown">
               <!-- Toggler -->
               <button class="header__btn btn btn-icon btn-sm" type="button" data-bs-toggle="dropdown" aria-label="Notification dropdown" aria-expanded="false">
               <span class="d-block position-relative">
               <i class="demo-psi-bell"></i>
               <span class="badge badge-super rounded bg-danger p-1">
               <span class="visually-hidden">unread messages</span>
               </span>
               </span>
               </button>
               <!-- Notification dropdown menu -->
               <div class="dropdown-menu dropdown-menu-end w-md-300px">
                  <div class="border-bottom px-3 py-2 mb-3">
                     <h5>Notifications</h5>
                  </div>
                  <div class="list-group list-group-borderless">
                     <!-- List item -->
                     <div class="list-group-item list-group-item-action d-flex align-items-start mb-3">
                        <div class="flex-shrink-0 me-3">
                           <i class="demo-psi-data-settings text-muted fs-2"></i>
                        </div>
                        <div class="flex-grow-1 ">
                           <a href="#" class="h6 d-block mb-0 stretched-link text-decoration-none">Your storage is full</a>
                           <small class="text-muted">Local storage is nearly full.</small>
                        </div>
                     </div>
                     <!-- List item -->
                     <div class="list-group-item list-group-item-action d-flex align-items-start mb-3">
                        <div class="flex-shrink-0 me-3">
                           <i class="demo-psi-file-edit text-blue-200 fs-2"></i>
                        </div>
                        <div class="flex-grow-1 ">
                           <a href="#" class="h6 d-block mb-0 stretched-link text-decoration-none">Writing a New Article</a>
                           <small class="text-muted">Wrote a news article for the John Mike</small>
                        </div>
                     </div>
                     <!-- List item -->
                     <div class="list-group-item list-group-item-action d-flex align-items-start mb-3">
                        <div class="flex-shrink-0 me-3">
                           <i class="demo-psi-speech-bubble-7 text-green-300 fs-2"></i>
                        </div>
                        <div class="flex-grow-1 ">
                           <div class="d-flex justify-content-between align-items-start">
                              <a href="#" class="h6 mb-0 stretched-link text-decoration-none">Comment sorting</a>
                              <span class="badge bg-info rounded ms-auto">NEW</span>
                           </div>
                           <small class="text-muted">You have 1,256 unsorted comments.</small>
                        </div>
                     </div>
                     <!-- List item -->
                     <div class="list-group-item list-group-item-action d-flex align-items-start mb-3">
                        <div class="flex-shrink-0 me-3">
                           <img class="img-xs rounded-circle" src="assets/img/profile-photos/7.png" alt="Profile Picture" loading="lazy">
                        </div>
                        <div class="flex-grow-1 ">
                           <a href="#" class="h6 d-block mb-0 stretched-link text-decoration-none">Lucy Sent you a message</a>
                           <small class="text-muted">30 minutes ago</small>
                        </div>
                     </div>
                     <!-- List item -->
                     <div class="list-group-item list-group-item-action d-flex align-items-start mb-3">
                        <div class="flex-shrink-0 me-3">
                           <img class="img-xs rounded-circle" src="assets/img/profile-photos/3.png" alt="Profile Picture" loading="lazy">
                        </div>
                        <div class="flex-grow-1 ">
                           <a href="#" class="h6 d-block mb-0 stretched-link text-decoration-none">Jackson Sent you a message</a>
                           <small class="text-muted">1 hours ago</small>
                        </div>
                     </div>
                     <div class="text-center mb-2">
                        <a href="#" class="btn-link">Show all Notifications</a>
                     </div>
                  </div>
               </div>
            </div>
            <!-- End - Notification dropdown -->
            <!-- User dropdown -->
            <div class="dropdown">
               <!-- Toggler -->
               <button class="header__btn btn btn-icon btn-sm" type="button" data-bs-toggle="dropdown" aria-label="User dropdown" aria-expanded="false">
               <i class="demo-psi-male"></i>
               </button>
               <!-- User dropdown menu -->
               <div class="dropdown-menu dropdown-menu-end w-md-250px">
                  <!-- User dropdown header -->
                  <div class="d-flex align-items-center border-bottom px-3 py-2">
                     <div class="flex-shrink-0">
                        <img class="img-sm rounded-circle" src="assets/img/profile-photos/1.png" alt="Profile Picture" loading="lazy">
                     </div>
                     <div class="flex-grow-1 ms-3">
                        <h5 class="mb-0">{{Auth::user()->nama}}</h5>
                        <span class="text-muted fst-italic">{{Auth::user()->email}}</span>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <!-- User menu link -->
                        <div class="list-group list-group-borderless h-100 py-3">
                           <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                           <span><i class="demo-pli-mail fs-5 me-2"></i> Messages</span>
                           <span class="badge bg-danger rounded-pill">14</span>
                           </a>
                           <a href="#" class="list-group-item list-group-item-action">
                           <i class="demo-pli-male fs-5 me-2"></i> Profile
                           </a>
                           <a href="#" class="list-group-item list-group-item-action">
                           <i class="demo-pli-gear fs-5 me-2"></i> Settings
                           </a>
                           <a href="#" class="list-group-item list-group-item-action mt-auto">
                           <i class="demo-pli-computer-secure fs-5 me-2"></i> Lock screen
                           </a>
                           <a href="#" class="list-group-item list-group-item-action">
                           <i class="demo-pli-unlock fs-5 me-2"></i> Logout
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- End - User dropdown -->
            <!-- Sidebar Toggler -->
            <!-- <button class="sidebar-toggler header__btn btn btn-icon btn-sm" type="button" aria-label="Sidebar button">
            <i class="demo-psi-dot-vertical"></i>
            </button> -->
         </div>
      </div>
   </div>
</header>