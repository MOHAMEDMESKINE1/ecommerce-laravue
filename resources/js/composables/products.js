import axios from "axios";
import { ref } from "vue";
import {showToast} from "../toaster.js"

export default function useProducts(){
    const products = ref([]);
    
    const getProducts  = async () => {
        await axios.get("/api/products")
        .then(response => products.value = response.data )
        .catch(err => console.log(err));

    }

    const addProduct = async (data)=> {

        let config = {
              headers : {"content-type":"multipart/from-data"}
            }    
           await axios.post('/api/products/store',data,config)
            .then(res => {
                getProducts();
                showToast('Product saved succefully!');

              console.log(res);
            }).catch(error => {
             
                console.error(error);
              
            });
        }
    const destroyProduct = async (id)=> {

        let config = {
              headers : {"content-type":"multipart/from-data"}
            }    
           await axios.delete('/api/products/'+id,config)
            .then(res => {
                getProducts();

              console.log(res);
            }).catch(error => {
             
                console.error(error);
              
            });
        }

    return {
        products,
        getProducts,
        addProduct,
        destroyProduct
    }

} 
