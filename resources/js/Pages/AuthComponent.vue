<template>
    <!-- MODAL SECTION FOR LOGIN START -->
    <div class="modal fade centered-modal" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">logo</h4>
                    <p class="submodal-title"> Welcome to JustEroticaHub</p>
                </div>
                <form method="POST"  action="#" @submit.prevent="login">

                <div class="modal-body">
                        <div class="form-row">
                            <label for="">Your email address</label>
                            <div class="foot-email-box">

                                <input type="email" v-model="loginForm.email" class="form-control" placeholder="Enter Email Here....">
                            </div>
                        </div> <br><br>
                        <div class="form-row">
                            <label for="">Your password</label>
                            <div class="foot-email-box">
                                <input type="password" v-model="loginForm.password"  class="form-control" placeholder="Enter password Here....">
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn-login" v-bind:disabled="!loginForm.email">
                        <i class="fa fa-circle-o-notch fa-spin" v-if="loader"></i>  Login
                    </button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- MODAL SECTION FOR LOGIN ENDS -->

    <!-- MODAL SECTION FOR REGISTRATION START -->
    <div class="modal fade centered-modal" tabindex="-1" role="dialog" id="myRegistrationModal">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">logo</h4>
                    <p class="submodal-title"> Welcome to JustEroticaHub</p>
                </div>
                    <form method="POST"  action="#" @submit.prevent="submit">

                    <div class="modal-body">
                        <div class="form-row">
                            <label for="">Your email address</label>
                            <div class="foot-email-box">
                                <input type="email" v-model="form.email" class="form-control" placeholder="Enter Email Here....">
                            </div>
                        </div> <br>
                        <div class="form-row">
                            <label for="">Gender</label>
                            <div class="foot-email-box">
                                <select v-model="form.gender" style="color: black" id="" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Secrecy">Secrecy</option>
                                </select>
                            </div>
                        </div><br>
                        <div class="form-row">
                            <label for="">Your password</label>
                            <div class="foot-email-box">
                                <input type="password" v-model="form.password" class="form-control" placeholder="Enter password Here....">
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn-login" v-bind:disabled="!form.email">
                        <i class="fa fa-circle-o-notch fa-spin" v-if="loader"></i>  Register
                    </button>
                </div>
                    </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- MODAL SECTION FOR REGISTRATION ENDS -->


    <div class="modal fade centered-modal" tabindex="-1" role="dialog" id="myVerificationModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">logo</h4>
                    <p class="submodal-title">Verification</p>
                </div>
                <form method="POST"  action="#" @submit.prevent="verify">

                    <div class="modal-body">

                        <div class="form-row">
                            <label for="">Your Verification Code</label>
                            <div class="foot-email-box">
                                <input type="text" v-model="verifyForm.verification" class="form-control" placeholder="Enter Code Here....">
                            </div>
                        </div> <br>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn-login" v-bind:disabled="!verifyForm.verification">
                            <i class="fa fa-circle-o-notch fa-spin" v-if="loader"></i>  Verify
                        </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</template>

<script>
export default {
    name: "AuthComponent",
    props:{

    },
    data() {
        return {
            loader: false,
            addEdit: '',
            form:{
                gender:'',
                email:'',
                password:''
            },
            verifyForm: {verification: ''},
            loginForm:{
                email:'',
                password:'',
            }

        }
    },
    methods:{
        login() {
            this.loader = true;
            axios.post("/user/login", this.loginForm,{
                'content-type': 'multipart/form-data'
            }).then(response => {
                console.log(this.loginForm);
                // console.log(response.data.success);
                // $('#myRegistrationModal').modal('hide');
                // toastr.success(response.data.success, 'Success');
                // $('#myVerificationModal').modal('show');
                // this.loader = false;
            }).catch(error => {
                this.loader = false;
                $('#myRegistrationModal').modal('hide');
                toastr.error(error.response.data.message, 'Error');
            });
        },
        submit() {
            this.loader = true;
            axios.post("/user/register", this.form,{
                'content-type': 'multipart/form-data'
            }).then(response => {
                console.log(this.form);
                console.log(response.data.success);
                $('#myRegistrationModal').modal('hide');
                toastr.success(response.data.success, 'Success');
                $('#myVerificationModal').modal('show');
                this.loader = false;
            }).catch(error => {
                this.loader = false;
                $('#myRegistrationModal').modal('hide');
                toastr.error(error.response.data.message, 'Error');
            });
        },
        verify() {
            this.loader = true;
            axios.post("/user/verify", this.verifyForm,{
                'content-type': 'multipart/form-data'
            }).then(response => {
                console.log(this.form);
                console.log(response.data.success);
                $('#myVerificationModal').modal('hide');
                toastr.success(response.data.success, 'Success');
                this.loader = false;
            }).catch(error => {
                this.loader = false;
                $('#myVerificationModal').modal('hide');
                toastr.error(error.response.data.message, 'Error');
            });
        },
    }


}
</script>

<style scoped>

</style>
