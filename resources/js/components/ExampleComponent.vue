<template>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
                <!-- /.card-header -->
                <!-- form start -->
        <form>
            <div class="card-body" v-for="article in articles" :key="article.id">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Student_Code</th>
                            <th scope="col">Department</th>
                            <th scope="col">Faculty</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{article.id}}</th>
                            <td>{{article.first_name}}</td>
                            <td>{{article.last_name}}</td>
                            <td>{{article.student_code}}</td>
                            <td>{{article.department}}</td>
                            <td>{{article.faculty}}</td>
                            <td>{{article.phone}}</td>
                            <td>{{article.address}}</td>
                            
                        </tr>

                    </tbody>
                </table>
                <!-- <h1>{{article.last_name}}</h1> -->
                <!-- <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="email" class="form-control" placeholder="Enter Last Name" value="{{article.last_name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="email" class="form-control"  placeholder="Enter First Name" value="{{article.last_name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Student-Code</label>
                    <input type="email" class="form-control" placeholder="Enter Student-Code" value="{{article.student_code}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Department</label>
                    <input type="email" class="form-control"  placeholder="Enter Department" value="{{article.department}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Faculty</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Faculty" value="{{article.faculty}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Address</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div> -->
                    <!-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
            </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
        </form>
            </div>
</template>

<script>
import { data } from 'browserslist'

    export default {
        mounted() {
            console.log('Component mounted.')
        },

        data(){
            return{
                articles:[],
            }
        },
        
        methods:{
            getArticles(){
                fetch('http://127.0.0.1:8000/getstudent', {
                    method:"GET",
                    headers:{
                        "Content-Type":"application/json"
                    }
                })
                .then(resp => resp.json())
                .then(data => {
                    this.articles.push(...data);
                })
                .catch(error => {
                    console.log(error)
                })
            }
        },
        created(){
            this.getArticles()
        }
    }
</script>
