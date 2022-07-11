<template>
<div>

    <div class="col-md-6" style = "margin: 0 auto ">

                <div class="card" >
                        <div class="card-header" style="width: 25 rem;">
                        <label>Upload File Report</label>
                        <form   enctype='multipart/form-data' id="quickForm" @submit.prevent="Search()">
                            <div class="form-group">
                            <input type="text" placeholder="Enter Teacher Code" name="teacher_id" v-model="information.teacher_id"  class="form-control">
                            <input type="text" placeholder="Enter Subject Code" name="subject_id" v-model="information.subject_id"  class="form-control" >
                            <input type="text" placeholder="Enter Semester" name="semester" v-model="information.semester"  class="form-control">
                            <input type="text" placeholder="Year" name="year" v-model="information.year"  class="form-control">
                            <button type="submit" class="btn btn-primary" >Search</button>
                            </div>
                        </form>
                    </div>
                </div>

    </div>

            <div class="col-md-6" style = "margin: 0 auto ">
                <div class="card"  >
                <div class="card-body" style="width: 20 rem;">
                    <table class="table table-bordered" >
                            <thead>
                                <th width="5%">STT</th>
                                <th>Teacher_id</th>
                                <th>Subject_id</th>
                                <th>Semester</th>
                                <th>Year</th>
                                <th>Note</th>
                                <th>Status</th>
                            </thead>
                            <tbody>

                                <tr v-for="teacher_to_subjects in listTeacherToSubjects" :key="teacher_to_subjects.id">
                                    <th scope="row">{{ teacher_to_subjects.id }}</th>
                                    <td>{{ teacher_to_subjects.teacher_id }}</td>
                                    <td>{{ teacher_to_subjects.subject_id }}</td>
                                    <td>{{ teacher_to_subjects.semester }}</td>
                                    <td>{{ teacher_to_subjects.year }}</td>
                                    <td>{{ teacher_to_subjects.note }}</td>
                                    <td>
                                        <button class="btn btn-success"
                                            @click.prevent="SelectRow(teacher_to_subjects.id, teacher_to_subjects.teacher_id, teacher_to_subjects.subject_id)">
                                            Select
                                        </button>
                                    </td>
                                </tr>

                            </tbody>
                    </table>
                </div>

                </div>
            </div>
        <div class="col-md-6" style = "margin: 0 auto ">
            <form   enctype='multipart/form-data' id="quickForm"  @submit.prevent="UploadFile()">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">STT</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" v-model="report.teacher_to_subject_id">
                            <label for="exampleFormControlInput1">Teacher_id</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" v-model="report.teacher_id">
                            <label for="exampleFormControlInput1">Subject_id</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"  v-model="report.subject_id">
                            <label for="exampleFormControlInput1">Title</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" v-model="report.title">
                            <label for="exampleFormControlTextarea1">Note</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="report.note" type="text"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Attached files</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file" @change="processFile($event)">
                            <button type="submit" class="btn btn-primary" name="import">Import</button>

                        </div>
                    </div>
                </div>
            </form>
         </div>


</div>

</template>

<script>
import axios from 'axios'
export default {
    props: {
            base_url: String
        },
        data() {
            return {
                information: {
                teacher_id: "",
                subject_id: "",
                semester: "",
                year: "",
                },
                listTeacherToSubjects: [],
                error: null,
                report:{
                    teacher_to_subject_id:"",
                    teacher_id:"",
                    subject_id: "",
                    title:"",
                    note:"",
                    file:"",
                    },
                output:"",
                success:"",
                message:"",




            }
        },
        created() {

       },
     methods: {
            async Search() {
                console.log(this.informtion);
                try {
                    const url = this.base_url + "/dashboard/students/search-subject";
                    const response = await axios.post(url, this.information,{
                        'teacher_id': this.teacher_id,
                        'subject_id': this.subject_id,
                        'semester': this.semester,
                        'year': this.year,
                    });
                    this.listTeacherToSubjects = response.data;

                    console.log(response.data);
                }
                 catch (error) {
                    console.log(error);
                }
            },
            processFile(event) {
                console.log(event.target.files[0]);
                this.report.file = event.target.files[0];
            },
            async UploadFile() {
                console.log(this.report);
                try {
                    const url = this.base_url + "/dashboard/students/upload-file";
                    const response = await axios.post(url, this.report,{
                        headers: {
                        "Content-Type": "multipart/form-data",
                        },
                        'teacher_to_subject_id': this.teacher_to_subject_id,
                        'teacher_id': this.teacher_id,
                        'subject_id': this.subject_id,
                        'title':this.title,
                        'note':this.note,
                        'file':this.file,

                    });
                    console.log(response.data);
                }
                 catch (error) {
                    console.log(error);
                }

            },
            async SelectRow(id, teacher_id, subject_id){
                console.log(id, teacher_id, subject_id);
                this.report.teacher_to_subject_id = id;
                this.report.teacher_id = teacher_id;
                this.report.subject_id = subject_id;
                console.log(this.report);
            }
        },


}
</script>

<style>

</style>
