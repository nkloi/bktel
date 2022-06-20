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
                        <h1 v-if="hasStudent == false">Register Student</h1>
                        <h1 v-else>Update Student</h1>
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
                                            >First Name</label
                                        >
                                        <i
                                            class="fa fa-asterisk required-icon"
                                        ></i>
                                        <input
                                            type="text"
                                            v-model.lazy="student.first_name"
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
                                        <label for="">Last Name</label>
                                        <i
                                            class="fa fa-asterisk required-icon"
                                        ></i>
                                        <input
                                            type="text"
                                            v-model.lazy="student.last_name"
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
                                        <label for="">Student Code</label>
                                        <i
                                            class="fa fa-asterisk required-icon"
                                        ></i>
                                        <input
                                            type="text"
                                            v-model.lazy="student.student_code"
                                            class="form-control"
                                            placeholder="Student Code"
                                            :class="{
                                                'is-invalid': this.errorForm
                                                    ? this.errorForm
                                                          .student_code
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
                                                              .student_code
                                                            ? true
                                                            : false
                                                        : false,
                                                'd-none':
                                                    this.errorForm != null
                                                        ? this.errorForm
                                                              .student_code
                                                            ? false
                                                            : true
                                                        : true,
                                            }"
                                            :content="
                                                this.errorForm != null
                                                    ? this.errorForm
                                                          .student_code
                                                        ? errorForm
                                                              .student_code[0]
                                                        : 'default  '
                                                    : 'default'
                                            "
                                        ></InvalidComponent>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Department</label>
                                        <i
                                            class="fa fa-asterisk required-icon"
                                        ></i>
                                        <input
                                            type="text"
                                            v-model.lazy="student.department"
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
                                        <label for="">Faculty</label>
                                        <i
                                            class="fa fa-asterisk required-icon"
                                        ></i>
                                        <input
                                            type="text"
                                            v-model.lazy="student.faculty"
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
                                        <label for="">Address</label>
                                        <i
                                            class="fa fa-asterisk required-icon"
                                        ></i>
                                        <input
                                            type="text"
                                            v-model.lazy="student.address"
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
                                        <label for="">Phone</label>
                                        <i
                                            class="fa fa-asterisk required-icon"
                                        ></i>
                                        <input
                                            type="text"
                                            v-model.lazy="student.phone"
                                            class="form-control"
                                            placeholder="Phone Number"
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
                                            v-model.lazy="student.note"
                                            class="form-control"
                                            placeholder="Note"
                                        />
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button
                                        v-if="hasStudent == false"
                                        class="btn btn-primary"
                                        type="submit"
                                    >
                                        Register
                                    </button>
                                    <button
                                        v-else
                                        class="btn btn-primary"
                                        type="submit"
                                    >
                                        Update
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
        user: String,
    },
    components: {
        InvalidComponent,
    },
    data() {
        return {
            student: {
                first_name: "",
                last_name: "",
                faculty: "",
                student_code: "",
                department: "",
                address: "",
                phone: "",
                note: "",
            },
            hasStudent: false,
            errorForm: null,
            student_id: null,
        };
    },
    methods: {
        async register() {
            const url = this.base_url + "/students";
            this.errorForm = null;
            try {
                if (this.hasStudent == false) {
                    const data = await axios.post(url, this.student);
                    console.log("result post data", data);
                    toastr.success("You register student success");
                } else {
                    const data = await axios.put(
                        url + "/" + this.student_id,
                        this.student
                    );
                    console.log("result put data", data);
                    toastr.success("You update your information success");
                }
                this.errorForm = null;
                console.log(this.errorForm);
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
    async mounted() {
        const user = JSON.parse(this.user);
        this.student_id = user.student.id;
        console.log(user.student);
        if (user.student != null) {
            this.student = user.student;
            this.hasStudent = true;
        } else {
            this.hasStudent = false;
        }
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
