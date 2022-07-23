<template>
<!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Please Fill & Click Submit</h3>
              </div>
              <div v-if="notification.error" class="card-body">
              <strong style="color: red;"> {{notification.error}}</strong>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form @submit.prevent="submit">
                <div class="card-body">
                  <div class="form-group">
                    <label for="lecturer_code">Lecturer's Code</label>
                    <input type="text" required class="form-control" id="lecturer_code" v-model="form.lecturer_code" placeholder="Code">
                  </div>
                   <div class="form-group">
                    <label for="subject_code">Subject's Code</label>
                    <input type="text" required class="form-control" id="subject_code" v-model="form.subject_code" placeholder="Subject Code">
                  </div>
                   <div class="form-group">
                    <label for="semester">Semester</label>
                    <select v-model="form.semester" class="form-select" aria-label="Default select example">
                      <option value="1" selected>HK1</option>
                      <option value="2">HK2</option>
                      <option value="3">HK3</option>
                    </select>
                  </div>
                   <div class="form-group">
                    <label for="year">Year</label>
                    <select v-model="form.year" class="form-select" aria-label="Default select example">
                      <option :value="year.pre" selected id="pre">{{year.pre}}</option>
                      <option :value="year.curr" id="cur">{{year.curr}}</option>
                      <option :value="year.fut" id="fut">{{year.fut}}</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="note">Note</label>
                    <input type="text"  class="form-control" id="note" v-model="form.note" placeholder="Note">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
                lecturer_code: '',
                subject_code: '',
                semester: '',
                year: '',
                note: '',
            },
            notification: {
                error:'',
            },
            year:{
              pre:'',
              curr:'',
              fut:''
            }
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
      axios.post('/teacher_subject/stored',  this.form).then(response => {      
         if(response.data){
          this.notification.error=response.data
          }
         else{
         window.location.href = '/home/teacher_subject'
         }
      });
    }
  },
    }
</script>

