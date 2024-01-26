<template>
    <div  style="background-color: #eee;">

       

        <section>
                <div class="container py-5  ">
                    <div class="row">
                    <div class="col-md-12 col-lg-4 mb-4 mb-lg-0 mx-auto">
                        <div class="card " >
                        <div class="d-flex justify-content-between p-3 ">
                            <p class="lead mb-0"><strong class="text-muted">{{ order.products && order.products.title }}</strong></p>

                        <div
                            class="bg-warning rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                            style="width: 35px; height: 35px;">
                            <p class="text-white mb-0 fw-bold display-7 small"> {{ order.products && order.products.size }}</p>
                            </div>
                        </div>
                        <img v-if="order.products &&  order.products.photo"  :src="'/storage/products/'+order.products.photo" :alt="order.products.title" class="" alt="Laptop" />
                        <div class="d-flex  justify-items-center mt-5 ">
                            <p class="small mx-3 ">Ordered By : <strong class="text-success mt-2">{{ order.user && order.user.name }}</strong></p>
                            <p class="small mx-auto">Description : <br> <strong class="text-success mt-2">{{ order.products && order.products.description}}</strong></p>

                        </div>
                        <div class="card-body">
                            <div class="d-flex  justify-content-between">
                            
                            <p class="small ">Old Price : <s class="text-danger"> {{ order.products && order.products.old_price }} $</s></p>
                            <p class="small text-primary mb-0">Price : {{ order.products && order.products.price }} $</p>

                            </div>

                            <div class="d-flex  justify-content-between mb-2">
                            <p class="text-muted mb-0">Color: <span class="fw-bold">{{ order.products && order.products.color }}</span></p>
                            <p class="text-muted mb-0  ">Availabe: <span class="fw-sm">{{ order.products && order.products.quantity }}</span></p>
                            
                            </div>
                          
                           
                        </div>
                        </div>
                    </div>
            </div>
                        
            </div>
        
</section>
</div>
</template>
<!-- <script setup>
import Dashboard from '../Dashboard.vue';
import Pagination from '../Pagination.vue';


</script> -->
<script >
import { onMounted } from 'vue';
import useOrders  from '../../composables/orders.js'; // Assuming you have a separate composable for companies logic


export default {
    props: {
        id: {
            required: true,
            type: String,
        },
    },
    
    setup(props) {
      
        // Use the composable to get the companies and fetch the specific product
        const { order,getOrders ,getOrder} = useOrders();
     
        // Fetch the specific product on component mount
        onMounted(() => {
            getOrders();
            getOrder(props.id);
            console.log(props.id);
        });
       
        return {  order,getOrders };
    }
    
};
</script>

<style scoped>
body{
    margin-top:20px;
background-color:#eee;
}
.card {
    margin-bottom: 24px;
    box-shadow: 0 2px 3px #e4e8f0;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #eff0f2;
    border-radius: 1rem;
}
.avatar-md {
    height: 4rem;
    width: 4rem;
}
.rounded-circle {
    border-radius: 50%!important;
}
.img-thumbnail {
    padding: 0.25rem;
    background-color: #f1f3f7;
    border: 1px solid #eff0f2;
    border-radius: 0.75rem;
}
.avatar-title {
    align-items: center;
    background-color: #3b76e1;
    color: #fff;
    display: flex;
    font-weight: 500;
    height: 100%;
    justify-content: center;
    width: 100%;
}
.bg-soft-primary {
    background-color: rgba(59,118,225,.25)!important;
}
a {
    text-decoration: none!important;
}
.badge-soft-danger {
    color: #f56e6e !important;
    background-color: rgba(245,110,110,.1);
}
.badge-soft-success {
    color: #63ad6f !important;
    background-color: rgba(99,173,111,.1);
}
.mb-0 {
    margin-bottom: 0!important;
}
.badge {
    display: inline-block;
    padding: 0.25em 0.6em;
    font-size: 75%;
    font-weight: 500;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.75rem;
}
</style> 