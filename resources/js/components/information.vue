<template>

   <div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">

                        <h3>Welcome</h3>


                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Information</h3>
                                <div class="row register-form">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="first_name"  name="first_name" require />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="last_name" value="" name="last_name" require />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="student_code" value="" name="student_code" require/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="department" value="" name="department" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="faculty" value=""  name="faculty"/>
                                        </div>

                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline">
                                                    <input type="radio" name="gender" value="male" checked>
                                                    <span> Male </span>
                                                </label>
                                                <label class="radio inline">
                                                    <input type="radio" name="gender" value="female">
                                                    <span>Female </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="address" value="" name="address" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="phone" value="" name="phone"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="note" value="" name="note"/>
                                        </div>
                                        <button type="submit" class="btnRegister">Submit</button>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">


                                </div>

                                </div>
                            </div>
                        </div>
                    </div>


</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
