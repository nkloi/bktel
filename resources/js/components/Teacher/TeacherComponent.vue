<template>
    <div class="content-wrapper" style="min-height: 1345.31px">
        <!-- Content Header (Page header) -->
        <div id="toast-container" class="toast-top-right">
            <div class="toast toast-success" aria-live="polite" style="">
                <div class="toast-message"></div>
            </div>
        </div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Register Teacher</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Validation</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->

                        <div class="card card-primary">
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form
                                id="quickForm"
                                novalidate="novalidate"
                                @submit.prevent="register()"
                            >
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"
                                            >Email</label
                                        >
                                        <i
                                            class=" "
                                        ></i>
                                        <input
                                            type="text"
                                            v-model.lazy="teacher.email"
                                            class="form-control"
                                            placeholder="Email"
                                            :class="{
                                                'is-invalid': this.errorForm
                                                    ? this.errorForm.email
                                                        ? true
                                                        : false
                                                    : false,
                                            }"
                                        />
                                        <InvalidComponent
                                            :class="{
                                                'd-block':
                                                    this.errorForm != null
                                                        ? this.errorForm.email
                                                            ? true
                                                            : false
                                                        : false,
                                                'd-none':
                                                    this.errorForm != null
                                                        ? this.errorForm.email
                                                            ? false
                                                            : true
                                                        : true,
                                            }"
                                            :content="
                                                this.errorForm != null
                                                    ? this.errorForm.email
                                                        ? errorForm.email[0]
                                                        : 'default  '
                                                    : 'default'
                                            "
                                        ></InvalidComponent>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"
                                            >First Name</label
                                        >
                                        <i
                                            class=" "
                                        ></i>
                                        <input
                                            type="text"
                                            v-model.lazy="teacher.first_name"
                                            class="form-control"
                                            placeholder="First Name"
                                            :class="{
                                                'is-invalid': this.errorForm
                                                    ? this.errorForm.first_name
                                                        ? true
                                                        : false
                                                    : false,
                                            }"
                                        />
                                        <InvalidComponent
                                            :class="{
                                                'd-block':
                                                    this.errorForm != null
                                                        ? this.errorForm
                                                              .first_name
                                                            ? true
                                                            : false
                                                        : false,
                                                'd-none':
                                                    this.errorForm != null
                                                        ? this.errorForm
                                                              .first_name
                                                            ? false
                                                            : true
                                                        : true,
                                            }"
                                            :content="
                                                this.errorForm != null
                                                    ? this.errorForm.first_name
                                                        ? errorForm
                                                              .first_name[0]
                                                        : 'default  '
                                                    : 'default'
                                            "
                                        ></InvalidComponent>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"
                                            >Last Name</label
                                        >
                                        <i
                                            class=" "
                                        ></i>
                                        <input
                                            type="text"
                                            v-model.lazy="teacher.last_name"
                                            class="form-control"
                                            placeholder="Last Name"
                                            :class="{
                                                'is-invalid': this.errorForm
                                                    ? this.errorForm.last_name
                                                        ? true
                                                        : false
                                                    : false,
                                            }"
                                        />
                                        <InvalidComponent
                                            :class="{
                                                'd-block':
                                                    this.errorForm != null
                                                        ? this.errorForm
                                                              .last_name
                                                            ? true
                                                            : false
                                                        : false,
                                                'd-none':
                                                    this.errorForm != null
                                                        ? this.errorForm
                                                              .last_name
                                                            ? false
                                                            : true
                                                        : true,
                                            }"
                                            :content="
                                                this.errorForm != null
                                                    ? this.errorForm.last_name
                                                        ? errorForm.last_name[0]
                                                        : 'default  '
                                                    : 'default'
                                            "
                                        ></InvalidComponent>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"
                                            >Teacher Code</label
                                        >
                                        <i
                                            class=" "
                                        ></i>
                                        <input
                                            type="text"
                                            v-model.lazy="teacher.teacher_code"
                                            class="form-control"
                                            placeholder="Teacher Code"
                                            :class="{
                                                'is-invalid': this.errorForm
                                                    ? this.errorForm
                                                          .teacher_code
                                                        ? true
                                                        : false
                                                    : false,
                                            }"
                                        />
                                        <InvalidComponent
                                            :class="{
                                                'd-block':
                                                    this.errorForm != null
                                                        ? this.errorForm
                                                              .teacher_code
                                                            ? true
                                                            : false
                                                        : false,
                                                'd-none':
                                                    this.errorForm != null
                                                        ? this.errorForm
                                                              .teacher_code
                                                            ? false
                                                            : true
                                                        : true,
                                            }"
                                            :content="
                                                this.errorForm != null
                                                    ? this.errorForm
                                                          .teacher_code
                                                        ? errorForm
                                                              .teacher_code[0]
                                                        : 'default  '
                                                    : 'default'
                                            "
                                        ></InvalidComponent>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"
                                            >Department</label
                                        >
                                        <i
                                            class=" "
                                        ></i>
                                        <input
                                            type="text"
                                            v-model.lazy="teacher.department"
                                            class="form-control"
                                            placeholder="Department"
                                            :class="{
                                                'is-invalid': this.errorForm
                                                    ? this.errorForm.department
                                                        ? true
                                                        : false
                                                    : false,
                                            }"
                                        />
                                        <InvalidComponent
                                            :class="{
                                                'd-block':
                                                    this.errorForm != null
                                                        ? this.errorForm
                                                              .department
                                                            ? true
                                                            : false
                                                        : false,
                                                'd-none':
                                                    this.errorForm != null
                                                        ? this.errorForm
                                                              .department
                                                            ? false
                                                            : true
                                                        : true,
                                            }"
                                            :content="
                                                this.errorForm != null
                                                    ? this.errorForm.department
                                                        ? errorForm
                                                              .department[0]
                                                        : 'default  '
                                                    : 'default'
                                            "
                                        ></InvalidComponent>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"
                                            >Faculty</label
                                        >
                                        <i
                                            class=" "
                                        ></i>
                                        <input
                                            type="text"
                                            v-model.lazy="teacher.faculty"
                                            class="form-control"
                                            placeholder="Faculty"
                                            :class="{
                                                'is-invalid': this.errorForm
                                                    ? this.errorForm.faculty
                                                        ? true
                                                        : false
                                                    : false,
                                            }"
                                        />
                                        <InvalidComponent
                                            :class="{
                                                'd-block':
                                                    this.errorForm != null
                                                        ? this.errorForm.faculty
                                                            ? true
                                                            : false
                                                        : false,
                                                'd-none':
                                                    this.errorForm != null
                                                        ? this.errorForm.faculty
                                                            ? false
                                                            : true
                                                        : true,
                                            }"
                                            :content="
                                                this.errorForm != null
                                                    ? this.errorForm.faculty
                                                        ? errorForm.faculty[0]
                                                        : 'default  '
                                                    : 'default'
                                            "
                                        ></InvalidComponent>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"
                                            >Address</label
                                        >
                                        <i
                                            class=" "
                                        ></i>
                                        <input
                                            type="text"
                                            v-model.lazy="teacher.address"
                                            class="form-control"
                                            placeholder="Address"
                                            :class="{
                                                'is-invalid': this.errorForm
                                                    ? this.errorForm.address
                                                        ? true
                                                        : false
                                                    : false,
                                            }"
                                        />
                                        <InvalidComponent
                                            :class="{
                                                'd-block':
                                                    this.errorForm != null
                                                        ? this.errorForm.address
                                                            ? true
                                                            : false
                                                        : false,
                                                'd-none':
                                                    this.errorForm != null
                                                        ? this.errorForm.address
                                                            ? false
                                                            : true
                                                        : true,
                                            }"
                                            :content="
                                                this.errorForm != null
                                                    ? this.errorForm.address
                                                        ? errorForm.address[0]
                                                        : 'default  '
                                                    : 'default'
                                            "
                                        ></InvalidComponent>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"
                                            >Phone</label
                                        >
                                        <i
                                            class=" "
                                        ></i>
                                        <input
                                            type="text"
                                            v-model.lazy="teacher.phone"
                                            class="form-control"
                                            placeholder="Phone"
                                            :class="{
                                                'is-invalid': this.errorForm
                                                    ? this.errorForm.phone
                                                        ? true
                                                        : false
                                                    : false,
                                            }"
                                        />
                                        <InvalidComponent
                                            :class="{
                                                'd-block':
                                                    this.errorForm != null
                                                        ? this.errorForm.phone
                                                            ? true
                                                            : false
                                                        : false,
                                                'd-none':
                                                    this.errorForm != null
                                                        ? this.errorForm.phone
                                                            ? false
                                                            : true
                                                        : true,
                                            }"
                                            :content="
                                                this.errorForm != null
                                                    ? this.errorForm.phone
                                                        ? errorForm.phone[0]
                                                        : 'default  '
                                                    : 'default'
                                            "
                                        ></InvalidComponent>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Note</label>
                                        <input
                                            type="text"
                                            v-model.lazy="teacher.note"
                                            class="form-control"
                                            placeholder="Note"
                                        />
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button
                                        class="btn btn-primary"
                                        type="submit"
                                    >
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6"></div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</template>

<script>
import axios from "axios";
import InvalidComponent from "../InvalidComponent.vue";
export default {
    props: {
        base_url: String,
        student_id: String,
    },
    components: {
        InvalidComponent,
    },
    data() {
        return {
            teacher: {
                email: "",
                first_name: "",
                last_name: "",
                faculty: "",
                teacher_code: "",
                department: "",
                address: "",
                phone: "",
                note: "",
            },
            errorForm: null,
        };
    },
    methods: {
        async register() {
            try {
                this.errorForm = null;
                const url = this.base_url + "/teachers";
                console.log(url);
                const data = await axios.post(url, this.teacher);
                console.log(data);
                toastr.success("You update your information success");
                this.errorForm = null;
            } catch (error) {
                toastr.error("Have something wrong with your information");
                this.errorForm = {
                    ...this.errorForm,
                    ...error.response.data.errors,
                };
                console.log(this.errorForm);
            }
        },
    },
};
</script>

<style scoped>
.invalid {
    margin-top: 0.25rem;
    font-size: 80%;
    color: #dc3545;
}
</style>
