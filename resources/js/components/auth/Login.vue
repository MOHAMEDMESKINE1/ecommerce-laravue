<template>
    <div class="container">
      <div class="row my-5">
        <div class="col-md-6 mx-auto">
         
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
                  v-model="user.email"
                  placeholder="Email*" class="form-control">
                  <small class="text-danger "> {{ errorMessage }}</small>
              </div>
              <div class="form-group mb-3">
                <input 
                  type="password" 
                  v-model="user.password"
                  placeholder="Password*" class="form-control">
              </div>
            
              <div class="form-group mb-3">
                <button @click="userAuth" class="btn btn-primary btn-sm">
                  Login 
                </button>
               
                
              
              </div>
              <div class="form-group mb-3">
                <router-link to="/register">register</router-link>
               
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
    import { reactive, ref } from "vue";
    import axios from "axios";
   import { useRouter } from "vue-router";
  const routerLink  = useRouter();
    const errorMessage = ref(null)

    const user = reactive({
        email: '',
        password: ''
      
      }
    );
  
    const userAuth = async () => {
      
     await  axios
        .post('/api/login', {
          email: user.email,
          password: user.password,
        })
        .then((response) => {
          const token = JSON.stringify(response.data.token);
          console.log(token);
          localStorage.setItem('access_token', token);

          routerLink.push('/dashboard');
        })
        .catch((e) => {
          if (e.response && e.response.status === 401) {
            errorMessage.value ="Invalid credentials"
           
          }else{
            errorMessage.value = 'email and password  are required .';
          }
           
        });

        
    }
    
  </script>
  
  <style>
  </style>