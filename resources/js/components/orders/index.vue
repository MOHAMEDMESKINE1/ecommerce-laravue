<template>

    <!-- add Order -->
<div class="modal fade" id="addOrder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-info" id="exampleModalLabel">Add Order</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
           <!--  customer -->
           <div class="form-floating mb-3">
              <select name="customer" id="customer" v-model="product.customer" class="form-select shadow-none border border-2" >
                <option selected class="text-secondary"> select a Customer</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
              <label for="customer"  class="fw-bold" >Customer</label>

            </div>
           <!--  product -->
           <div class="form-floating mb-3">
              <select name="product" id="product" v-model="product.product" class="form-select shadow-none border border-2" >
                <option selected class="text-secondary"> select a Product</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
              <label for="product"  class="fw-bold" >Product</label>

            </div>
            <!--  price -->
            <div class="form-floating mb-3">
              <input type="number"  class="form-control shadow-none border border-2" name="price" v-model="product.price" id="price"/>
              <label for="price" class="fw-bold" >Price</label>
            </div>
             <!--  quantity -->
             <div class="form-floating mb-3">
              <input type="number"  class="form-control shadow-none border border-2" name="quantity" v-model="product.quantity" id="quantity"/>
              <label for="quantity" class="fw-bold" >Quantity</label>
            </div>
            
             <!--  total -->
             <div class="form-floating mb-3">
              <input type="number"  class="form-control shadow-none border border-2" name="total" v-model="product.total" id="total"/>
              <label for="total" class="fw-bold" >Total</label>
            </div>

           <!-- paid -->
          
           <div class="d-flex justify-content-center shadow-none border border-2 mb-2 p-1 rounded">
            <!-- <label for="total" class="mb-2 text-seondary" >Payment</label> -->

           
           <div class="form-check form-check-inline mb-2">
            <input class="form-check-input" type="radio" v-model="product.payment" name="paid" id="paid" value="Paid">
            <label class="form-check-label fw-bold" for="paid">Paid</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" v-model="product.payment" name="notpaid" id="notpaid" value="Not Paid">
            <label class="form-check-label fw-bold" for="notpaid">Not Paid</label>
          </div>
        </div>
          <!-- status -->
          <div class="form-floating mb-3">
              <select name="status" id="status" v-model="product.status" class="form-select shadow-none border border-2" >
                <option selected class="text-secondary"> select status</option>
                <option value="Pending">Pending</option>
                <option value="Processing">Processing</option>
                <option value="Confirmed">Confirmed</option>
                <option value="Shipped">Shipped</option>
                <option value="Delivered">Delivered</option>
                <option value="On Hold">On Hold</option>
                <option value="Cancelled">Cancelled</option>
              </select>
              <label for="status"  class="fw-bold" >Status</label>

            </div>
                    
            <div class="d-flex ">
              <button type="button"  @click="addedProduct"  class="btn btn-info">Save changes</button>
              <button type="button" class="btn btn-secondary mx-2" data-bs-dismiss="modal">Close</button>
            </div>
            
          </form>
      </div>
      
    </div>
  </div>
</div>
<!-- add Order -->
  <div >
      <Dashboard>
        <!-- recents orders -->
        <div class="row ">
                    <div class="col-12 ">
                      <div class="card m-2">
                        <div class="card-body">
                          <div class="d-flex justify-content-end mb-2">
                            <button class="btn btn-sm border border-primary btn-outline-primary "
                            data-bs-toggle="modal" data-bs-target="#addOrder"
                            >
                            
                              <i class="mdi mdi-hospital  mx-2"></i>
                              Add Order
                            </button>
                          </div>
                          <h4 class="card-title text-info">Orders List</h4>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th> Customer </th>
                                  <th> Product </th>
                                  <th> Quantity </th>
                                  <th> Price </th>
                                  <th> Total Amount </th>
                                  <th>  Paid </th>
                                  <th> Status </th>
                                  <th> Registred  </th>
                                  <th> Last Updated </th>
                                  <th> Action </th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>
                                    <img src="assets/images/faces/face1.jpg" class="me-2" alt="image"> Customer name
                                  </td>
                                  <td>
                                    <img src="assets/images/faces/face1.jpg" class="me-2" alt="image"> Product description
                                  </td>
                                  <td>5 </td>
                                  <td>5 $</td>
                                  <td>25 $</td>
                                  <td> <span class="badge badge-gradient-success p-1  text-white">paid</span></td>
                                  <td> <span class="badge badge-gradient-danger p-1  text-white">cancelled</span></td>
                                  <td> Dec 5, 2017 </td>
                                  <td> Dec 5, 2017  </td>
                                  <td> 
                                    <div class="d-flex justify-content-between">
                                      
                                       <router-link to="/orders_details"  class=" mdi mdi-eye text-success fs-4  mx-2"></router-link>
                                      <a href="#" class=" mdi mdi-grease-pencil fs-4  mx-2"></a>
                                      <a href="#"  @click.prevent="Confirmation()"  class="mdi mdi-delete-forever fs-4 text-danger"></a>

                                    </div>
                                  </td>
                                </tr>
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
      </div>
      <!-- recents orders -->
      <Pagination></Pagination>
      </Dashboard>
  </div>

    
</template>
<script setup>
import Dashboard from '../Dashboard.vue';
import Pagination from '../Pagination.vue';

import { ref } from 'vue';
import {showToast,errorToast,showConfirmation} from "../../toaster.js";

// form inputs
const product = ref({
    product: "",
    customer:"tedy",
    status :  "Cancelled",
    price : 150,
    payment : "paid",
    quantity : 2,
    total:100

  })
// 



  function addedProduct() {
      showToast('Order saved succefully!');
   
  }

  async function  Confirmation() {
      const confirmed = await showConfirmation(
        'Are you sure?',
        'This action cannot be undone!',
        'Yes, proceed!',
        'No, cancel!'
      );

      if (confirmed) {
        showToast('Order deleted successfully!');
      
      } else {
        errorToast('Order cancelled');
      }
    }
  

  
</script>