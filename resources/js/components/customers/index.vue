<template>
    <div >
       <Dashboard>
         <!-- recents orders -->
         <div class="row ">
         
                      <div class="col-12 ">
                        <div class="card m-2">
                          <div class="card-body">
                            <div class="d-flex justify-content-end mb-2">
                              <button class="btn btn-sm border border-primary btn-outline-primary ">
                              
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
                                    <td> Dec 5, 2017 </td>
                                    <td> WD-12345 </td>
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
        <!-- recents orders -->
       </Dashboard>
    </div>
</template>
<script setup>
import Dashboard from '../Dashboard.vue';

</script>