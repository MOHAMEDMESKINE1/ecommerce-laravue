import { defineStore } from 'pinia';


export const useAuthStore = defineStore('auth', {
    state: () => ({ 
        user: '',
        errors: ''
    }),
    getters: {

        getUser: (state) => state.user,
        getErrors: (state) => state.errors,
      
        getHeaderConfig(state) {
            const config = {
                headers: {
                    "Authorization" : `Bearer ${state.user.currentToken}`,
                    "Accept": "application/json",
                }
            }  
            return config;
        }
    },
    actions: {
        setUser() {
            if (localStorage.getItem('access_token')) {
                this.user = JSON.parse(localStorage.getItem('access_token'));
            }
        },
        storeUser(user) {
            localStorage.setItem('access_token', JSON.stringify(user));
            this.user = user;
        },
        clearStoredData() {
            localStorage.removeItem('access_token');
            this.user = null;
        },
        setErrors(errors) {
            this.errors = errors;
        },
        clearErrors() {
            this.errors = '';
        }
    },
});