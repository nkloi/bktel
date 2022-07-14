<template>
<!-- general form elements -->
            <div class="card card-primary" v-if="role==='student'">
              <div class="card-header">
                <h3 class="card-title">Search</h3>
              </div>
               <div v-if="error" class="card-body">
              <strong style="color: red;"> {{error}}</strong>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form @submit.prevent="submit">
                <div class="card-body">
                  <!-- <div class="form-group">
                    <label for="name">Lecturer's Name</label>
                    <input type="text" class="form-control" id="name" v-model="form.name" placeholder="Name">
                  </div> -->
                   <div class="form-group">
                    <label for="year">Year</label>
                    <select v-model="form.year" id="year" required class="form-select" aria-label="Default select example">
                      <option :value="year.pre" id="pre">{{year.pre}}</option>
                      <option :value="year.curr" id="cur">{{year.curr}}</option>
                      <option :value="year.fut" id="fut">{{year.fut}}</option>
                    </select>
                  </div>
                   <div class="form-group">
                    <label for="code">Lecturer's Code</label>
                   <!-- <input type="text"  class="form-control" id="code" v-model="form.code" placeholder="Code"> -->
                    <select v-model="form.code" id="code" class="form-select" aria-label="Default select example">
                      <option :value="teacher.teacher_code" v-for="teacher in teachers">{{teacher.teacher_code+' - '+teacher.first_name+' '+teacher.last_name}}</option>
                    </select>
                  </div>
                   <div class="form-group">
                    <label for="subject_code">Subject's Code</label>
                    <select v-model="form.subject_code" id="subject_code" class="form-select" aria-label="Default select example">
                    <option :value="subject.code" v-for="subject in subjects">{{subject.code+' - '+subject.name}}</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="semester">Semester</label>
                    <select v-model="form.semester" id="semester" class="form-select" aria-label="Default select example">
                      <option value="1">HK1</option>
                      <option value="2">HK2</option>
                      <option value="3">HK3</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Search</button>
                </div>
              </form>
              <div class="card-header">
                <h3 class="card-title">Search Results</h3>
              </div>
              <div id="results">
                <!--table-->
                <table class="table">
                  <thead>
                    <tr>
                    <th scope="arrow">Select</th>
                    <th scope="col">Lecturer</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Year</th>
                    </tr>
                 </thead>
                  <tbody>
                  <tr v-for="result in results">
                  <td><button @click="getData($event, result.id)" style="cursor:pointer"><i class="fas fa-arrow-circle-right"></i></button></td>
                  <th scope="row">{{result.teacher_name}}</th>
                  <td>{{result.subject_name}}</td>
                  <td>{{result.semester}}</td>
                  <td>{{result.year}}</td>
                  </tr>
                  </tbody>
               </table>
               <!--table-->
              </div>
              <!--upload-->
              <div class="card-header">
                <h3 class="card-title">Upload Report</h3>
              </div>
               <form @submit.prevent="upload">
                <div class="card-body">
                   <div class="form-group">
                    <label for="info"> <span style="color:red;">*</span>Information</label>
                    <input type="text" readonly required class="form-control" id="info" placeholder="Search -> Select">
                   <div v-if="noti_empty" class="card-body">
                      <strong style="color: red;"> {{noti_empty}}</strong>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="title"> <span style="color:red;">*</span>Enter Title</label>
                    <input type="text" required class="form-control" id="title" v-model="file_upload.title" placeholder="Title">
                  </div>
                   <div class="form-group">
                    <label for="note">Note</label>
                    <input type="text" class="form-control" id="note" v-model="file_upload.note" placeholder="Note">
                  </div>
                  <div class="form-group">
                    <label for="file"> <span style="color:red;">*</span>File</label>
                    <input type="file" required class="form-control" ref="file" id="file" @change="uploadFile" placeholder="File">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Upload</button>
                  <svg v-if="success" class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"> <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/> <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
             </svg>
                </div>
              </form>
            </div>

            <!--for teacher-->
            <div class="card card-primary" v-else-if="role==='teacher'">
              <div class="card-header">
                <h3 class="card-title">Search</h3>
              </div>
               <div v-if="error" class="card-body">
              <strong style="color: red;"> {{error}}</strong>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form @submit.prevent="search_report">
                <div class="card-body">
                   <div class="form-group">
                    <label for="year">Year</label>
                    <select v-model="teacher_search_form.year" id="year" required class="form-select" aria-label="Default select example">
                      <option :value="year.pre" id="pre">{{year.pre}}</option>
                      <option :value="year.curr" id="cur">{{year.curr}}</option>
                      <option :value="year.fut" id="fut">{{year.fut}}</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="semester">Semester</label>
                    <select v-model="teacher_search_form.semester" required id="semester" class="form-select" aria-label="Default select example">
                      <option value="1">HK1</option>
                      <option value="2">HK2</option>
                      <option value="3">HK3</option>
                    </select>
                  </div>
                   <div class="form-group">
                    <label for="subject_id">Subject's Code</label>
                    <select v-model="teacher_search_form.subject_id" id="subject_id" class="form-select" aria-label="Default select example">
                    <option :value="subject.id" v-for="subject in subjects">{{subject.code+' - '+subject.name}}</option>
                    </select>
                  </div>
                   <div class="form-group">
                    <label for="student_code">Student's Code</label>
                    <input type="text" class="form-control" id="name" v-model="teacher_search_form.student_code" placeholder="Code">
                  </div>
                   <div class="form-group">
                    <label for="student_name">Student's Name</label>
                    <input type="text" class="form-control" id="name" v-model="teacher_search_form.student_name" placeholder="Name">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Search</button>
                </div>
              </form>
              <div class="card-header">
                <h3 class="card-title">Search Results</h3>
              </div>
               <div id="results">
                <!--table-->
                <table class="table">
                  <thead>
                    <tr>
                    <th scope="arrow">Select</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Student Code</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Title</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Year</th>
                    <th scope="col">Mark</th>
                    <th scope="col">Note</th>
                    <th scope="col">Open</th>
                    </tr>
                 </thead>
                  <tbody>
                  <tr v-for="result in results">
                  <td><button @click="selectToSet($event, result.report_id)" style="cursor:pointer"><i class="fas fa-arrow-circle-right"></i></button></td>
                  <th scope="row">{{result.first_name+' '+result.last_name}}</th>
                  <td>{{result.student_code}}</td>
                  <th scope="row">{{result.name}}</th>
                  <td>{{result.title}}</td>
                  <td>{{result.semester}}</td>
                  <td>{{result.year}}</td>
                  <th style="color:red">{{result.mark}}</th>
                  <td>{{result.note}}</td>
                  <td><button @click="open_file($event, result.report_id)" style="cursor:pointer"><i class="fas fa-book-open"></i></button></td>
                  </tr>
                  </tbody>
               </table>
               <!--table-->
              </div>
               <div class="card-header">
                <h3 class="card-title">Set Mark</h3>
              </div>
               <form @submit.prevent="set_mark">
                <div class="card-body">
                   <div class="form-group">
                    <label for="info"> <span style="color:red;">*</span>Information</label>
                    <input type="text" readonly required class="form-control" id="info" placeholder="Search -> Select">
                   <div v-if="noti_empty" class="card-body">
                      <strong style="color: red;"> {{noti_empty}}</strong>
                   </div>
                   </div>
                   <div clas="form-group">
                    <label for="mark"> <span style="color:red;">*</span>Mark</label>
                    <input type="text" v-model="setmark.mark" required class="form-control" id="mark" placeholder="ex: 10">
                   </div>
                </div>
                 <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <svg v-if="success" class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"> <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/> <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
             </svg>
                </div>
               </form>
            </div>
</template>
<script>
    export default {
       mounted(){
    window.addEventListener("load", () => this.processLoad());
},
      data(){
        return{
            form: {
                name: '',
                code: '',
                subject_code: '',
                semester: '',
                year: '',
            },
            teacher_search_form:{
              year:'',
              semester:'',
              subject_id:'',
              student_code:'',
              student_name:''
            },
            file_upload:{
              id:'',
              title:'',
              file:'',
              teacher_id:'',
              subject_id:'',
              subject_name:'',
              teacher_name:'',
              year:'',
              semester:'',
              note:''
            },
            setmark:{
             report_id:'',
             mark:''
            },
             year:{
              pre:'',
              curr:'',
              fut:''
            },
            results:[],
            error:'',
            teachers:[],
            subjects:[],
            noti_empty:'',
            success:'',
            role:'',
        }      
    },
        methods: {
           processLoad(){
             axios.get('/home/get_role').then(response => {   
             this.role=response.data
      });
            const date = new Date();
           let year = date.getFullYear()
            this.year.pre=year-1
            this.year.curr=year
            this.year.fut=year+1
             axios.get('/home/get_teacher_code').then(response => {   
             this.teachers=response.data
      });
       axios.get('/home/get_subject_code').then(response => {   
             this.subjects=response.data
      });
          },
       submit() {
        this.success=false
      this.errors = {};
      axios.post('/home/search',  this.form).then(response => {   
        if(Array.isArray(response.data)){
         this.results=response.data
         this.error=''
         this.form.code=''
         this.form.subject_code=''
         this.form.semester=''
        }
        else{this.error=response.data
        this.results=''
         this.form.code=''
         this.form.subject_code=''
         this.form.semester=''
        }
       //window.location.href = '/home/search'
      });
    },
     search_report() {
      this.success=false
      this.errors = {};
      axios.post('/home/search_report',  this.teacher_search_form).then(response => {   
         if(response.data!=''){
         this.results=response.data
         this.error=''
         this.teacher_search_form.subject_id=''
         this.teacher_search_form.student_code=''
         this.teacher_search_form.student_name=''
         }else{
         this.error='Not found!'
          this.results=response.data
         this.teacher_search_form.subject_id=''
         this.teacher_search_form.student_code=''
         this.teacher_search_form.student_name=''
         }
      });
    },
    set_mark(){
      var info=document.getElementById('info')
        if(info.value==''){this.noti_empty='Information must be filled!'}
        else{  
           axios.post('/home/set_mark', this.setmark).then((response) => {
            if(response.data!='success'){
          this.noti_empty='Fail!'
          }else{this.success=true
            this.setmark.mark=''
          }
         
        });
        }
    },
    uploadFile(e) {
        this.file_upload.file = e.target.files[0];
      },
        upload() {
        var info=document.getElementById('info')
        if(info.value==''){this.noti_empty='Information must be filled!'}
        else{  
        const formData = new FormData();
        formData.append('id', this.file_upload.id);
        formData.append('file', this.file_upload.file);
        formData.append('title', this.file_upload.title);
        formData.append('teacher_id', this.file_upload.teacher_id);
        formData.append('subject_id', this.file_upload.subject_id);
        formData.append('teacher_name', this.file_upload.teacher_name);
        formData.append('subject_name', this.file_upload.subject_name);
        formData.append('semester', this.file_upload.semester);
        formData.append('year', this.file_upload.year);
        formData.append('note', this.file_upload.note);
        const headers = { 'Content-Type': 'multipart/form-data' };
        axios.post('/home/upload_report', formData, { headers }).then((response) => {
          if(response.data!='success'){
          this.noti_empty='You are not student!'
          }else{this.success=true
          this.file_upload.title=''
          this.file_upload.note=''
          }
        });
        }
      },
    getData(event, id){
      this.success=false
      for(let i=0;i<this.results.length;i++){
      if(this.results[i].id==id){
      this.file_upload.id=id
      this.file_upload.teacher_id=this.results[i].teacher_id
      this.file_upload.subject_id=this.results[i].subject_id
      this.file_upload.teacher_name=this.results[i].teacher_name
      this.file_upload.subject_name=this.results[i].subject_name
      this.file_upload.semester=this.results[i].semester
      this.file_upload.year=this.results[i].year
      var info=document.getElementById('info')
         info.value=this.results[i].teacher_name+' - '+this.results[i].subject_name+' - HK'+this.results[i].semester+' - '+this.results[i].year
      }
      }
     
    },
    selectToSet(event, report_id){
      this.success=false
      this.noti_empty=''
       for(let i=0;i<this.results.length;i++){
      if(this.results[i].report_id==report_id){
     this.setmark.report_id=this.results[i].report_id
      var info=document.getElementById('info')
         info.value=this.results[i].first_name+' '+this.results[i].last_name+' - '+this.results[i].student_code +' - '+this.results[i].title
      }
      }
    },
    open_file(event,report_id){
      axios.get('/home/open_file',{params:{report_id:report_id}}).then((response) => {
      window.open( "/home/open_file?report_id="+report_id, "_blank");
    });
    }
  },
    }
</script>

