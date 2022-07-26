<template>
  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form @submit.prevent="search()">
                    <input class="form-control" type="bigInteger" v-model="teacher_id" placeholder="Teacher ID" >
                    <input class="form-control" type="bigInteger" v-model="subject_id" placeholder="Subject ID">
                    <input class="form-control" type="integer" v-model="semester" placeholder="Semester">
                    <input class="form-control" type="integer" v-model="year" placeholder="Year">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
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
                            
                        <button @click.prevent="select(searchArr.id, searchArr.subject_id, searchArr.teacher_id)" type="button" class="btn btn-light">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </button>
                        </tr>
                    </tbody>      
                </table>
                </ul>
            </div>
             <form @submit.prevent="uploadFile()" enctype="multipart/form-data">            
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" name="file" class="form-control" @change="processFile($event)" >
                        <input type="string" name="id" class="form-control" placeholder="ID" v-model="id_report">
                        <input type="string" name="student_id" class="form-control" placeholder="student_id" v-model="student_id">
                        <input type="string" name="subject_id" class="form-control" placeholder="subject_id" v-model="subject_id">
                        <input type="string" name="teacher_id" class="form-control" placeholder="teacher_id" v-model="teacher_id">
                        <input type="string" name="title" class="form-control" placeholder="Title" v-model="name">
                        <input type="string" name="note" class="form-control" placeholder="Note" v-model="note">
                    </div>  
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </div>
           </form>
        </div>
    </div>
</div>
        
  
</template>

<script>
    export default {
        data() {
            return {
                student_id: '',
                teacher_id: '',
                subject_id: '',
                semester: '',
                year: '',                
                searchArrs: [],
                searchArr:"",
                message: [],
                id_report:"",
                file:"",
                name:"",
                note:"",

                
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

            getCurrentUser() {
	    		axios.get('http://127.0.0.1:8000/getStudentId')
				.then(response => {
					this.currentUser = student_id;
				})
				.catch(error => {
					console.log(error)
				})
	    	},

            async select(id, subject_id, teacher_id, student_id ) {
                this.id_report= id;
                this.currentUser= student_id;
                this.subject_id= subject_id;
                this.teacher_id= teacher_id;
                console.log(this.id_report);          

                },

                processFile(event) {
                    console.log(event.target.files[0]);
                    this.file = event.target.files[0];
                },

            async uploadFile() {
                try {
                    const url = 'http://127.0.0.1:8000/uploadStudentReport/imp';
                    const response = await axios.post(url, {
                        'id_report':this.id_report,
                        'student_id':this.currentUser,
                        'teacher_id': this.teacher_id,
                        'subject_id': this.subject_id,
                        'name': this.name,
                        'note': this.note,
                        headers: {
                        "Content-Type": "multipart/form-data",
                        },
                        'file': this.file,
                    });
                    console.log(response.data)
                    
                }
                 catch (error) {
                    console.log(error);
                }
            },
        },
    }
</script>


<style>

</style>