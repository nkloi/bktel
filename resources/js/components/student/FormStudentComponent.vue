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
                                        <input
                                            type="text"
                                            v-model.lazy="student.first_name"
                                            class="form-control"
                                            placeholder="First Name"
                                            :class="{
                                                'is-invalid':
                                                    this.errorForm.first_name
                                                        .length != 0,
                                            }"
                                        />
                                        <InvalidComponent
                                            :class="{
                                                'd-block':
                                                    this.errorForm.first_name
                                                        .length != 0,
                                                'd-none':
                                                    this.errorForm.first_name
                                                        .length == 0,
                                            }"
                                            :content="errorForm.first_name[0]"
                                        ></InvalidComponent>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Last Name</label>
                                        <input
                                            type="text"
                                            v-model.lazy="student.last_name"
                                            class="form-control"
                                            placeholder="Last Name"
                                            :class="{
                                                'is-invalid':
                                                    this.errorForm.last_name
                                                        .length != 0,
                                            }"
                                        />
                                        <InvalidComponent
                                            :class="{
                                                'd-block':
                                                    this.errorForm.last_name
                                                        .length != 0,
                                                'd-none':
                                                    this.errorForm.last_name
                                                        .length == 0,
                                            }"
                                            :content="errorForm.last_name[0]"
                                        ></InvalidComponent>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Student Code</label>
                                        <input
                                            type="text"
                                            v-model.lazy="student.student_code"
                                            class="form-control"
                                            placeholder="Student Code"
                                            :class="{
                                                'is-invalid':
                                                    this.errorForm.student_code
                                                        .length != 0,
                                            }"
                                        />
                                        <InvalidComponent
                                            :class="{
                                                'd-block':
                                                    this.errorForm.student_code
                                                        .length != 0,
                                                'd-none':
                                                    this.errorForm.student_code
                                                        .length == 0,
                                            }"
                                            :content="errorForm.student_code[0]"
                                        ></InvalidComponent>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Department</label>
                                        <input
                                            type="text"
                                            v-model.lazy="student.department"
                                            class="form-control"
                                            placeholder="Department"
                                            :class="{
                                                'is-invalid':
                                                    this.errorForm.department
                                                        .length != 0,
                                            }"
                                        />
                                        <InvalidComponent
                                            :class="{
                                                'd-block':
                                                    this.errorForm.department
                                                        .length != 0,
                                                'd-none':
                                                    this.errorForm.department
                                                        .length == 0,
                                            }"
                                            :content="errorForm.department[0]"
                                        ></InvalidComponent>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Faculty</label>
                                        <input
                                            type="text"
                                            v-model.lazy="student.faculty"
                                            class="form-control"
                                            placeholder="Faculty"
                                            :class="{
                                                'is-invalid':
                                                    this.errorForm.faculty
                                                        .length != 0,
                                            }"
                                        />
                                        <InvalidComponent
                                            :class="{
                                                'd-block':
                                                    this.errorForm.faculty
                                                        .length != 0,
                                                'd-none':
                                                    this.errorForm.faculty
                                                        .length == 0,
                                            }"
                                            :content="errorForm.faculty[0]"
                                        ></InvalidComponent>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input
                                            type="text"
                                            v-model.lazy="student.address"
                                            class="form-control"
                                            placeholder="Address"
                                            :class="{
                                                'is-invalid':
                                                    this.errorForm.address
                                                        .length != 0,
                                            }"
                                        />
                                        <InvalidComponent
                                            :class="{
                                                'd-block':
                                                    this.errorForm.address
                                                        .length != 0,
                                                'd-none':
                                                    this.errorForm.address
                                                        .length == 0,
                                            }"
                                            :content="errorForm.address[0]"
                                        ></InvalidComponent>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input
                                            type="text"
                                            v-model.lazy="student.phone"
                                            class="form-control"
                                            placeholder="Phone Number"
                                            :class="{
                                                'is-invalid':
                                                    this.errorForm.phone
                                                        .length != 0,
                                            }"
                                        />
                                        <InvalidComponent
                                            :class="{
                                                'd-block':
                                                    this.errorForm.phone
                                                        .length != 0,
                                                'd-none':
                                                    this.errorForm.phone
                                                        .length == 0,
                                            }"
                                            :content="errorForm.phone[0]"
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
        student_id: String,
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
            errorForm: {
                first_name: [],
                last_name: [],
                faculty: [],
                student_code: [],
                department: [],
                address: [],
                phone: [],
            },
        };
    },
    methods: {
        async register() {
            const url = this.base_url + "/students";
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
                this.clearErrorForm();
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
        clearErrorForm() {
            this.errorForm = {
                first_name: [],
                last_name: [],
                faculty: [],
                student_code: [],
                department: [],
                address: [],
                phone: [],
            };
        },
    },
    async mounted() {
        if (this.student_id != "") {
            const url = this.base_url + "/students/" + this.student_id;
            const data = await axios.get(url);
            this.student = data.data;
            console.log(data.data.faculty);
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