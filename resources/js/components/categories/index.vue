<template>
    <div>


 <!-- add Product -->
 <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-info" id="exampleModalLabel">Add Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <!--  name -->
            <div class="form-floating mb-3">
              <input type="text" class="form-control shadow-none border border-2" name="category" v-model="category.name" id="category" >
              <label for="category" class="fw-bold" > Name</label>
            </div>

            <div class="d-flex ">
              <button type="button"  @click="SuccessCategory"  class="btn btn-info">Save changes</button>
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
                              <button class="btn btn-sm border border-primary btn-outline-primary "
                              data-bs-toggle="modal" data-bs-target="#addCategory" >                              

                              
                              
                                <i class="mdi mdi-hospital  mx-2"></i>
                                Add Category
                              </button>
                            </div>
                            <h4 class="card-title text-info">Categories List</h4>
                            <div class="table-responsive">
                              <table class="table ">
                                <thead class="text-lead">
                                  <tr>
                                    <th> Name </th>
                                    <th> Registred  </th>
                                    <th> Last Updated </th>
                                    <th> Action </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    
                                    <td>Lorem ipsum dolor sit.</td>
                                    <td> Dec 5, 2023 </td>
                                    <td> Dec 5, 2023  </td>
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
        </Dashboard>
    </div>

</template>
<script setup>
import Dashboard from '../Dashboard.vue';import { ref } from 'vue';

import {showToast,errorToast,showConfirmation} from "../../toaster.js"
  // form inputs
  const category = ref({ name: "", })

  function SuccessCategory() {
      showToast('Category added succefully!');
  
  }
  async function  Confirmation() {
      const confirmed = await showConfirmation(
        'Are you sure?',
        'This action cannot be undone!',
        'Yes, proceed!',
        'No, cancel!'
      );

      if (confirmed) {
        showToast('Category deleted successfully!');
      
      } else {
        errorToast('Category cancelled');
      }
    }

</script>