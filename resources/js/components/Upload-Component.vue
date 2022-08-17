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
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                    <div>
                         <ul v-for="searchArr in searchArrs" :key="searchArr.id">
                         <p id="success"></p>
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
                <div class="card-body">
                        <div v-if="success != ''" class="alert alert-success" role="alert">
                          {{success}}
                        </div>
            <form @submit.prevent="uploadFile()" enctype="multipart/form-data">    
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" name="file" class="form-control"  v-on:change="onFileChange">
                        <input type="string" name="title" class="form-control" v-model="name" placeholder="title">
                        <input type="string" name="note" class="form-control" v-model="note" placeholder="note">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>               
                </div>   
           </form>
           </div>
        </div>
    </div>
</div>

</template>

<script>
export default {
    	 data(){
            return { 
			    subject_id: '',
                message: [],
                success: '',
                data:'',
                file:'',
                teacher_id: '',
                semester: '',
                year:'',
                currentUser: '',
                searchArrs: [],
                searchArr: '',
                name:'',
                note:'',
                
            }
        },
         created(){
            this.getCurrentUser()
        },
   
    methods: {
        search() {
                axios.post('http://127.0.0.1:8000/uploadStudentReport/search', {
                    'teacher_id': this.teacher_id,
                    'subject_id': this.subject_id,
                    'semester': this.semester,
                    'year': this.year,
                })
                .then((response) => {
                    this.searchArrs = response.data;
                });
            },
             
            onFileChange(e){
                console.log(e.target.files[0]);
                this.file = e.target.files[0];
            },
            
            addnew(event, id, teacher_id, subject_id, semester, year, ) {
                axios.post('http://127.0.0.1:8000/uploadStudentReport/addnew', {
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
            getCurrentUser() {
	    		axios.get('http://127.0.0.1:8000/getStudentId')
				.then(response => {
					this.currentUser = response.data;
				})
				.catch(error => {
					console.log(error)
				})
	    	},
         
            uploadFile() {  
                let currentObj = this;
                 const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
                 let formData = new FormData();
                formData.append('file', this.file);
                formData.append('name', this.name);
                formData.append('note', this.note);
                formData.append('teacher_id', this.message.teacher_id);
                formData.append('subject_id', this.message.subject_id);
                formData.append('student_id', this.currentUser);
    
                axios.post('http://127.0.0.1:8000/uploadStudentReport/imp', formData, config)
                .then(function (response) {
                    currentObj.success = response.data.success;
                });
                
            }
           
    	},
    
}
</script>

<style>

</style>