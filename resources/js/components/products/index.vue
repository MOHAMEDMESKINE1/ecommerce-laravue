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
       
        <form  method="post" enctype="multipart/form-data">
           <div class="row">
              <div class="col-6 ">
                 <!--  title -->
                  <div class="form-floating mb-3">
                    <input  type="text" class="form-control shadow-none border border-2"  name="title" v-model="title" id="product" />
                    <label for="product" class="fw-bold" >Product Name</label>

                    <!-- error title -->
                    
                    <Error  :errors="errors.title"/>
                  </div>
                  <!--  photo -->
                  <div class="form-floating p-0 mb-3">
                    <input class="form-control form-control-sm shadow-none border border-2 border border-2" id="photo"   type="file" @change="onImageChanged">
                    <label for="photo" class="fw-bold" >Photo </label>

                  </div>
              </div>
              <div class="col-md-6">
                  <!--  description -->
                <div class="form-floating mb-3">
                  <textarea  class="form-control shadow-none border border-2" name="description" v-model="description" id="description"></textarea>
                  <label for="description" class="fw-bold" >Description</label>

                   <!-- error description -->
                  <Error  :errors="errors.description"/>

                </div>
                <!--  price -->
                <div class="form-floating mb-3">
                  <input type="number"   class="form-control shadow-none border border-2" name="price" v-model="price" id="price"/>
                  <label for="price" class="fw-bold" >Price</label>
                   <!-- error price -->
                   <Error  :errors="errors.price"/>
                </div>
              </div>
              <div class="col-md-12">
                  <!--  old_price -->
                  <div class="form-floating mb-3">
                    <input type="number"  class="form-control shadow-none border border-2" name="old_price" v-model="old_price" id="old_price"/>
                    <label for="old_price" class="fw-bold" >Old Price</label>
                    
                    <!-- error old_price -->
                    <Error  :errors="errors.old_price"/>

                  </div>
                  <!--  quantity -->
                  <div class="form-floating mb-3">
                    <input type="number"  class="form-control shadow-none border border-2" name="quantity" v-model="quantity" id="quantity"/>
                    <label for="quantity" class="fw-bold" >Quantity</label>

                     <!-- error quantity -->
                     <Error  :errors="errors.quantity"/>
                    
                  </div>
              </div>
              <!-- size -->
              <div class="col-md-11 mb-3 mx-auto ">

                  <div class="d-flex justify-content-between  border border-2 p-2">

                    <input class="form-check-input" type="radio" v-model="size" id="XS" name="size" value="XS">
                    <label class="form-check-label " for="XS">XS</label>
                    <input class="form-check-input" type="radio" v-model="size" id="XL" name="size" value="XL">
                    <label class="form-check-label " for="XL">XL</label>
                    <input class="form-check-input" type="radio" v-model="size" id="S" name="size" value="S">
                    <label class="form-check-label " for="S">S</label>
                    <input class="form-check-input" type="radio" v-model="size" id="M" name="size" value="M">
                    <label class="form-check-label " for="M">M</label>
                    <input class="form-check-input" type="radio" v-model="size" id="L" name="size" value="L">
                    <label class="form-check-label " for="L">L</label>

                    

                  </div>
                  <!-- error size -->
                  <Error  :errors="errors.size"/>
                  <!-- color -->
                  <div class="d-flex justify-content-between  border border-2 p-2 mt-3 ">

                    <input class="form-check-input " type="radio" v-model="color" id="Red" name="color" value="Red">
                    <label class="form-check-label text-danger " for="Red">Red</label>
                    <input class="form-check-input" type="radio" v-model="color" id="Black" name="color" value="Black">
                    <label class="form-check-label " for="Black">Black</label>
                    <input class="form-check-input" type="radio" v-model="color" id="White" name="color" value="White">
                    <label class="form-check-label text-secondary  " for="White">White</label>
                    <input class="form-check-input" type="radio" v-model="color" id="Yellow" name="color" value="Yellow">
                    <label class="form-check-label text-warning " for="Yellow">Yellow</label>
                    <input class="form-check-input" type="radio" v-model="color" id="Green" name="color" value="Green">
                    <label class="form-check-label  text-success" for="Green">Green</label>

                      


                  </div>
                  <!-- error color -->
                  <Error  :errors="errors.color"/>
                               
              </div>

            <!--  category -->
            <div class="form-floating mb-3">
              <select  name="category_id" id="category" v-model="category_id" class="form-select shadow-none border border-2" >
                <option selected class="text-black">  select category</option>
               <option v-for="category in categories.data" :value='category.id '  :key="category.id">
                {{category.name}}
              </option>
            
              </select>
              <label for="category"  class="fw-bold" >Category</label>
              <!-- error category -->
              <Error  :errors="errors.category_id"/>

            </div>
           
            
              <div class="d-flex ">
                <button type="button"  @click.prevent="saveProduct()"  class="btn btn-info">Save changes</button>
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
                            <h4 class="card-title text-info">Products List ({{ products.total }})</h4>
                            <div class="mt-4 d-flex justify-content-between">
                              <div class="mb-3">
                                <label for="" class="form-label">Search Product</label>
                                <input type="text"
                                  class="form-control w-75 shadow shadow-sm " name="query"  v-model="query"  @change="searchProduct()"  id="search" aria-describedby="helpId" placeholder="">
                              </div>
                              <!-- <div class="mb-3">
                                <label for="" class="form-label">Filter Date</label>
                              <input type="date"
                                  class="form-control shadow shadow-sm " name="filter_date"  v-model="filter_date"  @change="filterProduct()"  id="search" aria-describedby="helpId" placeholder=""> 
                                
                              </div>  -->
                            </div>
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
                                    <th> Size  </th>
                                    <th> Created </th>
                                    <th> Last Updated </th>
                                    <th> Action </th>
                                  </tr>
                                </thead>
                                <tbody class="table-striped ">
                                
                                  <template v-for="product in products.data" :key="product.id">
                                    <tr>
                                      <td>
                                        <div v-if="product.photo">
                                          <img  :src="'storage/products/'+product.photo" class="me-2" alt="image">
                                          <p> {{product.title}}</p>
                                        </div>
                                        <div v-else>
                                          <img  src="assets/images/faces-clipart/pic-1.png" class="me-2" alt="image"> 
                                          <p> {{product.title}}</p>


                                        </div>
                                      </td>
                                    
                                      <td> {{product.description}}</td>
                                      <td> {{product.price}}</td>
                                      <td class="text-decoration-line-through text-danger fw-bold"> {{product.old_price}} </td>
                                      <td>
                                        <h1 class="badge badge-gradient-success   text-white">{{product.quantity}}</h1>
                                      </td>
                                      <td>
                                        <h1 class="badge badge-gradient-primary   text-white">{{product.categories.title}}</h1>
                                      </td>
                                      <td>
                                        <h1 class="badge badge-gradient-success   text-white">{{product.size}}</h1>
                                      </td>
                                      <td> {{formattedDate(product.created_at,'DD/MM/YYYY HH:mm')}}  </td>
                                      <td> {{formattedDate(product.updated_at,'DD/MM/YYYY HH:mm')}}  </td>
                                      <td> 
                                        <div class="">
                                          <router-link   :to="{name:'products.edit',params:{id:product.id}}" class=" mdi mdi-grease-pencil fs-4  mx-2"></router-link>
                                          <a href="#" @click.prevent="ConfirmationDelete(product.id)"  class="mdi mdi-delete-forever fs-4 text-danger"></a>
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
        <!-- products -->
        <!-- pagination -->
        <Bootstrap5Pagination
                              :data="products"
                              @pagination-change-page="getProducts"
          />
          
        <!-- pagination -->

        </Dashboard>
    </div>


</template>
<script setup>
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
import Error from '../../layouts/Error.vue';
import Dashboard from '../Dashboard.vue';
import { onMounted } from '@vue/runtime-core';
import { ref, watch  } from 'vue';
import {successToast,errorToast,showConfirmation} from "../../toaster.js"
import formattedDate from '../../helpers/index.js'

import useProducts from '../../composables/products';
import useCategories from '../../composables/categories';


// produtcs
  const {products,errors,
    getProducts,
    addProduct,
    destroyProduct,
    searchProduct,
    filterProduct
  } = useProducts();
// categories
  const {categories,getCategories} = useCategories();

  onMounted(() => {
    getProducts();
    getCategories();
  });
  // form inputs
  const title = ref('');
  const description = ref('');
  const price = ref(0);
  const old_price = ref(0);
  const quantity = ref(0);
  const photo = ref('');
  const category_id = ref(1);
  const size  = ref('');
  const color  = ref('');
  const query  = ref(null);
  const filter_date  = ref(null);


  function onImageChanged(e) {
        console.log(e.target.files[0]);
        photo.value=e.target.files[0]
  }
 
    watch(
    () => query.value,(newValue) => {
      searchProduct(newValue);
    },
    () => filter_date.value,(newValue) => {
      filterProduct(newValue);
    },

  );
  function saveProduct() {
        let formdata = new FormData();
        formdata.append('title',title.value)
        formdata.append('description',description.value)
        formdata.append('photo',photo.value)
        formdata.append('price',price.value)
        formdata.append('old_price',old_price.value)
        formdata.append('quantity',quantity.value)
        formdata.append('size',size.value)
        formdata.append('color',color.value)
        formdata.append('category_id',category_id.value)

        
        addProduct(formdata,'#addProduct','.modal-backdrop');

        // clear fields
        resetForm();
        // clear backdrop 


       

  }




  async function  ConfirmationDelete(id) {
      const confirmed = await showConfirmation(
        'Are you sure?',
        'This action cannot be undone!',
        'Yes, proceed!',
        'No, cancel!'
      );

      if (confirmed) {

        destroyProduct(id);

        successToast('Product deleted successfully!');
      
      } else {
        errorToast('Product cancelled');
      }
    }

      // clear fields
  const  resetForm = () => {
    title.value = ""
    description.value = ""
    price.value = ""
    old_price.value = ""
    quantity.value = ""
    category_id.value = ""
    size.value = ""
    title.value = ""
    color.value = ""
    title.value = ""
  }
 


   

  
  

</script>
