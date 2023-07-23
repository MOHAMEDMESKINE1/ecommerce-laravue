<template>
    <div>
        <Dashboard>

            <div class="row ">
                      <div class="col-12 ">
                        <div class="card m-2">
                          <div class="card-body">
                            <h4 class="card-title text-info">Payments List</h4>
                            <div class="table-responsive">
                              <table class="table text-center table-bordered p-2">
                                <thead class="text-lead">
                                  <tr>
                                    <th> Customer </th>
                                    <th> Order  </th>
                                    <th> Payment method </th>
                                    <th> Amount </th>
                                    <th> Created </th>
                                    <th> Updated </th>
                                    <th> Details </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    
                                    <td>
                                      <img src="assets/images/faces/face1.jpg" class="me-2" alt="image"> David Grey
                                    </td>

                                    <td>order </td>
                                    <td> stripe / manually </td>
                                    <td> 100$ </td>
                                    <td> 19/07/2023 17:45:23 </td>
                                    <td> 20/07/2023 17:45:23 </td>
                                    <td> <router-link to="/payment_details"  class=" mdi mdi-eye text-success fs-4  mx-2"></router-link></td>
                                  </tr>
                                 
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
          <!-- pagination -->
         <Pagination></Pagination>
          <!-- pagination -->
        </div>
        
        </Dashboard>
        
    </div>

</template>
<script setup>
import Dashboard from '../Dashboard.vue';
import Pagination from '../Pagination.vue';

</script>