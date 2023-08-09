<template>
        
       <div>
           
                <div class="container m-5">
                
                    <div class="row">
                    <div class="col-md-6 mx-auto">
                        <form method="post"  @submit.prevent="saveCategory()" >
                            <!--  name -->
                            <div class="form-floating mb-3">
                                <input type="text" required class="form-control shadow-none border border-2" name="title" v-model="category.title" id="category" >
                                <label for="category" class="fw-bold" > Name</label>
                            </div>
            
                            <div class="d-flex ">
                                <button type="submit"   class="btn btn-info">Save changes</button>
                                <router-link to="/categories"  class="btn btn-secondary mx-2">Cancel</router-link>
                            </div>
                        
                        </form>
                    </div>
                </div>
                
            </div>
          
       </div>


    
</template>


<script>
import { onMounted } from 'vue';
import useCategories  from '../../composables/categories.js'; // Assuming you have a separate composable for companies logic
export default {
    props: {
        id: {
            required: true,
            type: String,
        },
    },
    setup(props) {
        const { getCategory, category, updateCategory } = useCategories();
        // Fetch the specific product on component mount
        onMounted(_ => getCategory(props.id));
        // Define the function to save the product
        const saveCategory = async () => {
            try {
                await updateCategory(props.id);
            }
            catch (error) {
                // If an error occurs during update, handle it and set the "errors" ref
                // errors.value = [error.message]; // Assuming that the error message is a string
                console.log(error);
            }
        };
        // Return the reactive data and functions that should be accessible from the template
        return { category, saveCategory };
    },

};
</script>