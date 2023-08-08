import axios from "axios";
import { ref } from "vue";
import { successToast} from "../toaster.js"
import {useRouter} from "vue-router";

export default function useProducts(){
    
    const products = ref([]);
    const product = ref('');
   const errors = ref([])
   const router = useRouter();
   
    const getProducts  = async (page = 1 ) => {
      
        await axios.get(`/api/products?page=${page}`)
        .then(response => {

            products.value = response.data;
           
        })
        .catch(e => {
           
            errors.value = error.response.data.errors;
            console.log(e)
           
          
       
        });

    }
    const getProduct  = async (id) => {
      
        await axios.get(`/api/products/edit/${id}`)
        .then(response => {

            product.value = response.data;
           
        })
        .catch(e => {
           
            errors.value = error.response.data.errors;
            console.log(e)
           
          
        
        });

    }
    // search
    const searchProduct  = async (query) => {
      
        await axios.get('/api/products/search/?query='+ query)
        .then(response => {

            products.value = response.data;
           
        })
        .catch(e => {
           
            errors.value = error.response.data.errors;
            console.log(e)
           
          
        
        });

    }
    // filterby date
    const filterProduct  = async (query) => {
      
        await axios.get('/api/products/filter/?filter_date='+ query)
        .then(response => {

            products.value = response.data;
           
        })
        .catch(e => {
           
            errors.value = error.response.data.errors;
            console.log(e)
           
          
        
        });

    }
    // add record
    const addProduct = async (data,id,attribute)=> {

        let config = {
              headers : {"content-type":"multipart/from-data"}
            }    

           
            await axios.post('/api/products/store',data,config)
            .then(res => {
                errors.value= []
                getProducts();
                successToast('Product saved succefully!');

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

    // update product
    const updateProduct  = async (id) => {

        errors.value = []
        
        await axios.put(`/api/products/${id}`,product.value)
        .then(_ => {
            successToast('Product updated succefully!');

            router.push({name:'products.index'})
            
        })
        .catch(e => {
            
            errors.value = error.response.data.errors;
            console.log(e)
            
            
        
        });

    }
    const destroyProduct = async (id)=> {

          
           await axios.delete(`/api/products/${id}`)
            .then(res => {
                getProducts();

              console.log(res);
            }).catch(error => {
             
                console.error(error);
              
            });
        }

    return {
        products,
        product,
        errors,
        searchProduct,
        filterProduct,
        getProducts,
        getProduct,
        addProduct,
        updateProduct,
        destroyProduct
    }

} 
