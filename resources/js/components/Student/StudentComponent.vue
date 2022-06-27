<template>
     <div class="content-wrapper" style="min-height: 1345.6px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Student Register</h1>
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
                        Form
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" novalidate="novalidate" >
                        <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">First name</label>
                            <input type="text" name="first_name" class="form-control" id="exampleInputEmail1" placeholder="First_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Last name</label>
                            <input type="text" name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Last_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Student code</label>
                            <input type="text" name="student_code" class="form-control" id="exampleInputEmail1" placeholder="Student_code">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Departement</label>
                            <input type="text" name="department" class="form-control" id="exampleInputEmail1" placeholder="Department">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Faculty</label>
                            <input type="text" name="faculty" class="form-control" id="exampleInputEmail1" placeholder="Faculty">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Note</label>
                            <input type="text" name="note" class="form-control" id="exampleInputPassword1" placeholder="Note">
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
    export default {
        props: {
            user: String,
            base_url: String,
            role_id: String,
        },
        methods: {
                     async register() {
                         console.log(this.student);
                         try {
                            const url = this.domain + "/dashboard/students/register";
                            const data = await axios.post(url, this.student);
                            console.log(data);
                            window.location.href = "/dashboard";
                             }catch (error) {
                            console.log(error);
                }
            },
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
.invalid {
    margin-top: 0.25rem;
    font-size: 80%;
    color: #dc3545;
}
</style>
