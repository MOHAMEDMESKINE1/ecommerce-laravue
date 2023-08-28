<template>
    <div>

        <Dashboard>
            <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="mb-3">
                        <h5 class="card-title">Contact List <span class="text-muted fw-normal ms-2">({{  contacts.total}})</span></h5>
                    </div>
                </div>
              
            </div>
            <div class="row">
                <div class="col-6  col-md-6  " v-for="contact in contacts.data">
                    <div class="card" >
                        <div class="card-body">
                            
                            <div class="d-flex align-items-center">
                                <!-- <div><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="avatar-md rounded-circle img-thumbnail" /></div> -->
                               
                                <div class="flex-1 ms-3">
                                    <div class="d-flex ">
                                        <h5 class="font-size-16 mb-1"><a href="#" class="text-dark" v-text="contact.name"></a></h5>
                                        <a href="#" @click.prevent="ConfirmationDelete(contact.id)"  class="cursor-pointer  position-absolute top-0  end-0 p-2 bg-secondary text-white "><i class="mdi mdi-close"></i></a>
                                    </div>
                                    <span class="badge badge-soft-success mb-0" v-text="contact.subject"></span>
                                </div>
                            </div>
                            <div class="mt-3 pt-1">
                                <p class="text-muted mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-primary"></i> {{ contact.phone }}  </p>
                                <p class="text-muted mb-0 mt-2"><i class="mdi mdi-email font-size-15 align-middle pe-2 text-primary "></i>{{ contact.email }} </p>
                                <p class="text-muted mb-0 mt-2"><i class=" font-size-15 align-middle pe-2 text-primary"></i>{{contact.message}}</p>
                            </div>
                            <div class="d-flex gap-2 pt-4">
                                <!-- <button type="button" class="btn btn-soft-primary btn-sm w-50"><i class="bx bx-user me-1"></i> Profile</button> -->
                                <button type="button" class="btn btn-primary btn-sm w-50"><i class="bx bx-message-square-dots me-1"></i> Contact</button>
                            </div>
                        </div>
                    </div>
                </div>
              
               
            </div>
            <div class="d-flex justify-content-center">
                  <!-- pagination -->
            <Bootstrap5Pagination
                              :data="contacts"
                              @pagination-change-page="getContacts"
          />
             <!-- pagination -->
            </div>
            

        </div>
        </Dashboard>
</div>
</template>
<script setup>
import Dashboard from '../Dashboard.vue';
import { onMounted } from '@vue/runtime-core';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
import {  watchEffect  } from 'vue';

import useContacts from '../../composables/contacts.js';
import { showConfirmation ,errorToast} from '../../toaster';


const {contacts,getContacts,count,ContactsCount,destroyContact} = useContacts();

    onMounted(() => {
        getContacts(),
        ContactsCount()
      
    })
   
    async function  ConfirmationDelete(id) {
      const confirmed = await showConfirmation(
        'Are you sure?',
        'This action cannot be undone!',
        'Yes, proceed!',
        'No, cancel!'
      );

      if (confirmed) {

        destroyContact(id);

        successToast('Contact deleted successfully!');
      
      } else {
        errorToast('Contact cancelled');
      }
    }

</script>

<style scoped>
body{
    margin-top:20px;
background-color:#eee;
}
.card {
    margin-bottom: 24px;
    box-shadow: 0 2px 3px #e4e8f0;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #eff0f2;
    border-radius: 1rem;
}
.avatar-md {
    height: 4rem;
    width: 4rem;
}
.rounded-circle {
    border-radius: 50%!important;
}
.img-thumbnail {
    padding: 0.25rem;
    background-color: #f1f3f7;
    border: 1px solid #eff0f2;
    border-radius: 0.75rem;
}
.avatar-title {
    align-items: center;
    background-color: #3b76e1;
    color: #fff;
    display: flex;
    font-weight: 500;
    height: 100%;
    justify-content: center;
    width: 100%;
}
.bg-soft-primary {
    background-color: rgba(59,118,225,.25)!important;
}
a {
    text-decoration: none!important;
}
.badge-soft-danger {
    color: #f56e6e !important;
    background-color: rgba(245,110,110,.1);
}
.badge-soft-success {
    color: #63ad6f !important;
    background-color: rgba(99,173,111,.1);
}
.mb-0 {
    margin-bottom: 0!important;
}
.badge {
    display: inline-block;
    padding: 0.25em 0.6em;
    font-size: 75%;
    font-weight: 500;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.75rem;
}
</style>