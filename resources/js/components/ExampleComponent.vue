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

            </div>

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
