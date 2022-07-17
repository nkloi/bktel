<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 1345.6px">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Upload Report</h1>
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

                            <div class="card">
                                <div class="card-header" style="width: 25 rem">
                                    <label>Search Teacher</label>
                                    <form
                                        enctype="multipart/form-data"
                                        id="quickForm"
                                        @submit.prevent="Search()"
                                    >
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                placeholder="Enter Teacher Code"
                                                name="teacher_id"
                                                v-model="information.teacher_id"
                                                class="form-control"
                                            />
                                            <input
                                                type="text"
                                                placeholder="Enter Subject Code"
                                                name="subject_id"
                                                v-model="information.subject_id"
                                                class="form-control"
                                            />
                                            <input
                                                type="text"
                                                placeholder="Enter Semester"
                                                name="semester"
                                                v-model="information.semester"
                                                class="form-control"
                                            />
                                            <input
                                                type="text"
                                                placeholder="Year"
                                                name="year"
                                                v-model="information.year"
                                                class="form-control"
                                            />
                                            <button
                                                type="submit"
                                                class="btn btn-primary"
                                            >
                                                Search
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <form id="quickForm" @submit.prevent="register()">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputTeacherName"
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
                                        <label for="exampleInputSubjectName"
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
                                        <label for="exampleInputSemester"
                                            >Semester</label
                                        >
                                        <select
                                            class="form-control"
                                            v-model="form.semester"
                                        >
                                            <option value="1">HK1</option>
                                            <option value="2">HK2</option>
                                            <option value="3">HK3</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputYear"
                                            >Year</label
                                        >
                                        <select
                                            class="form-control"
                                            v-model="form.year"
                                        >
                                            <option :value="currentYear - 1">
                                                {{ currentYear - 1 }}
                                            </option>
                                            <option :value="currentYear">
                                                {{ currentYear }}
                                            </option>
                                            <option :value="currentYear + 1">
                                                {{ currentYear + 1 }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile"
                                            >File</label
                                        >
                                        <input
                                            type="file"
                                            name="students"
                                            @change="processFile($event)"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTitle">Title</label>
                                        <input
                                            type="text"
                                            v-model="form.title"
                                            name="Title"
                                            class="form-control"
                                            id="exampleInputTitle"
                                            placeholder="Title"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleNote">Note</label>
                                        <input
                                            type="text"
                                            v-model="form.note"
                                            name="note"
                                            class="form-control"
                                            id="exampleInputNote"
                                            placeholder="Note"
                                        />
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        Search
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
            information: {
                teacher_id: "",
                subject_id: "",
                semester: "",
                year: "",
            },
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
    computed: {
        currentYear() {
            return new Date().getFullYear();
        },
    },
    methods: {
        async register() {
            console.log(this.form);
            try {
                const url = this.domain + "/dashboard/teacher-to-subject";
                const data = await axios.post(url, this.form);
                console.log(data);
                window.location.href = "/dashboard";
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
