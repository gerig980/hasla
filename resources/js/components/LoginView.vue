<template>
    <section id="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div>
                        <h4>Hyr në Llogari</h4>
                        <p class="text-danger" v-if="error">{{ error }}</p>
                        <form @submit.prevent="login">
                            <label for="email">Email:</label><br>
                            <input 
                                type="email"
                                name="email"
                                v-model="form.email"
                            >
                            <br>
                            <label for="password">Fjalëkalimi:</label><br>
                            <input 
                                type="password" 
                                name="password"
                                v-model="form.password"
                            ><br>
                            <input type="submit" value="SIGN IN" id="submit">
                        </form>
                        <!-- <p class="text-center"><a href="#">Forgot your password?</a></p> -->
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div>
                        <h4>I ri në Klaudio Fashion?</h4>
                        <p>Regjistrohuni tani për të marrë më shumë nga dyqani ynë online.</p>
                        <p class="text-danger" v-for="error in errors" :key="error">
                            <span v-for="err in error" :key="err">{{ err }}</span>
                        </p>
                        <form @submit.prevent="register">
                            
                            <label for="email">Emri i plotë:</label><br>
                            <input 
                                type="text" 
                                v-model.trim="formRegister.name" 
                                name="name"
                                autocomplete="off"
                            />
                            <br>
                            <label for="email">Username:</label><br>
                            <input 
                                type="text" 
                                v-model.trim="formRegister.username" 
                                name="username"
                                autocomplete="off"
                            />
                            <br>
                            <label for="email">Email:</label><br>
                            <input 
                                type="email" 
                                v-model.trim="formRegister.email" 
                                name="email"
                                autocomplete="off"
                            />
                            <br>
                            <label for="phone">Numër Telefoni:</label><br>
                            <input type="phone" v-model.trim="formRegister.phone" name="phone" autocomplete="off" />
                            <br>
                            <label for="password">Fjalëkalimi:</label><br>
                            <input 
                                type="password" 
                                v-model.trim="formRegister.password" 
                                name="password"
                                autocomplete="off"
                            />
                            <br>
                            <label for="password_confirmation">Konfirmo fjalëkalimin:</label><br>
                            <input 
                                type="password" 
                                v-model.trim="formRegister.c_password"
                                name="password_confirmation" 
                                autocomplete="off"
                            /><br>
                            <!-- <hr> -->
                            <!-- <div class="w-100">
                                <input type="checkbox" name="privacy" id="privacy">
                                <label for="privacy" style="display: inline;">I agree to the <a><b>Privacy & Cookie Policy</b></a> and <a><b>Terms & Conditions</b></a></label><br>
                            </div> -->
                            <button 
                                type="submit" id="submit"
                                :disabled="formRegister.busy">
                                <span v-if="formRegister.busy"><i class="fas fa-spinner"></i></span>REGJISTROHUNI
                            </button>
                        </form>
                        <!-- <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, debitis!</p> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <BottomIcons/>
</template>


<script scoped>
import axios from 'axios';
import {useToast} from "vue-toastification";
import { reactive, ref } from 'vue';
import { useRouter } from "vue-router";
import { useStore } from 'vuex'
import BottomIcons from "./dashboard-components/BottomIcons.vue"

export default{
    components: { BottomIcons },
    setup(){
        const router = useRouter();
        const store = useStore();

        let form = reactive({
            email: '',
            password: ''
        });

        let formRegister = reactive({
            name: '',
            email: '',
            phone: '',
            password: '',
            c_password: '',
        });

        let error = ref();
        let errors = ref([]);
        
        const login = async() => {
            await axios.post('/api/v1/login', form).then(res=>{
                if(res.data.success){
                    // localStorage.setItem('token', res.data.data.token);
                    store.dispatch('setToken', res.data.data.token);
                    router.push({name: 'user.profile'})
                }else{
                    error.value = res.data.message;
                }
            })
        }

        const register = async() => {
            await axios.post('/api/v1/register', formRegister).then(res=>{
                if(res.data.success){
                    // localStorage.setItem('token', res.data.data.token);
                    store.dispatch('setToken', res.data.data.token);
                    router.push({name: 'user.profile'})
                }
            }).catch(e=>{
                errors.value = e.response.data.message;
            });
        }

        return {
            formRegister,
            form,
            login,
            register,
            error,
            errors,
        }
    },
    created() {
        document.title = 'Hyr në Klaudio Fashion';
    }
}


// export default {
//     name: "register",
//     components: {
       
//     },
//     data() {
//         return {
//             form: {
//                 username: '',
//                 name: '',
//                 email: '',
//                 password: '',
//                 password_confirmation: ''
//             },
//             formLogin: {
//                 email: '',
//                 password: '',
//                 _token: this.token,
//                 remember: 0,
//             },
//         }
//     },
//     watch: {
//     },

//     mounted() {
//         if (this.authUser) {
//             this.$router.go(-1);
//         }
//     },

//     methods: {
//         register() {
//             this.loading = true;
//             let url = `api/v1/user/register`;
//             axios.post(url, this.form).then((response) => {
//                 this.loading = false;
//                 if (response.data.error) {
//                     this.toast.error(response.data.message);
//                 }
//                 if (response.data.success) {
//                     this.$router.push({name: 'user.profile'});
//                     this.errors = [];
//                     this.toast.success(response.data.success);
//                 }
//             })
//             .catch((error) => {
//                 this.loading = false;
//                 if (error.response && error.response.status == 422) {
//                     this.errors = error.response.data.errors;
//                 }
//             })
//         },

//         login() {
//             let form =this.form; let url = `api/v1/user/login`;
//             this.loading = true;

//             axios.post(url, form).then((response) => {
//                 this.loading = false;
//                 if (response.data.error) {
//                     this.toast.error(response.data.error);
//                 }

//                 if (response.data.success) {
//                     this.errors = [];
//                     let user = response.data.user;
//                     if (user.role_id == 2) {
//                         this.$router.push({name: 'user.profile'});
//                     } 
                       
//                 }
//             }).catch((error) =>{
//                 this.loading = false;
//                 if (error.response && error.response.status == 422)
//                 {
//                     this.errors = error.response.data.errors;
//                 }
//             });
//         },
//     },
//      setup() {
//         const toast = useToast();
//         return { toast }
//     },
// }
</script>



<style>
#login {
    padding: 200px 0px;
    background: #fff;
}
#login .row {
    width: 50%;
    margin: auto;
}
#login .col-lg-6 div {
    width: 70%;
    margin: auto;
}
#login .col-lg-6:first-child {
    border-right: 1px solid gainsboro;
}
#login h4 {
    text-align: center;
    margin: 51px 0 41px;
    font-family: 'Rubik', sans-serif;
    font-weight:600;
}
#login p {
    font-size: 0.9rem;
    line-height: 17px;
    color: #666;
    font-family: 'Muli', sans-serif;
}
#login a {
    font-size: 15px;
    color: #666;
    text-decoration: none;
}
#login a:hover {
    text-decoration: underline;
    color: #000;
}
#login label {
    color: #666;
    font-family: 'Muli', sans-serif;
    margin-left:5px;
}
#login input {
    width: -webkit-fill-available;
    border: 1px solid #E5E5E5;
    height: 39px;
    outline: none;
    margin: 6px 0 15px;
    padding: 10px;
}
#login input:hover {
    border-color: #222;
}
#login input:focus {
    border-color: #222;
}
#login #privacy {
    width: auto;
    height: auto;
    margin: 0;
    vertical-align: middle;
}
#login input[type='checkbox'] {
    accent-color: #000;
}
#login #submit {
    width: 100%;
    border-color: transparent;
    background-color: #222222;
    color: #fff;
    font-weight: bold;
    height: 44px;
    margin: 21px 0 13px;
    font-family: 'Muli', sans-serif;
    font-weight:800;
}
#login #submit:hover {
    border-color: transparent;
    background-color: #666;
}
@media(max-width:1600px) {
    #login .row {
        width:70%;
    }
}
@media(max-width:1200px) {
    #login .row, #login .col-lg-6 div {
        width: 100%;
    }
    #login .col-lg-6:first-child {
        border-right: 0;
    }
    #login {
        padding:120px 0px;
    }
    #login h4 {
        margin-bottom:10px;
    }
}
</style>