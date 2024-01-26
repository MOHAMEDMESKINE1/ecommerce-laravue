<template>

    <!-- add Order -->
<div class="modal fade" id="addOrder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header ">
        
        <h1 class="modal-title fs-5 text-info" id="exampleModalLabel">Add Order</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
           <!--  customer -->
           <div class="form-floating mb-3">
              <select name="customer" id="customer" v-model="order.customer" class="form-select shadow-none border border-2" >
                <option selected class="text-secondary"> select a Customer</option>
                <option  v-for="(customer,index) in customers.data"   :key="index" :value="customer.id">{{customer.name}}</option>
             
              </select>
              <label for="customer"  class="fw-bold" >Customer</label>

            </div>
           <!--  product -->
           <div class="form-floating mb-3">
              <select name="product" id="product" v-model="order.product" class="form-select shadow-none border border-2" >
                <option selected class="text-secondary"> select a Product</option>
                <option  v-for="(product,index) in products.data"   :key="index" :value="product.id">{{product.title}}</option>
              </select>
              <label for="product"  class="fw-bold" >Product</label>

            </div>
            <!--  price -->
            <div class="form-floating mb-3">
              <input type="number"  class="form-control shadow-none border border-2" name="price" v-model="order.price" id="price"/>
              <label for="price" class="fw-bold" >Price</label>
            </div>
             <!--  quantity -->
             <div class="form-floating mb-3">
              <input type="number"  class="form-control shadow-none border border-2" name="quantity" v-model="order.quantity" id="quantity"/>
              <label for="quantity" class="fw-bold" >Quantity</label>
            </div>
            
             <!--  total -->
             <div class="form-floating mb-3">
              <input type="number"  class="form-control shadow-none border border-2" name="total" v-model="order.total" id="total"/>
              <label for="total" class="fw-bold" >Total</label>
            </div>

           <!-- paid -->
          
           <div class="d-flex justify-content-center shadow-none border border-2 mb-2 p-1 rounded">
            <!-- <label for="total" class="mb-2 text-seondary" >Payment</label> -->

           
           <div class="form-check form-check-inline mb-2">
            <input class="form-check-input" type="radio" v-model="order.payment" name="payment" id="paid" value="0">
            <label class="form-check-label fw-bold" for="paid">Paid</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" v-model="order.payment" name="payment" id="notpaid" value="1">
            <label class="form-check-label fw-bold" for="notpaid">Not Paid</label>
          </div>
        </div>
          <!-- status -->
          <div class="form-floating mb-3">
              <select name="status" id="status" v-model="order.status"  class="form-select shadow-none border border-2" >
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
              <button type="button"  @click="saveOrder()"  class="btn btn-info">Save changes</button>
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
                              <button class="btn btn-sm border border-primary btn-outline-primary"
                              data-bs-toggle="modal" data-bs-target="#addOrder" >                              
                                <i class="mdi mdi-hospital  mx-2"></i>
                                Add Order
                              </button>
                            </div>
                            <div class="mt-4 d-flex justify-content-between">
                              <div class="mb-3">
                                <!-- <label for="" class="form-label">Search Order</label> -->
                                <!-- <input type="text"
                                  class="form-control w-75 shadow shadow-sm " name="q"  v-model="q"  @change="searchOrder()"  id="search" aria-describedby="helpId" placeholder=""> -->
                                  <!-- <select  id="status" name="query"  v-model="query"  @change="searchOrder()"  class="form-select shadow-none border border-2" >
                                    <option selected class="text-secondary"> select status</option>
                                    <option value="">all</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Processing">Processing</option>
                                    <option value="Confirmed">Confirmed</option>
                                    <option value="Shipped">Shipped</option>
                                    <option value="Delivered">Delivered</option>
                                    <option value="On Hold">On Hold</option>
                                    <option value="Cancelled">Cancelled</option>
                                  </select> -->
                              </div>
                            
                            </div>
                          <!-- <div class="d-flex justify-content-start">
                            <label for="" class="form-label">Search Product</label>
                                <input type="text"
                                  class="form-control w-25 shadow shadow-sm " name="query"  v-model="query"  @change="searchProduct()"  id="search" aria-describedby="helpId" placeholder="">

                          </div> -->
                          <h4 class="card-title text-info">Orders List ({{ orders.total }})</h4>
                          <div class="table-responsive">
                            <table class="table table-bordered p-2 text-center">
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
                              <template v-for="order in orders.data" :key="order.id">
                                <tr>
                                  <td>
                                    <!-- <img src="assets/images/faces/face1.jpg" class="me-2" alt="image"> Customer name -->
                                    <span class="text-primary fw-bold"> {{ order.user.name }}</span>
                                  </td>
                                  <td>
                                    <img  :src="'/products/images/'+order.products.photo" class="me-2" alt="image"> {{order.products.title}}
                                  </td>
                                  <td>{{order.quantity}} $</td>
                                  <td>{{order.price}} $</td>
                                  <td>{{order.total}} $</td>
                                  <td> 

                                    <span v-if="order.payment === 0" class="badge badge-gradient-danger p-1  text-white"> Not Paid</span>
                                    <span v-else  class="badge badge-gradient-success p-1  text-white">  Paid</span>
                                  </td>
                                  <td> <span class="badge badge-gradient-primary p-1  text-white">{{order.status}}</span></td>
                                  <td>{{formattedDate(order.created_at,'DD/MM/YYYY HH:mm')}}</td>
                                  <td>{{formattedDate(order.updated_at,'DD/MM/YYYY HH:mm')}}</td>
                                  <td> 
                                    <div   class="d-flex justify-content-between">
                                      
                                       <router-link :to="{name:'order.details',params:{id:order.id}}"   class=" mdi mdi-eye text-success fs-4  mx-2"></router-link>
                                       <!-- <router-link   :to="{name:'orders_details',params:{id:order.id}}" class=" mdi mdi-grease-pencil fs-4  mx-2"></router-link> -->
                                      <a href="#"  @click.prevent="Confirmation(order.id)"  class="mdi mdi-delete-forever fs-4 text-danger"></a>

                                    </div>
                                  </td>
                                </tr>
                              </template>
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
      </div>
      <!-- recents orders -->
       <!-- pagination -->
       <Bootstrap5Pagination
                              :data="orders"
                              @pagination-change-page="getOrders"
          />
          
        <!-- pagination -->
      </Dashboard>
  </div>

    
</template>
<script setup>
import Dashboard from '../Dashboard.vue';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
import formattedDate from '../../helpers/index'

import { reactive,ref, watch } from 'vue';
import { onMounted } from '@vue/runtime-core';

import {errorToast,showConfirmation} from "../../toaster.js";
import useOrders from '../../composables/orders';


const {orders ,
  customers,
  products,
  getProducts,
  getCustomers ,
  searchOrder,
  getOrders,
  addOrder,
  destroyOrder
} = useOrders();
// form inputs
const order =reactive({
    product: "",
    customer:"",
    status :  "",
    price : 0,
    payment : 0,
    quantity : 0,
    total:0

  })
// 
const q  = ref(null);

onMounted(() => {
  getOrders();
  getCustomers();
  getProducts();
 
})

watch(
    () => q.value,(newValue) => {
      searchOrder(newValue);
    }
)
  const saveOrder = () => {

      addOrder(order,'#addOrder','.modal-backdrop')

   
  }

  async function  Confirmation(id) {
      const confirmed = await showConfirmation(
        'Are you sure?',
        'This action cannot be undone!',
        'Yes, proceed!',
        'No, cancel!'
      );

      if (confirmed) {
        destroyOrder(id)
        showToast('Order deleted successfully!');
      
      } else {
        errorToast('Order cancelled');
      }
    }
  

  
</script>