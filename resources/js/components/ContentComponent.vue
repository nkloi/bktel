<template>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            Modals &amp; Alerts
                            <small>new</small>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Modals &amp; Alerts
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    DataTable with minimal features & hover
                                    style
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table
                                    id="example2"
                                    class="table table-bordered table-hover"
                                >
                                    <thead>
                                        <tr>
                                            <th>Student Code</th>
                                            <th>Full Name</th>
                                            <th>Department</th>
                                            <th>Faculty</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1916004</td>
                                            <td>Nguyen Van Vuong</td>
                                            <td>
                                                Electronic and Telecommunication
                                            </td>
                                            <td>Telecommunication</td>
                                            <td>B Area Dormitory</td>
                                            <td>0702538225</td>
                                            <td>note something</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- ./row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    },
};
</script>
