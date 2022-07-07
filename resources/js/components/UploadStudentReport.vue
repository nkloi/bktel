<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>

                        <!-- <form >

                            <input type="number" placeholder="Enter Teacher Code" name="teacher_id" v-model="teacher_id" >
						    <input type="number" placeholder="Enter Subject Code" name="subject_id" v-model="subject_id" >
							<input type="number" >
                            <input type="submit" value="Search">
                            
                        </form> -->

                        <!-- <strong>Display</strong> -->

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Search Subject</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                                <form @submit.prevent="SearchSubject()">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Teacher Code</label>
                                            <input type="number" class="form-control" placeholder="Enter Teacher Code" name="teacher_id" v-model="teacher_id">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Subject Code</label>
                                            <input type="number" class="form-control" placeholder="Enter Subject Code" name="subject_id" v-model="subject_id">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Semester</label>
                                            <input type="number" class="form-control" placeholder="Enter Semester" name="semester" v-model="semester">
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>

                                </form>
                        </div>
                        <!-- <pre>{{outcome}}</pre> -->

                    <div class="card-body" v-for="article in outcome" :key="article.id">

                        <p id="success"></p>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Teacher_id</th>
                                    <th scope="col">Subject_id</th>
                                    <th scope="col">Semester</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Note</th>
                                    <th scope="col">Status</th>
                                    
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th scope="row">{{article.id}}</th>
                                    <td>{{article.teacher_name}}</td>
                                    <td>{{article.subject_name}}</td>
                                    <td>{{article.semester}}</td>
                                    <td>{{article.year}}</td>
                                    <td>{{article.note}}</td>
                                    <td>

                                        <button type="submit" @click="confirmSubject($event, article.id, article.teacher_id, article.subject_id, article.semester, article.year)" class="btn btn-outline-primary btn-xs" style="color:black" data-toggle="modal" data-target="1">
        
                                            <i class="fas fa-check fa-lg"></i>
        
                                         </button>


                                    </td>
                                </tr>
                            </tbody>

                        </table>
                        
						
                    </div>
                </div>
            </div>

            <div><pre>{{message}}</pre></div>
            
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Laravel Vue JS File Upload Example - ItSolutionStuff.com</div>
    
                    <div class="card-body">
                        <div v-if="success != ''" class="alert alert-success" role="alert">
                          {{success}}
                        </div>
                        <form @submit="uploadFile" enctype="multipart/form-data">
                            <strong>Title:</strong>
                            <input type="text" class="form-control" v-model="name">
                            <strong>File:</strong>
                            <input type="file" class="form-control" v-on:change="onFileChange">
    
                        <button class="btn btn-success" style="margin-top: 10px">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
</template>

<script>

export default {
    	 data(){
            return {   

              teacher_id: '',
			  subject_id: '',
			  semester: '',
			  error: [],
              outcome: '',
              articles: [],
              name: '',
              file: '',
              success: '',
              currentUser: '',
              output: '',
              message: [],

            }
        },

        created(){
            this.getCurrentUser()
        },

        methods: {

            SearchSubject() {
			
                let currentObj = this;

                axios.post(`http://127.0.0.1:8000/findsubject&teacher`, {

                        'teacher_id': this.teacher_id,
                        'subject_id': this.subject_id,
                        'semester': this.semester,

                    })
                    .then( function(response){
                        currentObj.outcome = response.data;
                    })
                    .catch(e => {
                    this.errors.push(e)
                    })
  			},

            onFileChange(e){
                console.log(e.target.files[0]);
                this.file = e.target.files[0];
            },

            uploadFile(e) {

                e.preventDefault();

                let currentObj = this;
    
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
        
                let formData = new FormData();
                formData.append('file', this.file);
                formData.append('name', this.name);
                formData.append('teacher_id', this.message.teacher_id);
                formData.append('subject_id', this.message.subject_id);
                formData.append('student_id', this.currentUser);

    
                axios.post('http://127.0.0.1:8000/upload-reports', formData, config)
                .then(function (response) {
                    currentObj.success = response.data.success;
                })
                .catch(function (error) {
                    currentObj.output = error;
                });
                
            },

            getCurrentUser() {

	    		axios.get('http://127.0.0.1:8000/getStudentid')

				.then(response => {
					this.currentUser = response.data;
				})
				.catch(error => {
					console.log(error)
				})
	    	},

            confirmSubject(event, id, teacher_id, subject_id, semester, year) {
			
                let currentObj = this;

                axios.post(`http://127.0.0.1:8000/confirm_subject`, {
                
                    'id' : id,
                    'teacher_id': teacher_id,
                    'subject_id': subject_id,
                    'semester': semester,
                    'year': year,

                })

                    .then( function(response){
                        currentObj.message = response.data;
                    })
                    .catch(e => {
                    this.errors.push(e)
                    })
  			},
        },


   
}
</script>


<style>

</style>