<template>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Validation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Validation</li>
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
                <h3 class="card-title">Register Teacher</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" @submit.prevent="register()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail">Email</label>
                    <input type="text" required v-model.lazy="teacher.email" name="email" class="form-control" id="exampleInputEmail" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputLastName">Last Name</label>
                    <input type="text" required v-model.lazy="teacher.last_name" name="last_name" class="form-control" id="exampleInputLastName" placeholder="Last Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFirstName">First Name</label>
                    <input type="text" required v-model.lazy="teacher.first_name" name="first_name" class="form-control" id="exampleInputFirstName" placeholder="First Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputTeacherCode">Teacher Code</label>
                    <input type="text" required v-model.lazy="teacher.teacher_code" name="teacher_code" class="form-control" id="exampleInputTeacherCode" placeholder="Teacher Code">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputDepartment">Department</label>
                    <input type="text" required v-model.lazy="teacher.department" name="department" class="form-control" id="exampleInputDepartment" placeholder="Department">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFaculty">Faculty</label>
                    <input type="text" required v-model.lazy="teacher.faculty" name="faculty" class="form-control" id="exampleInputFaculty" placeholder="Faculty">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputAddress">Address</label>
                    <input type="text" required v-model.lazy="teacher.address" name="address" class="form-control" id="exampleInputAddress" placeholder="Address">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPhone">Phone</label>
                    <input type="text" required v-model.lazy="teacher.phone" name="phone" class="form-control" id="exampleInputPhone" placeholder="Phone">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputNote">Note</label>
                    <input type="text" v-model.lazy="teacher.note" name="note" class="form-control" id="exampleInputNote" placeholder="Note">
                  </div>
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
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
                teacher: {
                email: "",
                first_name: "",
                last_name: "",
                faculty: "",
                teacher_code: "",
                department: "",
                address: "",
                phone: "",
                note: "",
                }
            }
        },
        methods: {
            async register() {
                console.log(this.teacher);
                try {
                    const url = this.domain + "/dashboard/teachers/register";
                    const data = await axios.post(url, this.teacher);
                    console.log(data);
                    window.location.href="/dashboard";
                } catch (error) {
                    console.log(error);
                }   
            }
        }, 
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
