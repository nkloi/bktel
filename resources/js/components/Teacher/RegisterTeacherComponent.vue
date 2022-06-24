<template>
  <div class="content-wrapper" style="min-height: 1345.6px;">
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
                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" @submit.prevent="register()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" required v-model.lazy="teacher.email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">First name</label>
                    <input type="text" required v-model.lazy="teacher.first_name" name="first_name" class="form-control" id="exampleInputEmail1" placeholder="Enter First_name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Last name</label>
                    <input type="text" required v-model.lazy="teacher.last_name" name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Last_name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Teacher code</label>
                    <input type="text" required v-model.lazy="teacher.teacher_code" name="teacher_code" class="form-control" id="exampleInputEmail1" placeholder="Enter Teacher_code">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Departement</label>
                    <input type="text" required v-model.lazy="teacher.department" name="department" class="form-control" id="exampleInputEmail1" placeholder="Enter Department">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Faculty</label>
                    <input type="text" required v-model.lazy="teacher.faculty" name="faculty" class="form-control" id="exampleInputEmail1" placeholder="Enter Faculty">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" required v-model.lazy="teacher.address" name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter Address">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" required v-model.lazy="teacher.phone" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Note</label>
                    <input type="text" required v-model.lazy="teacher.note" name="note" class="form-control" id="exampleInputPassword1" placeholder="Note">
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
                    const url = "/dashboard/teachers/register";
                    const data = await axios.post(url, this.teacher);
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