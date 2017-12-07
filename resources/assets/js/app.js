
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',
    data :{
      post : 'Upload New Post',
      image :'',
      user : '',
      city : '',
      country :'',
      dateofbirth :'',
      about : '',
      content :'',
      posts : [],
      commentSeen :false,
      commentadd :{},
      comments : '',
    },


    ready:function()
    {
     this.created();
    },

  created(){
       axios.get('http://127.0.0.1:8000/posts/display')
            .then(response => {
                console.log(response); //show if success
                app.posts = response.data;
                Vue.filter('myTime', function(value){
                 return moment(value).fromNow();
                });
            })

            /*.catch(function(response){
                console.log(error); // run if we have error
            });*/
     },


    methods :{
      // save imge by vue 
        onfilechange(e){
            var files = e.target.files || e.dataTransfer.files;
            this.createImg(files[0]);
        },

        createImg(file){
            //we will priview our img before upload
            var image = new Image;
            var reader = new FileReader;

            reader.onload = (e) =>{
                this.image = e.target.result;
            };
            reader.readAsDataURL(file);
        },

        uploadImg(){
	          axios.post('http://127.0.0.1:8000/postImg',{
	               image : this.image,
                 content : this.content
	            })

	            .then((response) => {
	                console.log("save Successfully"); //show if success
	                this.image = '',
                  this.content = ''
	                if(response.status===200)
	                {
	                	 //location.reload();
	                	app.posts = response.data;
	                    //app.user = response.data;
	                }  
	            })
	            .catch(function(response){
	                console.log(error); // run if we have error
	            })
        },

        removeImg(){
            this.image = ''
        },

  /*************** Add New Post *************************/
     addpost(){
        axios.post('http://127.0.0.1:8000/addpost',{
            content:this.content       
        })
           .then((response) => {
                console.log("save Successfully"); //show if success
                this.content = '';
                if(response.status===200)
                {
                    app.posts = response.data;
                }       
            })

            .catch(function(response){
                console.log(error); // run if we have error
            })
        },
 
  /*************** Delete Post *************************/
        deletepost(id)
        {
             axios.get('http://127.0.0.1:8000/deletepost/' + id)
            .then(response => {
                console.log(response); //show if success
                this.posts = response.data;
            })

            .catch(function(response){
                console.log(error); // run if we have error
            })
        },


    /*************** Add Likes On Post *************************/   
       LikePost(id)
       {
          axios.get('http://127.0.0.1:8000/LikePost/' + id)
            .then(response => {
                console.log(response); //show if success
                this.posts = response.data;
            })

            .catch(function(response){
                console.log(error); // run if we have error
            })
       },
 
   /*************** Add Comments On Post *************************/   
       sendComment(post,key)
        {
          axios.post('http://127.0.0.1:8000/addcomments',{
              comment : this.commentadd[key],
              id :  post.id,
          })

          .then(function(response){
              console.log('save Successfully'); //show if success
             this.commentadd = '';
              if(response.status===200)
              {
                app.posts = response.data;
              }
          })

          .catch(function(response){
              console.log(error); // run if we have error
          })
        },

    }
});
