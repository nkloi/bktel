<template>
<div>
    <div class="col-md-6" style = "margin: 0 auto ">

            <div class="card" >
                    <div class="card-header" style="width: 25 rem;">
                        <label>Upload File Mark</label>
                        <form   enctype='multipart/form-data' id="quickForm" @submit.prevent="Search()">
                            <div class="form-group">
                            <input type="text" placeholder="Enter Subject Code"  v-model="information.subject_code"  class="form-control" name="code">
                            <input type="text" placeholder="Year"  v-model="information.year"  class="form-control" name="year">
                            <input type="text" placeholder="Enter Semester"  v-model="information.semester"  class="form-control" name="semester">
                            <button type="submit" class="btn btn-primary" >Search</button>
                            </div>
                        </form>
                    </div>
            </div>
    </div>  


                                
        <div class="col-md-10" style = "margin-left:17% ">
            <div class="card"  >
                <div class="card-body" style="width: 20 rem;">
                    <table class="table table-bordered" >
                            <thead>
                                <th width="5%">STT</th>
                                <th width="5%">Student_id</th>    
                                <th>Student Name</th>                              
                                <th>Subject_id</th>
                                <th>Subject_name</th>
                                <th>Teacher_id</th>
                                <th>Teacher Name</th>
                                <th>Title</th>
                                <th>Note</th>
                                <th>Mark</th>
                                <th >Download</th>
                            </thead>
                            <tbody>

                                <tr v-for="reports in listReports" :key="reports.id">
                                    <th scope="row">{{ reports.report_id }}</th>
                                    <td>{{ reports.student_code }}</td>
                                    <td>{{ reports.student_fname+' '+reports.student_lname }}</td>
                                    <td>{{ reports.code }}</td>
                                    <td>{{ reports.name }}</td>
                                    <td>{{ reports.teacher_code }}</td>
                                    <td>{{ reports.teacher_fname+' '+reports.teacher_lname }}</td>
                                    <td>{{ reports.title }}</td>
                                    <td>{{ reports.report_note }}</td>
                                    <td>{{ reports.mark }}</td>
                                    <td>
                                      <button class="btn-download" 
                                            @click.prevent="downloadFile(reports.report_id, )" >
                                            <i class="fa fa-download">Download</i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                    </table>
                    <div style = "margin-left: 90% ; margin-top:10px " >
                        <button class="btn btn-success"
                                            @click.prevent="ExportMark(listReports)">
                                            Export Mark
                        </button>
                    </div>
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
        data(){
            return{
                information: {
                    subject_code: "",
                    teacher_code: "",
                    student_code: "",
                    semester: "",
                    year: "",
                },
                listReports: [],
                error: null,
                output: "",
                success: "",
                message: "",
                download:{report_id:"",},
                export:{report_id:"",},
            }
        },
        methods: {
            async Search(){
                try{
                    const url=this.domain + "/dashboard/teachers/search-all-report";
                    const response = await axios.post(url, this.information,{
                        'code': this.subject_code,
                        'semester': this.semester,
                        'year': this.year,
                        'student_fname':this.student_fname,
                        'student_lname':this.student_lname,
                        'teacher_fname':this.teacher_fname,
                        'teacher_lname':this.teacher_lname,
                        'student_code': this.student_code,
                        'teacher_code': this.teacher_code
                    });
                    this.listReports=response.data;
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
            },

             ExportMark(listReports){
                const object = this.listReports;
                    const header_row=
                        {
                      'year': '',
                      'semester': '',
                      'teacher_code': '',
                      'teacher_fname': '',
                      'teacher_lname': '',
                      'code': '',
                      'name': '',
                      'student_code': '',
                      'student_fname': '',
                      'student_lname': '',
                      'SubmitOrNot':'',
                      'mark': ''
                        }
                    const header = Object.keys(header_row);
                    const replacer = function(key,value) {return value === null ? '' : value}
                    const csv = [
                        header.join(',')  ,  //header row first
                        ...object.map(row => header.map(fieldName => JSON.stringify(row[fieldName], replacer) ).join(','))                     
                    ].join('\r\n')
                    var fileURL = window.URL.createObjectURL(new Blob([csv]));
                    var fileLink = document.createElement('a');
                    fileLink.href = fileURL;
                    fileLink.setAttribute('download', 'test.csv');
                    document.body.appendChild(fileLink);  
                    fileLink.click();
            }
        },
        mounted() {
            console.log('Component mounted.')

        },
    }
</script>