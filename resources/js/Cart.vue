<template>
    <div>
   <Main>
    <!-- Cart Start -->
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <div class="col-lg-8 table-responsive mb-5">
                    <table class="table table-bordered text-center mb-0">
                        <thead class="bg-secondary text-dark">
                            <tr>
                                <th>Products </th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove </th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <template v-for="cart in carts" :key="cart.id">
                                <tr>
                                <td class="align-middle"><img :src="'storage/products/'+cart.products.photo" alt="" style="width: 50px;"> {{cart.products.title}}</td>
                                <td class="align-middle"> {{cart.products.price}}</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus" >
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control shadow-none form-control-sm  bg-light text-center" :value="cart.products.quantity">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">${{cart.products.old_price}}</td>
                                <td class="align-middle">
                                    <!-- <a href="#" class="btn btn-sm btn-danger"  @click.prevent="Confirmation(cart.id)"><i class="fa fa-times"></i></a> -->
                                    <a href="#"  @click.prevent="Confirmation(cart.id)"  class="mdi mdi-delete-forever fs-4 text-danger"></a>

                                </td>
                            </tr>
                            </template>
                          
                            <!-- <tr>
                                <td class="align-middle"><img src="img/product-2.jpg" alt="" style="width: 50px;"> Colorful Stylish Shirt</td>
                                <td class="align-middle">$150</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus" >
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm shadow-none bg-light text-center" value="1">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">$150</td>
                                <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></td>
                            </tr>
                            <tr>
                                <td class="align-middle"><img src="img/product-3.jpg" alt="" style="width: 50px;"> Colorful Stylish Shirt</td>
                                <td class="align-middle">$150</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus" >
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control shadow-none form-control-sm bg-light text-center" value="1">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">$150</td>
                                <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></td>
                            </tr>
                            <tr>
                                <td class="align-middle"><img src="img/product-4.jpg" alt="" style="width: 50px;"> Colorful Stylish Shirt</td>
                                <td class="align-middle">$150</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus" >
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control shadow-none form-control-sm bg-light text-center" value="1">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">$150</td>
                                <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></td>
                            </tr>
                            <tr>
                                <td class="align-middle"><img src="img/product-5.jpg" alt="" style="width: 50px;"> Colorful Stylish Shirt</td>
                                <td class="align-middle">$150</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus" >
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control shadow-none form-control-sm bg-light text-center" value="1">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">$150</td>
                                <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <form class="mb-5" action="">
                        <div class="input-group">
                            <input type="text" class="form-control py-2  shadow-sm rounded-0" placeholder="Coupon Code">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary rounded-0 py-2">Apply Coupon</button>
                            </div>
                        </div>
                    </form>
                    <div class="card border-light border-5 mb-5">
                        <div class="card-header bg-light border-0">
                            <h4 class="font-weight-semi-bold m-0">s Summary</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">Subtotal</h6>
                                <h6 class="font-weight-medium">$150</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">$10</h6>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Total</h5>
                                <h5 class="font-weight-bold">$160</h5>
                            </div>
                            <button class="btn btn-lg btn-block btn-warning rounded rounded-0 shadow-sm font-weight-bold w-100 my-3 py-3">Proceed to Check Out</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Cart End -->

</Main>

    </div>
</template>

<script setup>

import Main from './layouts/Main.vue'


import useProducts from '../js/composables/products.js';
import { onMounted } from '@vue/runtime-core';
import {errorToast,showConfirmation, successToast} from "../js/toaster.js";

// produtcs
const {carts,getCart,destroyCart} = useProducts();

onMounted(() => {
    getCart();
})
async function  Confirmation(id) {
      const confirmed = await showConfirmation(
        'Are you sure?',
        'This action cannot be undone!',
        'Yes, proceed!',
        'No, cancel!'
      );

      if (confirmed) {
        
        destroyCart(id)

        console.log("clicked");
        successToast('Cart deleted successfully!');
      
      } else {
        errorToast('Cart cancelled');
      }
    }
</script>

<style>
</style>