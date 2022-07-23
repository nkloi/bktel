<template>
    <div >
        <h6>Change Avatar</h6>
        <div class="image"  v-if="this.profile_image_url == null">
          <img :src="base_url + '/storage/blank avatar.jpg' " class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="image" v-else>
          <img :src="base_url + path" class="img-circle elevation-2" alt="User Image">
        </div>
        <form @submit.prevent="profileUpload" method="POST" enctype="multipart/form-data">
            <div class="custom-file"  style="width: 30%">
                <input type="file" @change="imageSelected" class="custom-file-input" id="customFile" accept="image/*" >
                <label class="custom-file-label" for="customFile">Choose an image</label>
            </div>
            <div v-if="imagepreview" class="mt-3">
                <img :src="imagepreview" class="figure-img img-fluid rounded"  style="max-height:100px;">
            </div>
            <button class="btn btn-success  " style="margin-bottom :30px ;" type="submit" >Upload profile</button>
        </form>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    props: {
            base_url: String,
            path: String,
            profile_image_url:String,

        },  
    data(){
        
        return{
            image: [],
            imagepreview: null,


        }
    },
    methods:{
        imageSelected(e){
            this.image = e.target.files[0];
           
            let reader = new FileReader();
            reader.readAsDataURL(this.image);
            reader.onload = e => {
            this.imagepreview = e.target.result;
            console.log(this.image);
            };
        },
        profileUpload(){
            let data = new FormData();
            data.append('image', this.image);
            axios.post( this.base_url + "/dashboard/upload-user-avatar", data)
            
            .then((response)=>{
                alert('Avatar uploaded!');
                window.location.href = (this.base_url + "/dashboard/upload-user-avatar" );
            }).catch(()=>{
            })
        }
    }
}
</script>