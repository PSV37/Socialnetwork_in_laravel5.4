(function(){
  "use strict";
  
   angular.module('contactModule',[])
    .component('contactComponent',{
    	controller : contactctrl,
    	 templateUrl : 'nav/contact.html'
    })

    contactctrl.$inject = ['$log'];
   
    function contactctrl($log)
    {
    	$log.log('contact log');
    }

   })();