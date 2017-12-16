
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
Vue.component('modal', {
  template: '#msgmodel'
});


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
      messages :[],
      privatemsgs :[],
      conID :'',
      msgFrom :'',
      myfriends :[],
      friend_id :'',
      showModal: false,
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

            .catch(function(response){
                console.log(error); // run if we have error
            });

  //get all messages of friends
            axios.get('http://127.0.0.1:8000/getmessages')
            .then(response => {
                console.log(response.data); //show if success
                app.messages = response.data;
            })

            .catch(function(response){
                console.log(error); // run if we have error
            });

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
                //console.log(response.data); //show if success
                this.content = '';
                if(response.status===200)
                {
                    app.posts = response.data;
                    //toastr.success('Successfully User  Registred!', 'Success Alert', {timeOut: 5000});
                     
                }       
            })

            .catch(function(response){
                //console.log(error); // run if we have error
            })
        },
 
  /*************** Delete Post *************************/
        deletepost(id)
        {
             axios.get('http://127.0.0.1:8000/deletepost/' + id)
            .then(response => {
                console.log(response); //show if success
                this.posts = response.data;
                 //toastr.success('Successfully User  Registred!', 'Success Alert', {timeOut: 5000});
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

  /*************** Add Dislikes On Post *************************/  
       UnlikePost(id)
       {
          axios.get('http://127.0.0.1:8000/DislikePost/' + id)
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

 
   /*************** get Messages between two friends by Id  *************************/
        msg: function(id)
        {
          axios.get('http://127.0.0.1:8000/getmessages/' + id)
            .then(response => {
                console.log(response.data); //show if success
                app.privatemsgs = response.data;
                app.conID = response.data[0].conversion_id;
            })

            .catch(function(response){
                console.log(error); // run if we have error
            })
        },

 /*************** get values When key pressed *************************/
      inputHandler(e)
      {
            if(e.keyCode === 13 && !e.shiftKey){
                e.preventDefault();
                this.sendMsg();
            }
      },

/*************** send Messages between two friends *************************/
     sendMsg(){
         if(this.msgFrom)
         {
                axios.post('http://127.0.0.1:8000/sendMessage',{
                    conID : this.conID,
                    msg : this.msgFrom
                })
                .then(function(response){
                    console.log(response.data); //show if success
                    if(response.status===200)
                    {
                        app.privatemsgs = response.data;
                        this.msgFrom ='';
                    }        
                })             
          }
        },
/*************** Get all confirm friends for chating *************************/
     allmsg(){
      axios.get('http://127.0.0.1:8000/newfriends',{
      })
     .then(function(response){
              //console.log(response.data); //show if success
              if(response.status===200)
              {
                  app.myfriends = response.data;
              }        
          }) 

     },   
   
  /*************** get friends for start chating by id *************************/ 
   friendID(id){
      app.friend_id = id;
     //window.location.replace('http://127.0.0.1:8000/messages');
   },
       sendNewMsg()
       {
         axios.post('http://127.0.0.1:8000/sendNewMessage', {
                friend_id: this.friend_id,
                msg: this.newMsgFrom,
              })
              .then(function (response) {
                console.log(response.data); // show if success
                if(response.status===200)
                {
                    //alert(response.data);
                 // window.location.replace('http://127.0.0.1:8000/messages');
                 app.privatemsgs = response.data;
                  app.msg = 'your message has been sent successfully';
                }

              })
              .catch(function (error) {
                console.log(error); // run if we have error
              });
       },
    }
});
