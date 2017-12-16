(function(){
  "use strict";
  
   angular.module('aboutModule',[])
   .factory('aboutFactory',aboutFactory)
   .component('aboutComponent',{
   	  controller : aboutctrl,
   	  templateUrl : 'nav/about.html'
   })

   aboutctrl.$inject = ['$log','aboutFactory'];

   function aboutctrl($log, aboutFactory)
   {
   	  $log.log('welcome about ');
   	  aboutFactory.featchData();

   	  var vm = this;
   	  vm.title = "about";
   	  vm.sendMail = function(){

   	  }
   }

    aboutFactory.$inject = ['$log'];

   function aboutFactory($log)
   {
   	function featchData(){

   	  $log.log('featchData about ');
   	}
   	return {
   		featchData:featchData
   	}
   }


})();