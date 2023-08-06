<template>
    <div>


 <!-- add category -->
 <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-info" id="exampleModalLabel">Add Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">
            <!--  name -->
            <div class="form-floating mb-3">
              <input type="text" required class="form-control shadow-none border border-2" name="title" v-model="title" id="category" >
              <label for="category" class="fw-bold" > Name</label>
            
            </div>

            <div class="d-flex ">
              <button type="button"  @click.prevent="storeCategory()"  class="btn btn-info">Save changes</button>
              <button type="button" class="btn btn-secondary mx-2" data-bs-dismiss="modal">Close</button>

            </div>
            
          </form>
      </div>
      
    </div>
  </div>
</div>
<!-- add Category -->

        <Dashboard>

            <div class="row ">
                      <div class="col-12 ">
                        <div class="card m-2">
                          <div class="card-body">
                            <div class="d-flex justify-content-end mb-2">
                              <button class="btn btn-sm border border-primary btn-outline-primary"
                              data-bs-toggle="modal" data-bs-target="#addCategory" >                              
                                <i class="mdi mdi-hospital  mx-2"></i>
                                Add Category
                              </button>
                            </div>
                            <h4 class="card-title  text-info">Categories List ({{ categories.total }})</h4>
                            <div class="table-responsive">
                              <table class="table table-bordered p-2 text-center">
                                <thead class="text-lead ">
                                  <tr >
                                    <th> Name </th>
                                    <th> Registred  </th>
                                    <th> Last Updated </th>
                                    <th> Action </th>
                                  </tr>
                                </thead>
                                <tbody>
                                 <template v-for="category in categories.data" :key="category.id">
                                  <tr>
                                    
                                    <td>{{category.title}}</td>
                                    <td>{{formattedDate(category.created_at,'DD/MM/YYYY HH:mm')}}</td>
                                    <td>{{formattedDate(category.updated_at,'DD/MM/YYYY HH:mm')}}  </td>
                                    <td> 
                                      <div class="">
                                        <a href="#"  class=" mdi mdi-grease-pencil fs-4  mx-2"></a>
                                        <a href="#" @click.prevent="ConfirmationDelete(category.id)" class="mdi mdi-delete-forever fs-4 text-danger"></a>
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
       <div class="d-flex justify-content-center">
          <!-- pagination -->
          <Bootstrap5Pagination
                              :data="categories"
                              @pagination-change-page="getCategories"
          />
          
        <!-- pagination -->
       </div>
        </Dashboard>
    </div>

</template>
<script setup>
import Dashboard from '../Dashboard.vue';
import { onMounted, ref } from 'vue';
import formattedDate from '../../helpers/index.js'
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
import useCategories from '../../composables/categories.js';
import {errorToast,showConfirmation, successToast} from "../../toaster.js"  
// category
  const title =ref("");
  const {categories,errors,getCategories,addCategory,destroyCategory} = useCategories();

  onMounted(()=> {
    getCategories()
  })
  

  function storeCategory() {
      if(title.value!=="" ){
        addCategory({title:title.value},"#addCategory",".modal-backdrop")

      }else{
        errorToast(' category name required');
      }
  
  }
  async function  ConfirmationDelete(id) {
      const confirmed = await showConfirmation(
        'Are you sure?',
        'This action cannot be undone!',
        'Yes, proceed!',
        'No, cancel!'
      );

      if (confirmed) {
        destroyCategory(id)
        successToast('Category deleted successfully!');
      
      } else {
        errorToast('Deletion cancelled');
      }
    }

</script>