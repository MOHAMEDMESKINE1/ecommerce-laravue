<template>


<!-- add Product -->
<div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-info" id="exampleModalLabel">Add Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
        <form>
           <div class="row">
              <div class="col-md-6">
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
              </div>
              <div class="col-md-6">
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
              </div>
              <div class="col-md-12">
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
              </div>
              <!-- size -->
              <div class="col-md-11 mb-3 mx-auto ">

                  <div class="d-flex justify-content-between  border border-2 p-2">

                    <input class="form-check-input" type="radio" v-model="product.size" id="XS" name="size" value="XS">
                    <label class="form-check-label " for="XS">XS</label>
                    <input class="form-check-input" type="radio" v-model="product.size" id="XL" name="size" value="XL">
                    <label class="form-check-label " for="XL">XL</label>
                    <input class="form-check-input" type="radio" v-model="product.size" id="S" name="size" value="S">
                    <label class="form-check-label " for="S">S</label>
                    <input class="form-check-input" type="radio" v-model="product.size" id="M" name="size" value="M">
                    <label class="form-check-label " for="M">M</label>
                    <input class="form-check-input" type="radio" v-model="product.size" id="L" name="size" value="L">
                    <label class="form-check-label " for="L">L</label>

                  </div>
                  <!-- color -->
                  <div class="d-flex justify-content-between  border border-2 p-2 mt-3 ">

                    <input class="form-check-input " type="radio" v-model="product.color" id="Red" name="color" value="Red">
                    <label class="form-check-label text-danger " for="Red">Red</label>
                    <input class="form-check-input" type="radio" v-model="product.color" id="Black" name="color" value="Black">
                    <label class="form-check-label " for="Black">Black</label>
                    <input class="form-check-input" type="radio" v-model="product.color" id="White" name="color" value="White">
                    <label class="form-check-label text-secondary  " for="White">White</label>
                    <input class="form-check-input" type="radio" v-model="product.color" id="Yellow" name="color" value="Yellow">
                    <label class="form-check-label text-warning " for="Yellow">Yellow</label>
                    <input class="form-check-input" type="radio" v-model="product.color" id="Green" name="color" value="Green">
                    <label class="form-check-label  text-success" for="Green">Green</label>

                  </div>
                               
              </div>

            <!--  category -->
            <div class="form-floating mb-3">
              <select name="category" id="category" v-model="category" class="form-select shadow-none border border-2" >
                <option selected class="text-secondary">  select category</option>
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
                              <table class="table  table-bordered p-2 text-center">
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
                                <tbody class="table-striped ">
                                
                                  <template v-for="product in products" :key="product.id">
                                    <tr>
                                      <td>
                                        <img :src="product.photo" class="me-2" alt="image"> {{product.name}}
                                      </td>
                                      <td> {{product.description}}</td>
                                      <td> {{product.price}}</td>
                                      <td class="text-decoration-line-through text-danger fw-bold"> {{product.old_price}} </td>
                                      <td>
                                        <h1 class="badge badge-gradient-success   text-white">{{product.quantity}}</h1>
                                      </td>
                                      <td>
                                        <h1 class="badge badge-gradient-primary   text-white">{{product.categories.name}}</h1>
                                      </td>
                                      <td> {{formattedDate(product.created_at,'DD/MM/YYYY HH:mm')}}  </td>
                                      <td> {{formattedDate(product.updated_at,'DD/MM/YYYY HH:mm')}}  </td>
                                      <td> 
                                        <div class="">
                                          <a href="#"  class=" mdi mdi-grease-pencil fs-4  mx-2"></a>
                                          <a href="#" @click.prevent="Confirmation()"  class="mdi mdi-delete-forever fs-4 text-danger"></a>
                                        </div>
                                      </td>
                                    </tr>
                                  </template>
                                  <!-- <tr>
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
                                        <a href="#" @click.prevent="Confirmation()"  class="mdi mdi-delete-forever fs-4 text-danger"></a>
                                      </div>
                                    </td>
                                  </tr> -->
                                 
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
        </div>
        <!-- products -->
        <!-- pagination -->
          <Pagination></Pagination>
        <!-- pagination -->

        </Dashboard>
    </div>


</template>
<script setup>
import Dashboard from '../Dashboard.vue';
import Pagination from '../Pagination.vue';
import { onMounted } from '@vue/runtime-core';
import { ref } from 'vue';
import moment from 'moment';
import {showToast,errorToast,showConfirmation} from "../../toaster.js"
import formattedDate from '../../helpers/index.js'

import useProducts from '../../composables/products';

  const {products,getProducts} = useProducts();

  onMounted( getProducts)

  // form inputs
  const product = ref({
    name: "product name",
    description :  "description",
    price : 150,
    old_price : 200,
    quantity : 2,
    size:"XL",
    color:"Black"

  })

  function addedProduct() {
      showToast('Product saved succefully!');
  
  }
  async function  Confirmation() {
      const confirmed = await showConfirmation(
        'Are you sure?',
        'This action cannot be undone!',
        'Yes, proceed!',
        'No, cancel!'
      );

      if (confirmed) {
        showToast('Product deleted successfully!');
      
      } else {
        errorToast('Product cancelled');
      }
    }

   

  
  

</script>
