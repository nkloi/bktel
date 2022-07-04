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
                    <label for="code">Lecturer's Code</label>
                    <input type="text" class="form-control" id="code" v-model="form.code" placeholder="Code">
                  </div>
                   <div class="form-group">
                    <label for="subject_code">Subject's Code</label>
                    <input type="text" class="form-control" id="subject_code" v-model="form.subject_code" placeholder="Subject Code">
                  </div>
                  <div class="form-group">
                    <label for="semester">Semester</label>
                    <select v-model="form.semester" class="form-select" aria-label="Default select example">
                      <option value="1">HK1</option>
                      <option value="2">HK2</option>
                      <option value="3">HK3</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="year">Year</label>
                    <select v-model="form.year" required class="form-select" aria-label="Default select example">
                      <option :value="year.pre" id="pre">{{year.pre}}</option>
                      <option :value="year.curr" id="cur">{{year.curr}}</option>
                      <option :value="year.fut" id="fut">{{year.fut}}</option>
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
                    </tr>
                 </thead>
                  <tbody>
                  <tr v-for="result in results">
                  <th scope="row">{{result.teacher_id}}</th>
                  <td>{{result.subject_id}}</td>
                  <td>{{result.semester}}</td>
                  <td>{{result.year}}</td>
                  </tr>
                  </tbody>
               </table>
               <!--table-->
              </div>
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
             year:{
              pre:'',
              curr:'',
              fut:''
            },
            results:[],
            error:''
        }
    },
        methods: {
           processLoad(){
            const date = new Date();
           let year = date.getFullYear()
            this.year.pre=year-1
            this.year.curr=year
            this.year.fut=year+1
          },
       submit() {
      this.errors = {};
      axios.post('/home/search',  this.form).then(response => {   
        if(Array.isArray(response.data)){
         this.results=response.data
         this.error=''
        }
        else{this.error=response.data
        this.results=''}
       //window.location.href = '/home/search'
      });
    }
  },
    }
</script>

