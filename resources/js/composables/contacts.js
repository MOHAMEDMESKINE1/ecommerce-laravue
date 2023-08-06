import axios from "axios";
import { ref } from "vue";
import { successToast} from "../toaster.js"
import {useRouter} from "vue-router";
export default function useContacts(){
    const contacts = ref([]);
    const errors = ref([]);
    const router = useRouter();
    const count = ref(0);
    const getContacts  = async (page = 1) => {
        await axios.get("/api/contacts?page="+page)
        .then(response => contacts.value = response.data )
        .catch(err => console.log(err));

    }
    const ContactsCount  = async () => {
        await axios.get("/api/contacts/count")
        .then(response => {
            count.value = response.data.count
          
         })
        .catch(err => console.log(err));

    }
    const storeContact  = async (data) => {
        await axios.post("/api/contacts/store",data)

        .then(_ => {
            errors.value = []
          
            successToast('We will contact u soon !');
            router.push({path:'/'})
        } ).catch(error => {
             
                if (error.response.data.errors) {

                    errors.value =error.response.data.errors;
                }else{
                    console.error(error);

                }
        })

    }
    const destroyContact = async (id)=> {

          
        await axios.delete(`/api/contacts/${id}`)
         .then(res => {
             getContacts();

           console.log(res);
         }).catch(error => {
          
             console.error(error);
           
         });
     }



    return {
        contacts,
        errors,
        getContacts,
        count,
        destroyContact,
        ContactsCount,
        storeContact
    }

} 
