<template>


  <!-- add Product -->
<div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-info" id="exampleModalLabel">Add Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <!--  name -->
            <div class="form-floating mb-3">
              <input type="text" class="form-control shadow-none border border-2" name="product" v-model="product.name" id="product" >
              <label for="product" class="fw-bold" >Product Name</label>
            </div>
            <!--  photo -->
            <div class="form-floating p-0 mb-3">
              <input class="form-control form-control-sm shadow-none border border-2 border border-2" id="photo" name="photo"  type="file">
              <label for="photo" class="fw-bold" >Photo </label>

            </div>
            <!--  description -->
            <div class="form-floating mb-3">
              <textarea  class="form-control shadow-none border border-2" name="description" v-model="product.description" id="description"></textarea>
              <label for="description" class="fw-bold" >Description</label>
            </div>
            <!--  price -->
            <div class="form-floating mb-3">
              <input type="number"  class="form-control shadow-none border border-2" name="price" v-model="product.price" id="price"/>
              <label for="price" class="fw-bold" >Price</label>
            </div>
            <!--  old_price -->
            <div class="form-floating mb-3">
              <input type="number"  class="form-control shadow-none border border-2" name="old_price" v-model="product.old_price" id="old_price"/>
              <label for="old_price" class="fw-bold" >Old Price</label>
            </div>
            <!--  quantity -->
            <div class="form-floating mb-3">
              <input type="number"  class="form-control shadow-none border border-2" name="quantity" v-model="product.quantity" id="quantity"/>
              <label for="quantity" class="fw-bold" >Quantity</label>
            </div>
            <!--  category -->
            <div class="form-floating mb-3">
              <select name="category" id="category" v-model="category" class="form-select shadow-none border border-2" >
                <option selected class="text-secondary">Open this select category</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
              <label for="category"  class="fw-bold" >Category</label>

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
<!-- add Product -->
    <div>
        <Dashboard>
        
        <div class="row ">
                      <div class="col-12 ">
                        <div class="card m-2">
                          <div class="card-body">
                            <div class="d-flex justify-content-end mb-2">
                              <button class="btn btn-sm border border-primary btn-outline-primary"
                              data-bs-toggle="modal" data-bs-target="#addProduct" >                              
                                <i class="mdi mdi-hospital  mx-2"></i>
                                Add Product
                              </button>
                            </div>
                            <h4 class="card-title text-info">Products List</h4>
                            <div class="table-responsive">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th> Product </th>
                                    <th> Description </th>
                                    <th> Current Price  </th>
                                    <th> Old Price  </th>
                                    <th> Quantity  </th>
                                    <th> Category  </th>
                                    <th> Created </th>
                                    <th> Last Updated </th>
                                    <th> Action </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>
                                      <img src="assets/images/faces/face1.jpg" class="me-2" alt="image"> David Grey
                                    </td>
                                    <td> Lorem ipsum dolor sit amet.</td>
                                    <td> 100 $ </td>
                                    <td class="text-decoration-line-through text-danger fw-bold"> 200 $ </td>
                                    <td>
                                      <h1 class="badge badge-gradient-success   text-white">10</h1>
                                    </td>
                                    <td>
                                      <h1 class="badge badge-gradient-primary   text-white">T-shirts</h1>
                                    </td>
                                    <td> Dec 5, 2017  </td>
                                    <td> Dec 5, 2017  </td>
                                    <td> 
                                      <div class="">
                                        <a href="#"  class=" mdi mdi-grease-pencil fs-4  mx-2"></a>
                                        <a href="#" @click.prevent="deletedProduct()"  class="mdi mdi-delete-forever fs-4 text-danger"></a>
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
        <!-- products -->
        </Dashboard>
    </div>


</template>
<script setup>
import Dashboard from '../Dashboard.vue';
import { ref } from 'vue';

import {showToast,errorToast} from "../../toaster.js"
  // form inputs
  const product = ref({
    name: "product name",
    description :  "description",
    price : 150,
    old_price : 200,
    quantity : 2

  })

  function addedProduct() {
      showToast('Product added succefully!');
  
  }
  function deletedProduct() {
    errorToast('Product deleted succefully!');
  
  }

  
  

</script>
