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
                        <img class="img-sm rounded-circle" src="{{asset('assets/img/profile-photos/1.png')}}" alt="Profile Picture" loading="lazy">
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
                           <a href="{{route('users.profile')}}" class="list-group-item list-group-item-action">
                           <i class="demo-pli-male fs-5 me-2"></i> Profile
                           </a>
                           <a href="{{route('users.changepassword.show')}}" class="list-group-item list-group-item-action">
                           <svg xmlns="http://www.w3.org/2000/svg" class="fs-5 me-2" width="15" height="15" viewBox="0 0 24 24" fill="none">
                           <path d="M15.6807 14.5869C19.1708 14.5869 22 11.7692 22 8.29344C22 4.81767 19.1708 2 15.6807 2C12.1907 2 9.3615 4.81767 9.3615 8.29344C9.3615 9.90338 10.0963 11.0743 10.0963 11.0743L2.45441 18.6849C2.1115 19.0264 1.63143 19.9143 2.45441 20.7339L3.33616 21.6121C3.67905 21.9048 4.54119 22.3146 5.2466 21.6121L6.27531 20.5876C7.30403 21.6121 8.4797 21.0267 8.92058 20.4412C9.65538 19.4167 8.77362 18.3922 8.77362 18.3922L9.06754 18.0995C10.4783 19.5045 11.7128 18.6849 12.1537 18.0995C12.8885 17.075 12.1537 16.0505 12.1537 16.0505C11.8598 15.465 11.272 15.465 12.0067 14.7333L12.8885 13.8551C13.5939 14.4405 15.0439 14.5869 15.6807 14.5869Z" stroke="#1C274C" stroke-width="1" stroke-linejoin="round"/>
                           <path d="M17.8853 8.29353C17.8853 9.50601 16.8984 10.4889 15.681 10.4889C14.4635 10.4889 13.4766 9.50601 13.4766 8.29353C13.4766 7.08105 14.4635 6.09814 15.681 6.09814C16.8984 6.09814 17.8853 7.08105 17.8853 8.29353Z" stroke="#1C274C" stroke-width="1"/>
                           </svg> Ubah Password
                           </a>
                           <a href="javascript:void(0);" class="list-group-item list-group-item-action" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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