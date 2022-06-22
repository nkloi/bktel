<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" v-if="checkisAdmin()">
                    <div class="card-header">Create New Teacher</div>

                    <div class="card-body">

                        <p id="success"></p>

                        <form @submit.prevent="addTeacher()" >

						    <input type="email" placeholder="Enter email" name="email" v-model="email" >
                            <input type="text" placeholder="last name" name="title" v-model="last_name" >
							<input type="text" placeholder="first name" name="title" v-model="first_name" >
							<input type="text" placeholder="teacher code " name="title" v-model="teacher_code" >
							<input type="text" placeholder="department" name="title" v-model="department" >
							<input type="text" placeholder="faculty" name="title" v-model="faculty" >
							<input type="text" placeholder="adddress" name="title" v-model="address" >
							<input type="number" placeholder="phone" name="title" v-model="phone">
							<input type="text" placeholder="note" name="title" v-model="note">
							
                            <input type="submit" value="Submit">
							
                        </form>
						<strong>Output</strong>
						<pre>{{output}}</pre>

						
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import axios from 'axios';

export default {

	    data(){
            return {
				
			  email: '',
              last_name: '',
			  first_name: '',
			  teacher_code: '',
			  department: '',
			  faculty: '',
			  address: '',
			  phone: '',
			  note: '',
			  error: [],
			  output: '',

			  currentUser: {}

            }
        },

		created() {
           this.getCurrentUser();
        },

		methods: {

			addTeacher() {
			
			let currentObj = this; 

			axios.post(`http://127.0.0.1:8000/add_teacher`, {

					'email': this.email,
					'last_name': this.last_name,
					'first_name': this.first_name,
					'teacher_code': this.teacher_code,
					'department': this.department,
					'faculty': this.faculty,
					'address': this.address,
					'phone': this.phone,
					'note': this.note

				})
				.then( function(response){
					currentObj.output = response.data;  
				})
				.catch(e => {
				this.errors.push(e)
				})
  			},

			getCurrentUser() {

	    		axios.get('http://127.0.0.1:8000/getCurrentUser')

				.then(response => {
					this.currentUser = response.data;
				})
				.catch(error => {
					console.log(error)
				})
	    	},

			checkisAdmin(){

				if(this.currentUser) {
					// 	let check = false
					// 	this.currentUser.roles.forEach(role => {
					// 	if(role.name === 'Administrator') {
					// 		check = true
					// 	}
					// })
					// return check
					let check = false
					if(this.currentUser == 1) {
						check = true
					}

					return check
    			}

			},

		}
        
}
</script>

<style>

</style>