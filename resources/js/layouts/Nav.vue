<template>
    <div>
            <!-- Topbar Start -->
    <div class="container-fluid bg-light text-white">
        <div class="row bg py-2 px-xl-5">
            <div class="col-lg-6 d-none  d-lg-block">
                <div class="d-inline-flex  align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <router-link to="/" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </router-link>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-light text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right ">
                <a href="" class="btn border mx-2">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge text-dark ">0</span>
                </a>
                <a href="" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge text-dark">0</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5 ">
            
            <div class="col-12 col-lg-12">
                <nav class="navbar navbar-expand-lg  navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                           <!-- home -->
                            <router-link to="/" class="nav-item nav-link py-md-2 px-md-3">Home </router-link>
                            <!-- shop -->
                            <router-link to="/shop" class="nav-item nav-link py-md-2 px-md-3">Shop </router-link>
                           
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <!-- cart -->
                                    <router-link to="/cart" class="nav-item nav-link py-md-2 px-md-3"> <span>Cart</span></router-link>
                                    <!-- checkout -->
                                    <router-link to="/checkout" class="nav-item nav-link py-md-2 px-md-3">Checkout </router-link>
                                </div>
                            </div>
                            <!-- contact -->
                            <router-link to="/contact" class="nav-item nav-link py-md-2 px-md-3">Contact </router-link>
                        </div>
                      
                        <ul  class="navbar-nav mb-2 mb-lg-0">
                            <li  class="nav-item">
                                <router-link class="nav-link" aria-current="page" to="/login">Login</router-link>
                            </li>
                            <li v-if="!userConnected">
                                <router-link class="nav-link" aria-current="page" to="/dashboard">Dashboard {{ userConnected }}</router-link>

                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link" aria-current="page" to="/register">Regitser</router-link>
                            </li>
                        </ul>
                        
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
     
    </div>
</template>
<script setup>
import { onMounted, ref } from "vue";
const userConnected = ref(false)
onMounted( () => {
    if ( window.Laravel.user) {
                userConnected.value = window.Laravel.name
              
            }
    }) 
   

</script>