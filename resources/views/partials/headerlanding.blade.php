<header class="header">
   <div class="header__inner">
      <!-- Brand -->
      <div class="header__brand">
         <div class="brand-wrap">
            <!-- Brand logo -->
            <a href="/" class="brand-img stretched-link">
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
         
            <div class="header-searchbox">
               <!-- Searchbox toggler for small devices -->
               <label for="header-search-input" class="header__btn d-md-none btn btn-icon rounded-pill shadow-none border-0 btn-sm" type="button">
               <i class="demo-psi-magnifi-glass"></i>
               </label>
               <!-- Searchbox input -->
               <form action="{{ route('book.search') }}" method="GET" class="searchbox searchbox--auto-expand searchbox--hide-btn input-group">
                  <input id="header-search-input" class="searchbox__input form-control bg-transparent" name="keyword" type="search" placeholder="Cari ..." aria-label="Search">
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
                  <div class="dropdown">

                            <!-- Toggler -->
                            <button class="header__btn btn btn-icon btn-sm" type="button" data-bs-toggle="dropdown" aria-label="User dropdown" aria-expanded="false">
                                <i class="demo-psi-male"></i>
                            </button>

                            <!-- User dropdown menu -->
                            <div class="dropdown-menu dropdown-menu-end w-md-200px" style="">

                                <!-- User dropdown header -->
                                <div class="d-flex align-items-center border-bottom px-3 py-2">
                                    <div class="flex-shrink-0">
                                        <img class="img-sm rounded-circle" src="../assets/img/profile-photos/1.png" alt="Profile Picture" loading="lazy">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-0">}</h5>
                                        <span class="text-muted fst-italic"><a href="https://themeon.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bfdedecdd0d1e0dcd7dec9dac5ffdac7ded2cfd3da91dcd0d2">[email&nbsp;protected]</a></span>
                                    </div>
                                </div>

                                <div class="row">
                                        <div class="list-group list-group-borderless h-100 py-3">
                                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                <span><i class="demo-pli-mail fs-5 me-2"></i>Koleksi</span>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <i class="demo-pli-male fs-5 me-2"></i>Terakhir Dibaca
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <i class="demo-pli-unlock fs-5 me-2"></i> Logout
                                            </a>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>


                        <a href="login" target="_blank">            
             <div class="brand-title">Login</div> 
            </a>             
            <!-- Brand title -->
         </div>
      </div>
</div>
</header>