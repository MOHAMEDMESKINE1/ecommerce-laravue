import axios from "axios";
import { ref } from "vue";
import { successToast } from "../toaster";
import {useRouter} from "vue-router";

export default function useOrders(){
    const orders = ref([]);
    const customers = ref([]);
    const products = ref([]);
    const order = ref('');
    const errors = ref([]);
    const router = useRouter();
    
    const getOrders  = async (page=1) => {
        await axios.get("/api/orders?page="+page)
        .then(response => {
            orders.value = response.data
            console.log(response.data);
        } )
        .catch(err => console.log(err));

    }
    const getCustomers = async () => {
        await axios.get("/api/orders/customers")
        .then(response => {
            customers.value = response.data
            console.log(response.data);
        } )
        .catch(err => console.log(err));

    }
    const getProducts = async () => {
        await axios.get("/api/orders/products")
        .then(response => {
            products.value = response.data
            console.log(response.data);
        } )
        .catch(err => console.log(err));

    }
    const getOrder = async (id) => {
      
        await axios.get(`/api/orders/edit/${id}`)
        .then(response => {
           console.log( response.data);
         
            order.value = response.data
          
        })
        .catch(e => {
           
            errors.value = error.response.data.errors;
            console.log(e)
           
          
        
        });

    }
    const addOrder = async (data,id,attribute)=> {

        await axios.post('/api/orders/store',data)
            .then(res => {
                errors.value= []
                getOrders();
                successToast('order saved succefully!');

                $(id).modal('hide');
				$(attribute).css('display','none');

              console.log(res);
            }).catch(error => {
                errors.value = []
                if (error.response.data.errors) {

                    errors.value =error.response.data.errors;
                }else{
                    console.error(error);

                }
              
            });

    }
    const destroyOrder = async (id)=> {

        
        await axios.delete(`/api/orders/${id}`)
            .then(res => {
                getOrders();

            console.log(res);
            }).catch(error => {
            
                console.error(error);
            
            });
    }
    const updateOrder = async (id) => {
        errors.value = []
        
        await axios.put(`/api/orders/${id}`,order.value)
        .then(_ => {
            console.log(order.value);
           
            getorders();

            successToast('Order updated succefully!');
            router.push({name:'orders'})
            
            
        })
        .catch(e => {
            
            errors.value = error.response.data.errors;
            console.log(e)
            
            
        
        });

    }
    return {
        orders,
        customers,
        products,
        errors,
        order,
        addOrder,
        destroyOrder,
        getOrders,
        getOrder,
        updateOrder,
        getCustomers,
        getProducts
    }

} 
