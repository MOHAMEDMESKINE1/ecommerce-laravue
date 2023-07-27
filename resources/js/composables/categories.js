import axios from "axios";
import { ref } from "vue";

export default function useCategories(){
    const categories = ref([]);

    const getCategories  = async () => {
        await axios.get("/api/categories")
        .then(response => categories.value = response.data )
        .catch(err => console.log(err));

    }



    return {
        categories,
        getCategories,
    }

} 
