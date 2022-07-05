<template>
  <div class="content-wrapper" style="min-height: 1345.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Import Subject</h1>
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
                    <label for="exampleInputName">Name</label>
                    <input type="text" required v-model.lazy="form.name" name="Name" class="form-control" id="exampleName" placeholder="Enter Name Subject">
                  </div>

                  <div class="form-group">
                        <label for="exampleInputFile">File</label>
                        <input type="file"  name="subjects" @change="processFile($event)"/>
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
import axios from "axios";
export default {
    props: {
        domain: String,
    },
    data() {
        return {
            form: {
                name: "",
                subjects: null,
            },
        };
    },
    methods: {
        async register() {
            console.log(this.subject);
            try {
                const url = this.domain + "/dashboard/subjects/import";
                console.log(url);
                const data = await axios.post(url, this.form.subjects, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                });
                console.log(data);
                window.location.href = "/dashboard";
            } catch (error) {
                console.log(error);
            }
        },
        processFile(event) {
            let formData = new FormData();
            formData.append("file", event.target.files[0]);
            formData.append("name", this.form.name);
            this.form.subjects = formData;
        },
    },
    mounted() {
        console.log("Component mounted.");
    },
};
</script>