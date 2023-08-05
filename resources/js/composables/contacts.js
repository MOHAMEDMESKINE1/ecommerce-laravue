import axios from "axios";
import { ref } from "vue";
import { successToast} from "../toaster.js"

export default function useContacts(){
    const contacts = ref([]);

    const getContacts  = async () => {
        await axios.get("/api/contacts")
        .then(response => contacts.value = response.data )
        .catch(err => console.log(err));

    }
    const storeContact  = async (data) => {
        await axios.post("/api/contacts/store",data)

        .then(response => {
            
            successToast('We will contact u soon !');

        } )
        .catch(err => console.log(err));

    }



    return {
        contacts,
        getContacts,
        storeContact
    }

} 
