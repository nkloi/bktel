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
                <h3 class="card-title">Import Subject</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" @submit.prevent="register()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" required v-model.lazy="subject.name" name="name" class="form-control" id="exampleInputName" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputCode">Code</label>
                    <input type="text" required v-model.lazy="subject.code" name="code" class="form-control" id="exampleInputCode" placeholder="Code">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputNote">Note</label>
                    <input type="text" v-model.lazy="subject.note" name="note" class="form-control" id="exampleInputNote" placeholder="Note">
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
                subject: {
                name: "",
                code: "",
                note: "",
                }
            }
        },
        methods: {
            async register() {
                console.log(this.subject);
                try {
                    const url = this.domain + "/dashboard/subjects/form";
                    const data = await axios.post(url, this.subject);
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
