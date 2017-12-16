(function(){
  "use strict";
  
   angular.module('homeModule',[])
    .component('homeComponent',{
    	controller : homectrl,
    	 templateUrl : 'nav/home.html'
    })

    homectrl.$inject = ['$log'];
   
    function homectrl($log)
    {
    	$log.log('contact log');
    }

   })();