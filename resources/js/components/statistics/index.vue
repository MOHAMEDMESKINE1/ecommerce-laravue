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
                      <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <div class="clearfix">
                              <h4 class="card-title float-left">Orders Statistics</h4>
                              <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                            </div>
                            <canvas ref="chartCanvas" class="mt-4"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Orders Statistics</h4>
                           
                            <canvas ref="traffi_chart" class="mt-4"></canvas>

                            <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
                          </div>
                        </div>
                      </div>
        </div>
        <!-- bars -->
        <!-- statistics progress -->
        <div class="row">
                      <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Payments Status </h4>
                                <canvas ref="payments" class="mt-4"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Payments Status </h4>
                                <canvas ref="payments_donghut" class="mt-4"></canvas>
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
const payments = ref(null);
const payments_donghut = ref(null);
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
    fetchOrders()
    fetchPayments()
  });
    async function fetchOrders() {
    try {
      const response = await axios.get('/api/orders/sales');
      const data = response.data;
      const labels = Object.keys(data);
      const values = Object.values(data);

      renderChart(labels,values);

      roundchart(labels,values)

    } catch (error) {
      console.error('Error fetching chart orders data:', error);
    }
  }
    async function fetchPayments() {
    try {
      const response = await axios.get('/api/orders/status');
      const data = response.data;
      const labels = Object.keys(data);
      const values = Object.values(data);

      renderChartPayments(labels,values);
      roundchartPayments(labels,values);

    } catch (error) {
      console.error('Error fetching chart payments data:', error);
    }
  }
  function renderChartPayments(labels,values) {

    const ctx = payments.value.getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [
          {
            label: 'Payments Status',
            data: values,
            backgroundColor: [
                                'rgb(255, 0, 0)',   // Red
                                'rgb(106, 90, 205)',   // Blue
                                'rgb(60, 179, 113)',   // Teal
                                'rgb(255, 165, 0)',   // Yellow
                                'rgb(238, 130, 238)',   // Teal
                                'rgba(153, 102, 255, 0.6)',  // Purple
                                'rgba(255, 159, 64, 0.6)',   // Orange
                              ],
          
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
            backgroundColor: 'rgb(255, 103, 0)',
            borderColor: 'rgb(255, 103, 0)',
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
                },
               
      
      
    });
  }
  function roundchartPayments(labels,values) {

    const ctx = payments_donghut.value.getContext('2d');
    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: labels,
        datasets: [
          {
            label: 'Orders Sales',
            data: values,
            backgroundColor: [
                                'rgb(255, 0, 0)',   // Red
                                'rgb(106, 90, 205)',   // Blue
                                'rgb(60, 179, 113)',   // Teal
                                'rgb(255, 165, 0)',   // Yellow
                                'rgb(238, 130, 238)',   // Teal
                                'rgba(153, 102, 255, 0.6)',  // Purple
                                'rgba(255, 159, 64, 0.6)',   // Orange
                              ],
            borderColor: 'rgb(255, 103, 0)',
            borderWidth: 1,
          },
        ],
      },
      options: {
                  legend: {
                      display: false
                  },
               
                },
                elements: {
                  point: {
                    radius: 0
                  }
                },
               
      
      
    });
  }

</script>