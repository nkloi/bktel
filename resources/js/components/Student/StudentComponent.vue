<template>
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

      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">



              <!-- form start -->
              <form id="quickForm" @submit.prevent="register()" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">First name</label>
                    <input type="text" required v-model.lazy="student.first_name" name="first_name" class="form-control" id="exampleInputEmail1" placeholder="Enter First_name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last name</label>
                    <input type="text" required v-model.lazy="student.last_name" name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Last_name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Student code</label>
                    <input type="text" required v-model.lazy="student.student_code" name="student_code" class="form-control" id="exampleInputEmail1" placeholder="Enter Student_code">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Departement</label>
                    <input type="text" required v-model.lazy="student.department" name="department" class="form-control" id="exampleInputEmail1" placeholder="Enter Department">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Faculty</label>
                    <input type="text" required v-model.lazy="student.faculty" name="faculty" class="form-control" id="exampleInputEmail1" placeholder="Enter Faculty">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" required v-model.lazy="student.address" name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter Address">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" required v-model.lazy="student.phone" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Note</label>
                    <input type="text" required v-model.lazy="student.note" name="note" class="form-control" id="exampleInputPassword1" placeholder="Note">
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

    <!-- /.content -->

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
                    const url = "/dashboard/students/register";
                    const data = await axios.post(url, this.student);
                    console.log(data);
                    window.location.href = "/dashboard";
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
