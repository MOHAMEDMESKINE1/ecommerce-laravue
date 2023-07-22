<template>
<!-- add Customer -->
<div class="modal fade" id="addCustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-info" id="exampleModalLabel">Add Customer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <!--  name -->
            <div class="form-floating mb-3">
              <input type="text" class="form-control shadow-none border border-2" name="customer" v-model="customer.name" id="product" >
              <label for="customer" class="fw-bold" > Name</label>
            </div>
            <!--  photo -->
            <div class="form-floating p-0 mb-3">
              <input class="form-control form-control-sm shadow-none border border-2 border border-2" id="photo" name="photo"  type="file">
              <label for="photo" class="fw-bold" >Photo </label>

            </div>

            <!--  role -->
            <div class="form-floating mb-3">
              <select name="role" id="role" v-model="customer.role" class="form-select shadow-none border border-2" >
                <option selected class="text-secondary">Open this select role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
              </select>
              <label for="Role"  class="fw-bold" >Role</label>

            </div>
            
            <div class="d-flex ">
              <button type="button"  @click="addCustomer"  class="btn btn-info">Save changes</button>
              <button type="button" class="btn btn-secondary mx-2" data-bs-dismiss="modal">Close</button>

            </div>
            
          </form>
      </div>
      
    </div>
  </div>
</div>
<!-- add Customer -->
    <div >
       <Dashboard>
         <!-- recents orders -->
         <div class="row ">
         
                      <div class="col-12 ">
                        <div class="card m-2">
                          <div class="card-body">
                            <div class="d-flex justify-content-end mb-2">
                              <button class="btn btn-sm border border-primary btn-outline-primary "
                              data-bs-toggle="modal" data-bs-target="#addCustomer"
                              >
                              
                                <i class="mdi mdi-hospital  mx-2"></i>
                                Add Customer
                              </button>
                            </div>
                            <h4 class="card-title text-info"> Customers List</h4>
                            <div class="table-responsive">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th> Customer </th>
                                    <th> Email </th>
                                    <th> Role </th>
                                    <th> Registred </th>
                                    <th> Last Updated  </th>
                                    <th> Action </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>
                                      <img src="assets/images/faces/face1.jpg" class="me-2" alt="image"> David Grey
                                    </td>
                                    <td> customer@gmail.com </td>
                                    <!-- role -->
                                    <td> 
                                         
                                            <div class=" mb-3">
                                              <select name="role" id="role" v-model="customer.role" style="width: 105px; " class="form-select  shadow-none border border-2" >
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                              </select>
                                            </div>
                                    </td>
                                    <!-- role -->
                                    <td> Dec 5, 2017 </td>
                                    <td> WD-12345 </td>
                                    <td> 
                                      <div class="">
                                        <a href="#" class=" mdi mdi-grease-pencil fs-4  mx-2"></a>
                                        <a href="#" @click.prevent="Confirmation" class="mdi mdi-delete-forever fs-4 text-danger"></a>
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
        import Pagination from '../Pagination.vue';

       </Dashboard>
    </div>
</template>
<script setup>
import Dashboard from '../Dashboard.vue';
import Pagination from '../Pagination.vue';

import {showToast,errorToast,showConfirmation} from "../../toaster.js"
import { ref } from 'vue';

  const customer = ref({
    name:"",
    role:"admin",

  })

  function addCustomer() {
        showToast('Customer added succefully!');
    
    }
async function  Confirmation() {
      const confirmed = await showConfirmation(
        'Are you sure?',
        'This action cannot be undone!',
        'Yes, proceed!',
        'No, cancel!'
      );

      if (confirmed) {
        showToast('Customer deleted successfully!');
      
      } else {
        errorToast('Customer cancelled');
      }
    }
</script>