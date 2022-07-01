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
                        <h1>Register Student</h1>
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
                                @submit.prevent="submit()"
                            >
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"
                                            >Name</label
                                        >
                                       
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Name"
                                            v-model.lazy="form.name"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"
                                            >File</label
                                        >
                                        <input
                                            type="file"
                                            name="students"
                                            @change="processFile($event)"
                                        />
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button
                                        class="btn btn-primary"
                                        type="submit"
                                    >
                                        Submit
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

export default {
    props: {
        base_url: String,
    },
    data() {
        return {
            form: {
                name: "",
                students: null,
            },
        };
    },
    methods: {
        async submit() {
            try {
                const url = this.base_url + "/dashboard/students/import";
                const data = await axios.post(url, this.form.students, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                });
                console.log(data);
                toastr.success("Upload file succeess");
            } catch (error) {
                console.log(error);
                toastr.error("Upload file faile !!!");
            }
        },
        processFile(event) {
            let formData = new FormData();
            formData.append("file", event.target.files[0]);
            formData.append("name", this.form.name);
            this.form.students = formData;
        },
    },
    mounted() {
        console.log(this.base_url);
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