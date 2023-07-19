<template>
    <div>
        <Dashboard>

            <div class="row ">
                      <div class="col-12 ">
                        <div class="card m-2">
                          <div class="card-body">
                            <div class="d-flex justify-content-end mb-2">
                              <button class="btn btn-sm border border-primary btn-outline-primary ">
                              
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
                                        <a href="" class=" mdi mdi-grease-pencil fs-4  mx-2"></a>
                                        <a href="" class="mdi mdi-delete-forever fs-4 text-danger"></a>
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
import Dashboard from './Dashboard.vue';

</script>