<template>
    <!-- Footer Start -->
        <div class="container-fluid bg-light text-dark mt-5 pt-5">
            <div class="row px-xl-5 pt-5">
                <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                    <router-link to="/home" class="text-decoration-none">
                        <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border-2  border-secondary px-3 mr-1">E</span>Shopper</h1>
                    </router-link>
                    <p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem et magna ipsum dolore amet erat.</p>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                       
                        <div class="col-md-4 mb-5">
                            <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                            <div class="d-flex flex-column justify-content-start">
                                <router-link class="text-dark mb-2" to="/home"><i class="fa fa-angle-right mr-2"></i>Home</router-link>
                                <router-link class="text-dark mb-2" to="/shop"><i class="fa fa-angle-right mr-2"></i>Our Shop</router-link>
                                <router-link class="text-dark mb-2" to="/details_product"><i class="fa fa-angle-right mr-2"></i>Shop Detail</router-link>
                                <router-link class="text-dark mb-2" to="/cart"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</router-link>
                                <router-link class="text-dark mb-2" to="/checkout"><i class="fa fa-angle-right mr-2"></i>Checkout</router-link>
                                <router-link class="text-dark" to="/contact"><i class="fa fa-angle-right mr-2"></i>Contact Us</router-link>
                            </div>
                        </div>
                        <div class="col-md-8 mb-5">
                            <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                            <form action="">
                                <div class="form-group">
                                    <input type="text" class="form-control border-2 py-3" placeholder="Your Name" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control border-2 py-3" placeholder="Your Email"
                                        />
                                </div>
                                <div>
                                    <button class="btn btn-primary rounded-0 shadow shadow-md btn-block border-0 w-100 py-3" type="submit">Subscribe Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row border-top border-light mx-xl-5 py-4">
                <div class="col-md-6 px-xl-0">
                    <p class="mb-md-0 text-center text-md-left text-dark">
                        &copy; <a class="text-dark font-weight-semi-bold" href="#">E-Shop</a>. All Rights Reserved. Designed
                        by
                        <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a><br>
                        Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                    </p>
                </div>
                <div class="col-md-6 px-xl-0 text-center text-md-right">
                    <img class="img-fluid" src="img/payments.png" alt="">
                </div>
            </div>
        </div>
    <!-- Footer End -->
       <!-- Back to Top -->
       <button
       @click="backToTop"
        type="button"
        class="btn btn-gradient-success rounded-circle btn-floating "
        id="btn-back-to-top"
                >
        <i class="fas fa-arrow-up"></i>
        </button>
</template>
<script setup>

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    document.getElementById("btn-back-to-top").style.display = "block";
  } else {
    document.getElementById("btn-back-to-top").style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document


function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
<style>
#btn-back-to-top {
  position: fixed;
  bottom: 20px;
  right: 20px;
  display: none;

}
</style>