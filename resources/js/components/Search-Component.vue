<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form @submit.prevent="search()">
                        <input class="form-control" type="bigInteger" v-model="teacher_id"  placeholder="Teacher ID" >
                        <input class="form-control" type="bigInteger" v-model="subject_id" placeholder="Subject ID">
                        <input class="form-control" type="integer" v-model="semester" placeholder="Semester">
                        <input class="form-control" type="integer" v-model="year" placeholder="Year">
                        <button type="submit">Search</button>
                    </form>
                    <div>
                         <ul v-for="searchArr in searchArrs" :key="searchArr.id">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Teacher ID</th>
                    <th scope="col">Subject ID</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Year</th>
                </tr>
            </thead>
                
            <tbody>
                <tr>
                    <th scope="row">{{searchArr.id}}</th>
                    <td>{{searchArr.teacher_id}}</td>
                    <td>{{searchArr.subject_id}}</td>
                    <td>{{searchArr.semester}}</td>
                    <td>{{searchArr.year}}</td>
                    <button @click="addnew($event, searchArr.id, searchArr.teacher_id, searchArr.subject_id, searchArr.semester, searchArr.year)" type="button" class="btn btn-light">
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </button>
                
                </tr>
            </tbody>
       
        </table>
         </ul>
        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
</template>

<script>


    export default {
        data() {
            return {
                teacher_id: '',
                subject_id: '',
                semester: '',
                year:'',
                searchArrs: [],
                searchArr: '',
                message: [],

            }
        },
            methods: {
            search() {
                axios.post('http://localhost:8000/search', {
                    'teacher_id': this.teacher_id,
                    'subject_id': this.subject_id,
                    'semester': this.semester,
                    'year': this.year,
                })
                .then((response) => {
                    this.searchArrs = response.data;
                });
            },
            
            addnew(event, id, teacher_id, subject_id, semester, year, ) {
                 axios.post(`http://localhost:8000/addnew`, {
                    'ID' : id,
                    'teacher_id': teacher_id,
                    'subject_id': subject_id,
                    'semester': semester,
                    'year': year,
                 })
                .then((response) => {
                        this.message = response.data;
                    })
                
                },
                
            }    
        }
       
    
</script>

