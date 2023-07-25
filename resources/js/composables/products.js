import axios from "axios";
import { ref } from "vue";

export default function useProducts(){
    const products = ref([]);

    const getProducts  = async () => {
        await axios.get("/api/products")
        .then(response => products.value = response.data )
        .catch(err => console.log(err));

    }



    return {
        products,
        getProducts,
    }

} 
