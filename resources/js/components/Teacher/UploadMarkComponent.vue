<template>
<div>

    <div class="col-md-6" style = "margin: 0 auto ">

            <div class="card" >
                    <div class="card-header" style="width: 25 rem;">
                        <label>Upload File Mark</label>
                        <form   enctype='multipart/form-data' id="quickForm" @submit.prevent="Search()">
                            <div class="form-group">
                            <input type="text" placeholder="Enter Subject ID"  v-model="information.subject_id"  class="form-control" name="subject_id">
                            <input type="text" placeholder="Year"  v-model="information.year"  class="form-control" name="year">
                            <input type="text" placeholder="Enter Semester"  v-model="information.semester"  class="form-control" name="semester">
                            <input type="text" placeholder="Enter Student ID"  v-model="information.student_id"  class="form-control" name="student_id">
                            <button type="submit" class="btn btn-primary" >Search</button>
                            </div>
                        </form>
                    </div>
            </div>
    </div>

            <div class="col-md-8" style = "margin: 0 auto ">
                <div class="card"  >
                <div class="card-body" style="width: 20 rem;">
                    <table class="table table-bordered" >
                            <thead>
                                <th width="5%">STT</th>
                                <th>Student_id</th>
                                <th>TTS_id</th>
                                <th>Subject_id</th>
                                <th>Teacher_id</th>
                                <th>Title</th>
                                <th>Note</th>
                                <th>Mark</th>
                                <th >Download</th>
                            </thead>
                            <tbody>

                                <tr v-for="reports in listReports" :key="reports.id">
                                    <th scope="row">{{ reports.id }}</th>
                                    <td>{{ reports.student_id }}</td>
                                    <td>{{ reports.teacher_to_subject_id }}</td>
                                    <td>{{ reports.subject_id }}</td>
                                    <td>{{ reports.teacher_id }}</td>
                                    <td>{{ reports.title }}</td>
                                    <td>{{ reports.report_note }}</td>
                                    <td>{{ reports.mark }}</td>
                                    <td>
                                        <button class="btn-download"
                                            @click.prevent="downloadFile(reports.id)">
                                            <i class="fa fa-download">Download</i>
                                        </button>
                                    </td>
                                </tr>

                            </tbody>
                    </table>
                </div>

                </div>
            </div>
        <div class="col-md-6" style = "margin: 0 auto ">
            <form   enctype='multipart/form-data' id="quickForm"  @submit.prevent="setMark()">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">STT</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"  v-model="setmark.report_id">
                            <label for="exampleFormControlInput1">Mark</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"  v-model="setmark.mark">
                            <button type="submit" class="btn btn-primary" name="import">Set Mark</button>
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
                subject_id: "",
                semester: "",
                year: "",
                student_id:"",
                },
                listReports: [],
                error: null,
                setmark:{
                    report_id:"",
                    mark:"",
                    },
                output:"",
                success:"",
                message:"",
            }
        },

     methods: {
            async Search() {
                console.log(this.informtion);
                try {
                    const url = this.base_url + "/dashboard/teachers/search-report";
                    const response = await axios.post(url, this.information,{
                        'subject_id': this.subject_id,
                        'semester': this.semester,
                        'year': this.year,
                        'student_id':this.student_id,
                    });
                    this.listReports = response.data;
                    console.log(response.data);
                }
                 catch (error) {
                    console.log(error);
                }
            },
                async setMark() {
                console.log(this.setmark);
                try {
                    const url = this.base_url + "/dashboard/teacher/set-mark-report";
                    const response = await axios.post(url, this.setmark,{
                        report_id:"",
                        mark:"",
                    });
                    console.log(response.data);
                }
                 catch (error) {
                    console.log(error);
                }

            },
            async downloadFile(id){
                this.setmark.report_id = id;
                console.log(this.setmark);
            }
        },


}
</script>

<style>

</style>
