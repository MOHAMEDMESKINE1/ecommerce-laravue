import axios from "axios";
import { ref } from "vue";
import { successToast } from "../toaster";

export default function useCategories(){
    const categories = ref([]);
    const errors = ref([]);

    const getCategories  = async (page=1) => {
        await axios.get("/api/categories?page="+page)
        .then(response => {
            categories.value = response.data
            console.log(response.data);
        } )
        .catch(err => console.log(err));

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
    return {
        categories,
        errors,
        addCategory,
        destroyCategory,
        getCategories,
    }

} 
