<template>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form @submit="uploadFile()" enctype="multipart/form-data">
             
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" name="file" class="form-control">
                        <input type="string" name="title" class="form-control" placeholder="title" v-model="name">
                        <input type="string" name="note" class="form-control" placeholder="note">
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
    	 data(){
            return { 
                teacher_id: '',
			    subject_id: '',
                currentUser: '',
                name: '',
                message: [],
                file: '',
            }
        },
    created(){
        this.getCurrentUser()
    },

    methods: {

         getCurrentUser() {
	    		axios.get('http://localhost:8000/getStudentid')
				.then(response => {
                    
					this.currentUser = response.data;
				})
				.catch(error => {
					console.log(error)
				})
         },

        uploadFile(e) {
            e.preventDefault();
        
            const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();
                formData.append('file', this.file);
                formData.append('name', this.name);
                formData.append('teacher_id', this.message.teacher_id);
                formData.append('subject_id', this.message.subject_id);
                formData.append('student_id', this.currentUser);
                
                axios.post('http://localhost:8000/imp', formData, config)
                .then(function (response) {
                    this.success = response.data.success;
                })                
                .catch(function (error) {
                    this.output = error;
                });
                
            }
           
    	},
    
}
</script>

<style>

</style>