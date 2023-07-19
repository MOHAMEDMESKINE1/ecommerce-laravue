<template>
    <div>
        <Dashboard>
              <!-- products -->
        <!-- <div class="row">
                      <div class="col-12 grid-margin stretch-card">
                        <div class="card m-2">
                          <div class="card-body">
                            <h4 class="card-title">Recent Updates</h4>
                            <div class="d-flex">
                              <div class="d-flex align-items-center me-4 text-muted font-weight-light">
                                <i class="mdi mdi-account-outline icon-sm me-2"></i>
                                <span>jack Menqu</span>
                              </div>
                              <div class="d-flex align-items-center text-muted font-weight-light">
                                <i class="mdi mdi-clock icon-sm me-2"></i>
                                <span>October 3rd, 2018</span>
                              </div>
                            </div>
                            <div class="row mt-3">
                              <div class="col-6 pe-1">
                                <img src="assets/images/dashboard/img_1.jpg" class="mb-2 mw-100 w-100 rounded" alt="image">
                                <img src="assets/images/dashboard/img_4.jpg" class="mw-100 w-100 rounded" alt="image">
                              </div>
                              <div class="col-6 ps-1">
                                <img src="assets/images/dashboard/img_2.jpg" class="mb-2 mw-100 w-100 rounded" alt="image">
                                <img src="assets/images/dashboard/img_3.jpg" class="mw-100 w-100 rounded" alt="image">
                              </div>
                            </div>
                            <div class="d-flex mt-5 align-items-top">
                              <img src="assets/images/faces/face3.jpg" class="img-sm rounded-circle me-3" alt="image">
                              <div class="mb-0 flex-grow">
                                <h5 class="me-2 mb-2">School Website - Authentication Module.</h5>
                                <p class="mb-0 font-weight-light">It is a long established fact that a reader will be distracted by the readable content of a page.</p>
                              </div>
                              <div class="ms-auto">
                                <i class="mdi mdi-heart-outline text-muted"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
        </div> -->
        
        <div class="row ">
                      <div class="col-12 ">
                        <div class="card m-2">
                          <div class="card-body">
                            <div class="d-flex justify-content-end mb-2">
                              <button class="btn btn-sm border border-primary btn-outline-primary ">
                              
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
        <!-- products -->
        </Dashboard>
    </div>
</template>
<script setup>
import Dashboard from './Dashboard.vue';
</script>