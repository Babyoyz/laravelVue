<template>
    <div class="card-login mx-auto mt-5 mb-5">
        <div class="card-header">
            <p>CMS System</p>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <lottie-player
                        src="lottie/register.json"
                        background="transparent"
                        speed="1"
                        class="w-100"
                        loop
                        autoplay
                    ></lottie-player>
                </div>
                <div class="col-lg-6">
                    <form class="mt-3">
                        <div class="d-flex flex-column gap-3">
                            <div>
                                <p class="mb-0">Username</p>
                                <input type="text" v-model="UserName" class="form-control" />
                            </div>
                            <div>
                                <p class="mb-0">Password</p>
                                <input type="password" v-model="Password" class="form-control" />
                            </div>
                            <div class="mx-auto">
                                <button
                                    :class="login == false?'btn btn-outline-danger':'btn btn-success' "
                                    @click.prevent="fnLogin()"
                                >Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Axios from "axios"

export default {
    data() {
        return {
            UserName: '',
            Password: '',
            login: false
        }
    },
    updated() {
        if (this.UserName !== '' && this.Password.length > 5) {
            this.login = true
        } else {
            this.login = false
        }
    },
    methods: {
      async  fnLogin() {

                if(this.login == false){


                }else{

                    const { data } = await axios.post('api/checklogin',{
                        username:this.UserName,
                        password:this.Password,

                    })

                if(data.statuscode == 200){

                    window.location.href ="main_index"
                }else{

                    alert(data.Des)
                }
            
                }
        }
    }
}
</script>

<style scoped>
.card-login {
    background: white;
    width: 80%;
    border: 3px solid #eee;
    padding: 2rem;
    border-radius: 1.5rem;
    box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
    animation: fadein 2s;
    -moz-animation: fadein 2s; /* Firefox */
    -webkit-animation: fadein 2s; /* Safari and Chrome */
    -o-animation: fadein 2s;
}
.card-login > .card-header {
    background: white;
    border: none;
    text-align: center;
    font-size: 2.5rem;
}
@media only screen and (max-width: 992px) {
    .card-login {
        width: 100%;
        border: 3px solid #eee;
        padding: 1rem;
        border-radius: 1rem;
        box-shadow: none;
    }
}

@keyframes fadein {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
@-moz-keyframes fadein {
    /* Firefox */
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
@-webkit-keyframes fadein {
    /* Safari and Chrome */
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
@-o-keyframes fadein {
    /* Opera */
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
</style>