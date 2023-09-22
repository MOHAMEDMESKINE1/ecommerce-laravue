<template>
    <div class="container">
      <div class="row my-5">
        <div class="col-md-6 mx-auto">
          <ul class="list-group my-2" v-for="(errorArray, index) in store.getErrors" :key="index">
              <li class="list-group-item bg-danger text-white mb-1" v-for="(error, index) in errorArray" :key="index">
                  {{error}}
              </li>
          </ul>
          <div class="card">
            <div class="card-header bg-white">
              <h4 class="text-center">
                Login
              </h4>
            </div>
            <div class="card-body">
              <div class="form-group mb-3">
                <input 
                  type="text" 
                  v-model="data.user.email"
                  placeholder="Email*" class="form-control">
              </div>
              <div class="form-group mb-3">
                <input 
                  type="password" 
                  v-model="data.user.password"
                  placeholder="Password*" class="form-control">
              </div>
              <div class="form-group mb-3">
                <button @click="userAuth" class="btn btn-primary btn-sm">
                  Login
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
    import { reactive } from "vue";
    import Swal from 'sweetalert2';
    import router from "../../router";
    import { useAuthStore } from "../../Auth";
    import axios from "axios";
    
  
    const store = useAuthStore();
    
    const data = reactive({
      user: {
        email: '',
        password: ''
      }
    });
  
    const userAuth = async () => {
      // store.clearErrors();
      // try {
      //   const response = await axios.post('/api/login',data.user)
       
       
        
      //       if(response.data.success){
      //       console.log(response.data.message);
      //       store.storeUser(response.data.user);
      //       router.push('/statistics');
      //       }else{
      //         Swal.fire({
      //           icon: 'error',
      //           title: 'Oops...',
      //           text: response.data.message,
      //         });
      //       }
       

       
       
      // } catch (error) {
      //   store.setErrors(error.response.data.errors);
      // }
      axios
        .post('/api/login', {
          email: this.email,
          password: this.password,
        })
        .then((response) => {
          // Handle successful login (e.g., store the access token)
          const token = response.data.token;

          // You can store the token in Vuex, local storage, or as a cookie
          // For simplicity, we'll use local storage in this example
          localStorage.setItem('access_token', token);

          // Redirect to the dashboard or another route
          this.$router.push('/dashboard');
        })
        .catch((error) => {
          // Handle login error
          console.error(error);
          // You can display an error message to the user
        });
    }
    
  </script>
  
  <style>
  </style>