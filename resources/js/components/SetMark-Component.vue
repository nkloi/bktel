<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Upload File Mark</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                                <form @submit.prevent="SearchReport()">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Subject ID</label>
                                            <input required type="text" class="form-control" placeholder="Subject ID" name="code" v-model="information.subject_code">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Year</label>
                                            <input required type="text" class="form-control" placeholder="Year" name="year" v-model="information.year">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Semester</label>
                                            <input required type="text" class="form-control" placeholder="Semester" name="semester" v-model="information.semester">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Student ID</label>
                                            <input required type="text" class="form-control" placeholder="Student ID" name="student_code" v-model="information.student_code">
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>

                                </form>
                        </div>

                        <div class="card">
                            <div class="card-body" style="width: 20 rem;">
                                <div class="card-header">
                                    <h3 class="card-title">Result List</h3>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <th width="5%">STT</th>
                                        <th>Student Name</th>
                                        <th>Subject ID</th>
                                        <th>Teacher Name</th>
                                        <th>Semester</th>
                                        <th>Year</th>
                                        <th>Title</th>
                                        <th>Note</th>
                                        <th>Mark</th>
                                        <th>Download</th>
                                    </thead>

                                    <tbody>
                                        <tr v-for="reports in listReports" :key="reports.id">
                                            <th scope="row">{{ reports.report_id }}</th>
                                            <td>{{ reports.student_fname+' '+reports.student_lname }}</td>
                                            <td>{{ reports.code }}</td>
                                            <td>{{ reports.teacher_fname+' '+reports.teacher_lname }}</td>
                                            <td>{{ reports.semester }}</td>
                                            <td>{{ reports.year }}</td>
                                            <td>{{ reports.title }}</td>
                                            <td>{{ reports.report_note }}</td>
                                            <td>{{ reports.mark }}</td>
                                            <td>
                                                <button class="btn-download" @click.prevent="downloadFile(reports.report_id)">
                                                    <i class="fa fa-download">Download</i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                           <form enctype='multipart/form-data' id="quickForm"  @submit.prevent="setMark()" >
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">STT</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" v-model="setmark.report_id">
                                                <label for="exampleFormControlInput1">Mark</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" v-model="setmark.mark">
                                            
                                                <button type="submit" class="btn btn-primary" name="import">Set Mark</button>
                                            </div>
                                        </div>
                                    </div>
                           </form>

                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    import axios from 'axios'
    export default {
        props: {
            domain: String
        },
        data() {
            return {
                information: {
                    subject_code: "",
                    semester: "",
                    year: "",
                    student_code: "",
                },
                listReports: [],
                error: null,
                setmark: {
                    report_id: "",
                    mark: "",
                },
                output: "",
                success: "",
                message: "",
                download:{report_id:"",},
            }
        },
          methods: {
            async SearchReport(){
                console.log(this.information);
                try{
                    const url=this.domain + "/dashboard/teachers/search-report";
                    const response = await axios.post(url, this.information,{
                        'student_code': this.teacher_code,
                        'code': this.subject_code,
                        'semester': this.semester,
                        'year': this.year,
                        'student_fname':this.student_fname,
                        'student_lname':this.student_lname,
                        'teacher_fname':this.teacher_fname,
                        'teacher_lname':this.teacher_lname
                    });
                    this.listReports=response.data;
                    console.log(response.data)
                }
                catch(error){
                    console.log(error)
                }
            },
            async setMark(){
                console.log(this.setmark);
                try{
                    const url=this.domain + "/dashboard/teachers/set-mark-report";
                    const response = await axios.post(url, this.setmark,{
                        'report_id': this.report_id,
                        'mark': this.mark,
                    });
                    console.log(response.data)
                }
                catch(error){
                    console.log(error)
                }
            },
            async downloadFile(report_id){
                 this.setmark.report_id = report_id;
                 this.download.report_id = report_id;
                axios.get('/dashboard/teachers/download-file-report',{params:{report_id:report_id}})
                .then(
                    (response) => {window.open( "/dashboard/teachers/download-file-report?report_id="+report_id, "_blank");
                  });
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
    }
</script>