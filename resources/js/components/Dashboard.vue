 <template>

    <div :class="{ 'dark-mode': darkMode }">
        <div  class="container-scroller"  >
            
              <!-- partial:partials/_navbar.html -->
              <nav :class="{ 'dark-mode': darkMode }"  class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div  class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                  <router-link  class="navbar-brand brand-logo" to="/"><img src="assets/images/logo.svg" alt="logo" /></router-link>
                  <router-link class="navbar-brand brand-logo-mini" to="/"><img src="assets/images/logo-mini.svg" alt="logo" /></router-link>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                  <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                  </button>
                  <div class="search-field d-none d-md-block">
                    <form class="d-flex align-items-center h-100" action="#">
                      <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                          <i class="input-group-text border-0 mdi mdi-magnify"></i>
                        </div>
                        <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
                      </div>
                    </form>
                  </div>
                  <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                      <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="nav-profile-img">
                          <img src="assets/images/faces/face1.jpg" alt="image">
                          <span class="availability-status online"></span>
                        </div>
                        <div class="nav-profile-text">
                          <p class="mb-1 text-black">David Greymaax</p>
                        </div>
                      </a>
                      <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="">
                          <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                          <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
                      </div>
                    </li>
                    <li class="nav-item d-none d-lg-block full-screen-link">
                      <a class="nav-link">
                        <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                      </a>
                    </li>
                    <li class="nav-item d-none d-lg-block full-screen-link">
                      <a class="nav-link">
                        <button @click="toggleDarkMode">Toggle Dark Mode</button>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-email-outline"></i>
                        <span class="count-symbol bg-warning"></span>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                        <h6 class="p-3 mb-0">Messages</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                          <div class="preview-thumbnail">
                            <img src="assets/images/faces/face4.jpg" alt="image" class="profile-pic">
                          </div>
                          <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                            <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                            <p class="text-gray mb-0"> 1 Minutes ago </p>
                          </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                          <div class="preview-thumbnail">
                            <img src="assets/images/faces/face2.jpg" alt="image" class="profile-pic">
                          </div>
                          <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                            <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                            <p class="text-gray mb-0"> 15 Minutes ago </p>
                          </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                          <div class="preview-thumbnail">
                            <img src="assets/images/faces/face3.jpg" alt="image" class="profile-pic">
                          </div>
                          <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                            <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                            <p class="text-gray mb-0"> 18 Minutes ago </p>
                          </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <h6 class="p-3 mb-0 text-center">4 new messages</h6>
                      </div>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="count-symbol bg-danger"></span>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <h6 class="p-3 mb-0">Notifications</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                          <div class="preview-thumbnail">
                            <div class="preview-icon bg-success">
                              <i class="mdi mdi-calendar"></i>
                            </div>
                          </div>
                          <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                            <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                            <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                          </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                          <div class="preview-thumbnail">
                            <div class="preview-icon bg-warning">
                              <i class="mdi mdi-settings"></i>
                            </div>
                          </div>
                          <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                            <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                            <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                          </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                          <div class="preview-thumbnail">
                            <div class="preview-icon bg-info">
                              <i class="mdi mdi-link-variant"></i>
                            </div>
                          </div>
                          <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                            <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                            <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                          </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <h6 class="p-3 mb-0 text-center">See all notifications</h6>
                      </div>
                    </li>
                    <li class="nav-item nav-logout d-none d-lg-block">
                      <a class="nav-link" href="#">
                        <i class="mdi mdi-power"></i>
                      </a>
                    </li>
                    <li class="nav-item nav-settings d-none d-lg-block">
                      <a class="nav-link" href="#">
                        <i class="mdi mdi-format-line-spacing"></i>
                      </a>
                    </li>
                  </ul>
                  <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                  </button>
                </div>
              </nav>
              <!-- partial -->
              <div  class="container-fluid page-body-wrapper">
                <!-- partial:partials/_sidebar.html -->
                <nav :class="{ 'dark-mode': darkMode }"  class="sidebar sidebar-offcanvas" id="sidebar">
                  <ul class="nav">
                    <li class="nav-item nav-profile">
                      <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                          <img src="assets/images/faces/face1.jpg" alt="profile">
                          <span class="login-status online"></span>
                          <!--change to offline or busy as needed-->
                        </div>
                        <div class="nav-profile-text d-flex flex-column">
                          <span class="font-weight-bold mb-2">David Grey. H</span>
                          <span class="text-secondary text-small">Project Manager</span>
                        </div>
                        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                      </a>
                    </li>
                    <li class="nav-item">
                      <router-link class="nav-link" to="/statistics">
                        <span class="menu-title">Dashboard</span>
                        <i class="mdi mdi-chart-bar menu-icon"></i>
                      </router-link>
                    </li>
                  
                    <li class="nav-item">
                      <router-link class="nav-link" to="/products">
                        <span class="menu-title">Products</span>
                        <i class=" mdi mdi-basket menu-icon"></i>
                      </router-link>
                    </li>
                    <li class="nav-item">
                      <router-link class="nav-link" to="/orders">
                        <span class="menu-title">Orders</span>
                        <i class="mdi mdi-bell-ring-outline menu-icon"></i>
                      </router-link>
                    </li>
                    <li class="nav-item">
                      <router-link class="nav-link" to="/categories">
                        <span class="menu-title">Categories</span>
                        <i class=" mdi mdi-format-float-right menu-icon"></i>
                      </router-link>
                    </li>
                    <li class="nav-item">
                      <router-link class="nav-link" to="/customers">
                        <span class="menu-title ">Customers</span>
                        <i class="mdi mdi-contacts  menu-icon"></i>
                      </router-link>
                    </li>
                    <li class="nav-item">
                      <router-link class="nav-link" to="/payments">
                        <span class="menu-title">Payments</span>
                        <i class="mdi mdi-format-strikethrough-variant menu-icon"></i>
                      </router-link>
                    </li>
                    <li class="nav-item">
                      <router-link class="nav-link" to="/contacts">
                        <span class="menu-title">Contacts</span>
                        <i class="mdi mdi-account-card-details menu-icon"></i>
                      </router-link>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                        <span class="menu-title">Sample Pages</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-medical-bag menu-icon"></i>
                      </a>
                      <div class="collapse" id="general-pages">
                        <ul class="nav flex-column sub-menu">
                          <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                          <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                          <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                        </ul>
                      </div>
                    </li>
                    
                  </ul>
                </nav>
                <!-- partial -->
                <div class="main-panel ">
                  <div class="page-header m-5">
                        <router-link to="/statistics" class="page-title nav-link">
                          <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="mdi mdi-home"></i>
                          </span> Dashboard 
                        </router-link>
                       
                    </div>
               
                    
                      <slot>

                      </slot>
                    
                <div class="mt-5">
                  <footer :class="{ 'dark-mode': darkMode }" class="footer mt-5">
                    <div class="container-fluid d-flex justify-content-between">
                      <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © 2023</span>
                      <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
                    </div>
                  </footer>
                </div>
                
                </div>
             
              </div>
            
            </div>
            
    </div>   
 </template>

<script setup>
import {  inject } from 'vue';

    // Inject the darkMode variable from the app entry point
    const darkMode = inject('darkMode');
    const toggleDarkMode = inject('toggleDarkMode');

</script>
<style scoped>

nav ul li:hover{
  background-color: #ddd;

 
}


</style>
<style>
/* Custom styles for dark mode */
/* [data-theme="dark"] {
  .navbar-dark .navbar-nav .nav-link {
    color: #fff;
  }
} */
.dark-mode {
  background-color: #013336;
  color: #32e2d9;
}
</style>