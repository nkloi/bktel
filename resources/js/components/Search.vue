<template>
<!-- general form elements -->
            <div class="card card-primary">
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
              <div id="results">
                <!--table-->
                <table class="table">
                  <thead>
                    <tr>
                    <th scope="col">Lecturer</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Year</th>
                    <th scope="arrow"></th>
                    </tr>
                 </thead>
                  <tbody>
                  <tr v-for="result in results">
                  <th scope="row">{{result.teacher_name}}</th>
                  <td>{{result.subject_name}}</td>
                  <td>{{result.semester}}</td>
                  <td>{{result.year}}</td>
                  <td><button @click="getData($event, result.id)" style="cursor:pointer"><i class="fas fa-arrow-circle-right"></i></button></td>
                  </tr>
                  </tbody>
               </table>
               <!--table-->
              </div>
              <!--upload-->
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
            <!-- /.card -->
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
            success:''
        }      
    },
        methods: {
           processLoad(){
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
          }else{this.success=true}
        });
        }
      },
    getData(event, id){
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
     
    }
  },
    }
</script>

