<template>
 <!-- Content Wrapper. Contains page content -->
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
              <form id="quickForm" novalidate="novalidate">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputFirstName">First Name</label>
                    <input type="text" name="first_name" class="form-control" id="exampleFirstName" placeholder="Enter FirstName">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputLastName">Last Name</label>
                    <input type="text" name="last_name" class="form-control" id="exampleInputLastName" placeholder="LastName">
                  </div>
                 <div class="form-group">
                    <label for="exampleStudentCode">Student Code</label>
                    <input type="text" name="student_code" class="form-control" id="exampleInputStudentCoded" placeholder="StudentCode">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputDeparture">Departure</label>
                    <input type="text" name="departure" class="form-control" id="exampleInputDeparture" placeholder="Departure">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFaculty">Faculty</label>
                    <input type="text" name="faculty" class="form-control" id="exampleInputFaculty" placeholder="Faculty">
                  </div>
                 <div class="form-group">
                    <label for="exampleInputAddress">Address</label>
                    <input type="text" name="address" class="form-control" id="exampleInputAddress" placeholder="Address">
                  </div>
                  <div class="form-group">
                    <label for="examplePhone">Phone</label>
                    <input type="text" name="phone" class="form-control" id="exampleInputPhone" placeholder="Phone">
                  </div>
                  <div class="form-group">
                    <label for="exampleNote">Note</label>
                    <input type="text" name="note" class="form-control" id="exampleInputNote" placeholder="Note">
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
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>