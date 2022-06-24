<template>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 1345.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Register Student</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Logout</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" @submit.prevent="register()">
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputFirstName">First Name</label>
                    <input type="text" required v-model.lazy="student.first_name" name="first_name" class="form-control" id="exampleFirstName" placeholder="Enter FirstName" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputLastName">Last Name</label>
                    <input type="text" required v-model.lazy="student.last_name" name="last_name" class="form-control" id="exampleInputLastName" placeholder="LastName" required>
                  </div>
                 <div class="form-group">
                    <label for="exampleStudentCode">Student Code</label>
                    <input type="text" required v-model.lazy="student.student_code" name="student_code" class="form-control" id="exampleInputStudentCode" placeholder="student Code">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputdepartment">Department</label>
                    <input type="text" required v-model.lazy="student.department" name="department" class="form-control" id="exampleInputdepartment" placeholder="department">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFaculty">Faculty</label>
                    <input type="text" required v-model.lazy="student.faculty" name="faculty" class="form-control" id="exampleInputFaculty" placeholder="Faculty">
                  </div>
                 <div class="form-group">
                    <label for="exampleInputAddress">Address</label>
                    <input type="text" required v-model.lazy="student.address" name="address" class="form-control" id="exampleInputAddress" placeholder="Address">
                  </div>
                  <div class="form-group">
                    <label for="examplePhone">Phone</label>
                    <input type="text" required v-model.lazy="student.phone" name="phone" class="form-control" id="exampleInputPhone" placeholder="Phone">
                  </div>
                  <div class="form-group">
                    <label for="exampleNote">Note</label>
                    <input type="text" v-model.lazy="student.note" name="note" class="form-control" id="exampleInputNote" placeholder="Note">
                  </div>


                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</template>

<script>
    import axios from 'axios'
    export default {
        props: {
            domain: String
        },
        data() {
            return {
                student: {
                first_name: "",
                last_name: "",
                faculty: "",
                student_code: "",
                department: "",
                address: "",
                phone: "",
                note: "",
                }
            }
        },
        methods: {
            async register() {
                console.log(this.student);
                try {
                    const url = this.domain + "/dashboard/students/register";
                    const data = await axios.post(url, this.student);
                    console.log(data);
                    window.location.href = "/dashboard";
                } catch (error) {
                    console.log(error);
                }   
            },
        }, 
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>