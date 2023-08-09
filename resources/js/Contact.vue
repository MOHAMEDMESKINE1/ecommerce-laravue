<template>
    <div>
        <Main>
            <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Contact For Any Queries</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="form"   method="post" id="contactForm">
                        <div class="control-group ">
                            <label for="">Name : </label>
                            <input type="text"  class="form-control mb-2" name="name" v-model="contact.name" id="name" placeholder="Your Name"
                                required  />
                            <Error :errors="errors.name"    />
                           
                        </div>
                        <div class="control-group mb-2">
                            <label for="">Email : </label>
                            <input type="email" class="form-control" name="email" v-model="contact.email" id="email" placeholder="Your Email"
                                required  />
                            <!-- <p class="help-block text-danger"></p> -->
                            <Error  :errors="errors.email" class="help-block text-danger"/>

                        </div>
                        <div class="control-group mb-2">
                            <label for="">Phone : </label>
                            <input type="number" class="form-control" name="phone" v-model="contact.phone" id="phone" placeholder="+212 00 00 00 00"
                                required  />
                            <!-- <p class="help-block text-danger"></p> -->
                            <Error  :errors="errors.phone" class="help-block text-danger"/>

                        </div>
                        <div class="control-group mb-2">
                            <label for="">Subject : </label>

                            <input type="text" class="form-control" name="subject" v-model="contact.subject" id="subject" placeholder="Subject"
                               />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group mb-2">
                            <label for="">Message : </label>

                            <textarea class="form-control" rows="6" name="message" v-model="contact.message" id="message" placeholder="Message"
                                required
                               ></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button @click.prevent="addContact()" class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send
                                Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <h5 class="font-weight-semi-bold mb-3">Get In Touch</h5>
                <p>Justo sed diam ut sed amet duo amet lorem amet stet sea ipsum, sed duo amet et. Est elitr dolor elitr erat sit sit. Dolor diam et erat clita ipsum justo sed.</p>
                <div class="d-flex flex-column mb-3">
                    <h5 class="font-weight-semi-bold mb-3">Store 1</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                </div>
                <div class="d-flex flex-column">
                    <h5 class="font-weight-semi-bold mb-3">Store 2</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                </div>
            </div>
        </div>
            </div>
        </Main>
    </div>
</template>

<script setup>

import Main from './layouts/Main.vue'
// import { Form, Field, ErrorMessage } from 'vee-validate';
import useContacts from './composables/contacts';
import { reactive, ref } from 'vue';
import Error from './layouts/Error.vue';

import { warningToast} from "./toaster.js"

const {storeContact,errors} = useContacts();
const contact =reactive( {
    name : '',
    phone:'',
    email : '',
    subject : '',
    message : '',

});
   
    const addContact  = () => {
        if(contact.name  && contact.email  && contact.subject  && contact.message ){
            storeContact(contact)
            resetForm();
        }else{
            warningToast("please fill all Fiels ! ",{  position: "top-center", })
        }
      
        // if(contact.name !=="" && contact.email!==""&& contact.subject!==""&& contact.message!==""){
        //     storeContact(contact)
        //     resetForm();
        // }else{
        //     warningToast("please fill all Fiels ! ",{  position: "top-center", })
        // }
      
    }
    // const validateName= (value) =>{
    //     if (!value) {
    //     //    console.log( 'This field is required');
    //        return 'Please enter your name';
    //     }
    //     return true;
    // }
    const resetForm = () => {
        form.reset();
      
    }
   
</script>