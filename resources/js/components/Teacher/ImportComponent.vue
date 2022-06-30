<template>

    <div>


        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->

        <div class="col-md-6" style = "margin: 0 auto ">
                <h3 >Import CSV File into MySQL using PHP</h3>
        </div>

            <div class="col-md-6" style = "margin: 0 auto ">
                <form id="quickForm" novalidate="novalidate" @submit.prevent="submit()" >

                    <div class="input-group-append">
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name" v-model.lazy="form.name">
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput" name="teachers" @change="processFile($event)">
                        <label class="custom-file-label" for="customFileInput">Selected file</label>
                        </div>
                        <div class="input-group-append">
                        <button type="submit" class="btn btn-primary" name="import">Import</button>

                        </div>
                    </div>
                </form>
            </div>



    </div>
</template>

<script>
import axios from 'axios'
export default {
        props: {
            base_url: String,
        },
        methods: {
            async submit() {
                console.log(this.teacher);
                try {
                    const url = this.base_url + "/dashboard/import";
                    const data = await axios.post(url, this.form.teachers, {
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
                this.form.teachers = formData;
            },
        },
         data() {
            return {
                form: {
                name:"" ,
                teachers: null,
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
}
</script>

<style >

            .custom-file-input.selected:lang(en)::after {
                    content: "" !important;
                    }

                    .custom-file {
                    overflow: hidden;
                    }

                    .custom-file-input {
                    white-space: nowrap;
                    }


</style>
