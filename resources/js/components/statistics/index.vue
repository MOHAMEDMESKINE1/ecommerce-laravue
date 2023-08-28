<template>
    <div>
      <Dashboard>

          <!-- cards -->
          <div class="row m-2">
                      <div class="col-md-4 stretch-card grid-margin">
                        <div class="card bg-gradient-danger card-img-holder text-white">
                          <div class="card-body">
                            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Products <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5">{{products.total}}</h2>
                           <!-- <h1> <i class="fs-5 fas fa-cart-shopping"></i></h1> -->
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 stretch-card grid-margin">
                        <div class="card bg-gradient-info card-img-holder text-white">
                          <div class="card-body">
                            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3"> Orders <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5">{{orders.total}}</h2>
                            <!-- <h6 class="card-text">Decreased by 10%</h6> -->
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 stretch-card grid-margin">
                        <div class="card bg-gradient-success card-img-holder text-white">
                          <div class="card-body">
                            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Categories  <i class="mdi mdi-account-multiple-outline mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5">{{categories.total}}</h2>
                            <!-- <h6 class="card-text">Increased by 5%</h6> -->
                          </div>
                        </div>
                      </div>
        </div>


        <!-- bars -->
        <div class="row">
                      <div class="col-md-7 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <div class="clearfix">
                              <h4 class="card-title float-left">Orders And Sales Statistics</h4>
                              <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                            </div>
                            <canvas ref="chartCanvas" class="mt-4"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Traffic Sources</h4>
                           
                            <canvas ref="traffi_chart" class="mt-4"></canvas>

                            <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
                          </div>
                        </div>
                      </div>
        </div>
        <!-- bars -->
        <!-- statistics progress -->
        <div class="row">
                      <div class="col-md-7 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Total Product Orders </h4>
                            <!-- <div class="table-responsive">
                              
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th> # </th>
                                    <th> Product </th>
                                    <th> Due Date </th>
                                    <th> Progress </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td> 1 </td>
                                    <td> Herman Beck </td>
                                    <td> May 15, 2015 </td>
                                    <td>
                                      <div class="progress">
                                        <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td> 2 </td>
                                    <td> Messsy Adam </td>
                                    <td> Jul 01, 2015 </td>
                                    <td>
                                      <div class="progress">
                                        <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td> 3 </td>
                                    <td> John Richards </td>
                                    <td> Apr 12, 2015 </td>
                                    <td>
                                      <div class="progress">
                                        <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td> 4 </td>
                                    <td> Peter Meggik </td>
                                    <td> May 15, 2015 </td>
                                    <td>
                                      <div class="progress">
                                        <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td> 5 </td>
                                    <td> Edward </td>
                                    <td> May 03, 2015 </td>
                                    <td>
                                      <div class="progress">
                                        <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td> 5 </td>
                                    <td> Ronald </td>
                                    <td> Jun 05, 2015 </td>
                                    <td>
                                      <div class="progress">
                                        <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div> -->
                          <canvas ref="traffi_chart" class="mt-4"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title text-white">Todo</h4>
                            <div class="add-items d-flex">
                              <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?">
                              <button class="add btn btn-gradient-primary font-weight-bold todo-list-add-btn" id="add-task">Add</button>
                            </div>
                            <div class="list-wrapper">
                              <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                                <li>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="checkbox" type="checkbox"> Meeting with Alisa </label>
                                  </div>
                                  <i class="remove mdi mdi-close-circle-outline"></i>
                                </li>
                                <li class="completed">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="checkbox" type="checkbox" checked> Call John </label>
                                  </div>
                                  <i class="remove mdi mdi-close-circle-outline"></i>
                                </li>
                                <li>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="checkbox" type="checkbox"> Create invoice </label>
                                  </div>
                                  <i class="remove mdi mdi-close-circle-outline"></i>
                                </li>
                                <li>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="checkbox" type="checkbox"> Print Statements </label>
                                  </div>
                                  <i class="remove mdi mdi-close-circle-outline"></i>
                                </li>
                                <li class="completed">
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="checkbox" type="checkbox" checked> Prepare for presentation </label>
                                  </div>
                                  <i class="remove mdi mdi-close-circle-outline"></i>
                                </li>
                                <li>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="checkbox" type="checkbox"> Pick up kids from school </label>
                                  </div>
                                  <i class="remove mdi mdi-close-circle-outline"></i>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
        </div>
        <!-- statistics progress -->
      </Dashboard>
    </div>
</template>
<script setup>
import Dashboard from '../Dashboard.vue';
import axios from 'axios';
import { ref } from 'vue';
import { onMounted } from '@vue/runtime-core';

import useProducts from '../../composables/products';
import useCategories from '../../composables/categories';
import useOrders from '../../composables/orders';

const chartCanvas = ref(null);
const traffi_chart = ref(null);
// produtcs
  const {products,
    getProducts,
  } = useProducts();
// categories
  const {categories,getCategories} = useCategories();
  const {orders,sales,getOrders} = useOrders();

  onMounted(() => {
    getProducts();
    getCategories();
    getOrders()
    fetchDataAndRenderChart()
  });
    async function fetchDataAndRenderChart() {
    try {
      const response = await axios.get('/api/orders/sales');
      const data = response.data;
      const labels = Object.keys(data);
      const values = Object.values(data);

      renderChart(labels,values);

      roundchart(labels,values)

    } catch (error) {
      console.error('Error fetching chart data:', error);
    }
  }

    function renderChart(labels,values) {

    const ctx = chartCanvas.value.getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [
          {
            label: 'Orders Sales',
            data: values,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
          },
        ],
      },
      options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            display: true,
                            min: 0,
                            stepSize: 1
                        },
                        gridLines: {
                          drawBorder: false,
                          display: false
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                          display:false,
                          drawBorder: false,
                          color: 'rgba(0,0,0,1)',
                          zeroLineColor: '#eeeeee'
                        },
                        ticks: {
                            padding: 20,
                            fontColor: "#9c9fa6",
                            autoSkip: true,
                        },
                        barPercentage: 0.7
                    }]
                  }
                },
                elements: {
                  point: {
                    radius: 0
                  }
                }
      
    });
  }
    function roundchart(labels,values) {

    const ctx = traffi_chart.value.getContext('2d');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [
          {
            label: 'Orders Sales',
            data: values,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
          },
        ],
      },
      options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            display: true,
                            min: 0,
                            stepSize: 1
                        },
                        gridLines: {
                          drawBorder: false,
                          display: false
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                          display:false,
                          drawBorder: false,
                          color: 'rgba(0,0,0,1)',
                          zeroLineColor: '#eeeeee'
                        },
                        ticks: {
                            padding: 20,
                            fontColor: "#9c9fa6",
                            autoSkip: true,
                        },
                        barPercentage: 0.7
                    }]
                  }
                },
                elements: {
                  point: {
                    radius: 0
                  }
                }
      
      
    });
  }

</script>