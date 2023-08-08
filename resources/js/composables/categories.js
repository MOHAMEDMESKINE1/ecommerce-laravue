import axios from "axios";
import { ref } from "vue";
import { successToast } from "../toaster";
import {useRouter} from "vue-router";

export default function useCategories(){
    const categories = ref([]);
    const category = ref('');
    const errors = ref([]);
    const router = useRouter();
    const getCategories  = async (page=1) => {
        await axios.get("/api/categories?page="+page)
        .then(response => {
            categories.value = response.data
            console.log(response.data);
        } )
        .catch(err => console.log(err));

    }
    const getCategory = async (id) => {
      
        await axios.get(`/api/categories/${id}`)
        .then(response => {
        //    console.log( response.data);
         
            category.value = response.data
          
        })
        .catch(e => {
           
            errors.value = error.response.data.errors;
            console.log(e)
           
          
        
        });

    }
    const addCategory = async (data,id,attribute)=> {

        await axios.post('/api/categories/store',data)
            .then(res => {
                errors.value= []
                getCategories();
                successToast('Category saved succefully!');

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
    const destroyCategory = async (id)=> {

        
        await axios.delete(`/api/categories/${id}`)
            .then(res => {
                getCategories();

            console.log(res);
            }).catch(error => {
            
                console.error(error);
            
            });
    }
    const updateCategory = async (id) => {
        errors.value = []
        
        await axios.put(`/api/categories/${id}`,category.value)
        .then(_ => {
            console.log(category.value);
           
            getCategories();

            successToast('Category updated succefully!');
            router.push({name:'categories'})
            
            
        })
        .catch(e => {
            
            errors.value = error.response.data.errors;
            console.log(e)
            
            
        
        });

    }
    return {
        categories,
        errors,
        category,
        addCategory,
        destroyCategory,
        getCategories,
        getCategory,
        updateCategory,
    }

} 
