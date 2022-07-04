<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 1345.6px">
        <!-- Content Header (Page header) -->
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
                            <li class="breadcrumb-item active">Logout</li>
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
                            <div class="card-header">
                                <h3 class="card-title">
                                    Quick Example
                                    <small>jQuery Validation</small>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" @submit.prevent="register()">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputFirstName"
                                            >Teacher Name</label
                                        >
                                        <select
                                            class="form-control"
                                            v-model="form.teacher_id"
                                        >
                                            <option
                                                v-for="(
                                                    teacher, index
                                                ) in teachers"
                                                :key="index"
                                                :value="teacher.id"
                                            >
                                                {{
                                                    teacher.first_name +
                                                    " " +
                                                    teacher.last_name
                                                }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFirstName"
                                            >Subject Name</label
                                        >
                                        <select
                                            class="form-control"
                                            v-model="form.subject_id"
                                        >
                                            <option
                                                v-for="(
                                                    subject, index
                                                ) in subjects"
                                                :key="index"
                                                :value="subject.id"
                                            >
                                                {{ subject.name }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFirstName"
                                            >Semester</label
                                        >
                                        <input
                                            type="text"
                                            required
                                            v-model.lazy="form.semester"
                                            class="form-control"
                                            id="exampleFirstName"
                                            placeholder="Semester"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFirstName"
                                            >Year</label
                                        >
                                        <input
                                            type="text"
                                            required
                                            v-model.lazy="form.year"
                                            class="form-control"
                                            id="exampleFirstName"
                                            placeholder="Year"
                                        />
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
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
    <!-- /.content-wrapper -->
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            teachers: null,
            subjects: null,
            form: {
                teacher_id: null,
                subject_id: null,
                semester: null,
                year: null,
            },
        };
    },
    props: {
        domain: String,
    },
    methods: {
        async register() {
            console.log(this.form);
            try {
                const url = this.domain + "/dashboard/teacher-to-subject";
                const data = await axios.post(url, this.form);
                console.log(data);
            } catch (error) {
                console.log(error);
            }
        },
    },
    mounted() {
        axios
            .get(this.domain + "/dashboard/teachers/getAll")
            .then((data) => (this.teachers = data.data))
            .catch((error) => console.log(error));

        axios
            .get(this.domain + "/dashboard/subjects/getAll")
            .then((data) => (this.subjects = data.data))
            .catch((error) => console.log(error));
    },
};
</script>
