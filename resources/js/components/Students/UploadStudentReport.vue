<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>


                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Search Subject</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                                <form @submit.prevent="SearchSubject()">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Teacher Code</label>
                                            <input required type="text" class="form-control" placeholder="Enter Teacher Code" name="teacher_code" v-model="information.teacher_code">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Subject Code</label>
                                            <input required type="text" class="form-control" placeholder="Enter Subject Code" name="code" v-model="information.subject_code">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Semester</label>
                                            <input required type="text" class="form-control" placeholder="Enter Semester" name="semester" v-model="information.semester">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Year</label>
                                            <input required type="text" class="form-control" placeholder="Enter Year" name="year" v-model="information.year">
                                        </div>
                                        

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" @click="search(information.teacher_code, information.subject_code, information.semester, information.year)" class="btn btn-primary">Search</button>
                                    </div>

                                </form>
                        </div>
                        <!-- <pre>{{outcome}}</pre> -->

                    
                        <div class="card">
                            <div class="card-body" style="width: 20 rem;">
                                <div class="card-header">
                                    <h3 class="card-title">Result List</h3>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <th width="5%">STT</th>
                                        <th>Name's Teacher</th>
                                        <th>Subject Code</th>
                                        <th>Semester</th>
                                        <th>Year</th>
                                        <th>Note</th>
                                        <th>Status</th>
                                    </thead>

                                    <tbody>
                                        <tr v-for="teacher_to_subjects in listTeacherToSubjects" :key="teacher_to_subjects.id">
                                            <th scope="row">{{ teacher_to_subjects.id }}</th>
                                            <td>{{ teacher_to_subjects.teacher_fname+' '+teacher_to_subjects.teacher_lname }}</td>
                                            <td>{{ teacher_to_subjects.code }}</td>
                                            <td>{{ teacher_to_subjects.semester }}</td>
                                            <td>{{ teacher_to_subjects.year }}</td>
                                            <td>{{ teacher_to_subjects.note }}</td>
                                            <td>
                                                <button class="btn btn-success"
                                                    @click.prevent="SelectRow(teacher_to_subjects.id, teacher_to_subjects.teacher_fname+' '+teacher_to_subjects.teacher_lname, teacher_to_subjects.code)">Select</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                
                      
                            
                                <form   enctype='multipart/form-data' id="quickForm"  @submit.prevent="uploadFile()" >
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">STT</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" v-model="report.teacher_to_subject_id">
                                                <label for="exampleFormControlInput1">Teacher's Name</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" v-model="report.teacher_name">
                                                <label for="exampleFormControlInput1">Subject Code</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1"  v-model="report.subject_code">
                                                <label for="exampleFormControlInput1">Title</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" v-model="report.title">
                                                <label for="exampleFormControlTextarea1">Note</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="report.note" type="text" ></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Attached files</label>
                                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file" @change="processFile($event)">
                                            </div>
                                            <div> <button type="submit" class="btn btn-primary">Import</button> </div>
                                        </div>
                                    </div>
                                </form>
                        
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
        data() {
            return {
                information: {
                    teacher_code: "",
                    subject_code: "",
                    semester: "",
                    year: "",
                },
                listTeacherToSubjects: [],
                error: null,
                report:{
                    teacher_to_subject_id:"",
                    teacher_name:"",
                    subject_code: "",
                    title:"",
                    note:"",
                    },
                output:"",
                success:"",
                message:"",
                file:"",
            }
        },
        methods: {
            async SearchSubject(){
                console.log(this.information);
                try{
                    const url=this.domain + "/dashboard/students/search-subject";
                    const response = await axios.post(url, this.information,{
                        'teacher_code': this.teacher_code,
                        'code': this.subject_code,
                        'semester': this.semester,
                        'year': this.year,
                        'teacher_fname':this.teacher_fname,
                        'teacher_lname':this.teacher_lname
                    });
                    this.listTeacherToSubjects=response.data;
                    console.log(response.data)
                }
                catch(error){
                    console.log(error)
                }
            },
            processFile(event){
                console.log(event.target.files[0]);
                this.report.file = event.target.files[0];
            },
            async uploadFile(){
                console.log(this.report);
                try{
                    const url=this.domain + "/dashboard/students/upload-file";
                    const response = await axios.post(url, this.report,{
                        headers: {
                        "Content-Type": "multipart/form-data",
                        },
                        'teacher_to_subject_id': this.teacher_to_subject_id,
                        'teacher_code': this.teacher_code,
                        'code': this.subject_code,
                        'title': this.title,
                        'note': this.note,
                        'file':this.file
                    });
                    console.log(response.data)
                }
                catch(error){
                    console.log(error)
                }
            },
            async SelectRow(id, teacher_name, code){
                this.report.teacher_to_subject_id = id;
                this.report.teacher_name = teacher_name;
                this.report.subject_code = code;
               
            },
            search(teacherCode, subjectCode, semester, year) {
                axios.get(this.domain + "/dashboard/students/report/search", {
                    params: {
                        information
                    }
                })
                .then(response => console.log(response))
                .catch(error => console.log(error))
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
    }
</script>