<template>
    <div>
          
            <div class="container m-5 mx-auto">
                <div class="row">
                    <div class="col-md-12">
                      <div class="card text-start">
                        <!-- <img class="card-img-top" src="holder.js/100px180/" alt="Title"> -->
                        <div class="card-body">
                          <h4 class="card-title ">Edit Product</h4>
                                <form  method="post" enctype="multipart/form-data" @submit.prevent="saveProduct()">
                                    <div class="row">
                                        <div class="col-* mx-auto ">
                                            <!--  title -->
                                            <div class="form-floating mb-3">
                                            <input  type="text" class="form-control shadow-none border border-2"  name="title" v-model="product.title" id="product" />
                                            <label for="product" class="fw-bold" >Product Name</label>

                                            <!-- error title -->
                                            <!-- <Error  :errors="errors.title"/> -->
                                            </div>
                                            <!--  photo -->
                                            <div class="form-floating p-0 mb-3">
                                            <input name="photo" class="form-control form-control-sm shadow-none border border-2 border border-2" id="photo"   type="file" @change="onImageChanged">
                                            <label for="photo" class="fw-bold" >Photo </label>
                                            <div v-if="product.photo">
                                              <img  :src="'/storage/products/'+product.photo" class="me-2" :alt="product.title" > 

                                            </div>
                                            <img v-else src="assets/images/faces-clipart/pic-1.png" class="me-2" alt="image"> 

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <!--  description -->
                                        <div class="form-floating mb-3">
                                            <textarea  class="form-control shadow-none border border-2" name="description" v-model="product.description" id="description"></textarea>
                                            <label for="description" class="fw-bold" >Description</label>

                                            <!-- error description -->
                                            <!-- <Error  :errors="errors.description"/> -->

                                        </div>
                                        <!--  price -->
                                        <div class="form-floating mb-3">
                                            <input type="number"   class="form-control shadow-none border border-2" name="price" v-model="product.price" id="price"/>
                                            <label for="price" class="fw-bold" >Price</label>
                                            <!-- error price -->
                                            <!-- <Error  :errors="errors.price"/> -->
                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                            <!--  old_price -->
                                            <div class="form-floating mb-3">
                                            <input type="number"  class="form-control shadow-none border border-2" name="old_price" v-model="product.old_price" id="old_price"/>
                                            <label for="old_price" class="fw-bold" >Old Price</label>
                                            
                                            <!-- error old_price -->
                                            <!-- <Error  :errors="errors.old_price"/> -->

                                            </div>
                                            <!--  quantity -->
                                            <div class="form-floating mb-3">
                                            <input type="number"  class="form-control shadow-none border border-2" name="quantity" v-model="product.quantity" id="quantity"/>
                                            <label for="quantity" class="fw-bold" >Quantity</label>

                                                <!-- error quantity -->
                                                <!-- <Error  :errors="errors.quantity"/> -->
                                            
                                            </div>
                                        </div>
                                        <!-- size -->
                                        <div class="col-md-11 mb-3 mx-auto ">

                                            <div class="d-flex justify-content-between  border border-2 p-2">

                                            <input class="form-check-input" type="radio" v-model="product.size" id="XS" name="size" value="XS">
                                            <label class="form-check-label " for="XS">XS</label>
                                            <input class="form-check-input" type="radio" v-model="product.size" id="XL" name="size" value="XL">
                                            <label class="form-check-label " for="XL">XL</label>
                                            <input class="form-check-input" type="radio" v-model="product.size" id="S" name="size" value="S">
                                            <label class="form-check-label " for="S">S</label>
                                            <input class="form-check-input" type="radio" v-model="product.size" id="M" name="size" value="M">
                                            <label class="form-check-label " for="M">M</label>
                                            <input class="form-check-input" type="radio" v-model="product.size" id="L" name="size" value="L">
                                            <label class="form-check-label " for="L">L</label>

                                            

                                            </div>
                                            <!-- error size -->
                                            <!-- <Error  :errors="errors.size"/> -->
                                            <!-- color -->
                                            <div class="d-flex justify-content-between  border border-2 p-2 mt-3 ">

                                            <input class="form-check-input " type="radio" v-model="product.color" id="Red" name="color" value="Red">
                                            <label class="form-check-label text-danger " for="Red">Red</label>
                                            <input class="form-check-input" type="radio" v-model="product.color" id="Black" name="color" value="Black">
                                            <label class="form-check-label " for="Black">Black</label>
                                            <input class="form-check-input" type="radio" v-model="product.color" id="White" name="color" value="White">
                                            <label class="form-check-label text-secondary  " for="White">White</label>
                                            <input class="form-check-input" type="radio" v-model="product.color" id="Yellow" name="color" value="Yellow">
                                            <label class="form-check-label text-warning " for="Yellow">Yellow</label>
                                            <input class="form-check-input" type="radio" v-model="product.color" id="Green" name="color" value="Green">
                                            <label class="form-check-label  text-success" for="Green">Green</label>

                                                


                                            </div>
                                            <!-- error color -->
                                            <!-- <Error  :errors="errors.color"/> -->
                                                        
                                        </div>

                                    <!--  category -->
                                    <div class="form-floating mb-3">
                                        <select  name="category_id" id="category" v-model="product.category_id" class="form-select shadow-none border border-2" >
                                        <option selected class="text-secondary">  select category</option>
                                        <option v-for="category in categories.data"   :value='category.id  '  :selected ="category.id === category.id "  :key="category.id">
                                        {{category.title}}
                                        </option>
                                    
                                        </select>
                                        <label for="category"  class="fw-bold" >Category</label>
                                        <!-- error category -->
                                        <!-- <Error  :errors="errors.category_id"/> -->

                                    </div>
                                    
                                    
                                        <div class="d-flex ">
                                        <button type="button"  @click.prevent="saveProduct()"  class="btn btn-info">Save changes</button>
                                        <button type="button" class="btn btn-secondary mx-2" data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </div>


                                </form>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
    </div>
</template>

<script >
import { ref,onMounted } from 'vue';
import useProducts  from '../../composables/products.js'; // Assuming you have a separate composable for companies logic
import useCategories  from '../../composables/categories.js'; // Assuming you have a separate composable for companies logic

export default {
    props: {
        id: {
            required: true,
            type: String,
        },
    },
    
    setup(props) {
      
        // Use the composable to get the companies and fetch the specific product
        const { product, getProduct,updateProduct } = useProducts();
        const { categories, getCategories } = useCategories();
        // Fetch the specific product on component mount
        onMounted(() => {
            getCategories();
            getProduct(props.id);
            
        });
        const photo = ref('');
        function onImageChanged(e) {
            console.log(e.target.files[0]);
            photo.value = e.target.files[0];
        }
        // Define the function to save the product
        const saveProduct = async () => {
            try {
               
                await updateProduct(props.id);
            }
            catch (error) {
                console.log(error);
            }
        };
        // Return the reactive data and functions that should be accessible from the template
        return { categories, product, getCategories, saveProduct, onImageChanged };
    },
   
};
</script>




