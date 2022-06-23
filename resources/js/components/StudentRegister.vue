<template>
   <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Please Fill & Click Submit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form @submit.prevent="submit">
                <div class="card-body">
                  <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input type="text" required class="form-control" id="first-name" v-model="form.first_name" placeholder="First Name">
                  </div>
                  <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" required class="form-control" id="last-name" v-model="form.last_name" placeholder="Last Name">
                  </div>
                   <div class="form-group">
                    <label for="student-code">Student Code</label>
                    <input type="text" required class="form-control" id="student-code" v-model="form.student_code" placeholder="Student Code">
                  </div>
                    <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" required class="form-control" id="department" v-model="form.department" placeholder="Department">
                  </div>
                  <div class="form-group">
                    <label for="faculty">Faculty</label>
                    <input type="text" required class="form-control" id="faculty" v-model="form.faculty" placeholder="Faculty">
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" required class="form-control" id="address" v-model="form.address" placeholder="Address">
                  </div>
                   <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" required class="form-control" id="phone" v-model="form.phone" placeholder="Phone">
                  </div>
                   <div class="form-group">
                    <label for="note">Note</label>
                    <input type="text" class="form-control" id="note" v-model="form.note" placeholder="Note">
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
      data(){
        return{
            form: {
                first_name: '',
                last_name: '',
                student_code: '',
                department: '',
                faculty: '',
                address: '',
                phone: '',
                note: ''
            }
        }
    },
        methods: {
       submit() {
      this.errors = {};
      axios.post('/students/stored',  this.form).then(response => {
       window.location.href = '/home'
      });
    },
  },
    }
</script>

