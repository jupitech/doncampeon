Vue.component('tasks',{
	template:'#tasks-template',

	props:['list'],

	data: function(){
		return{
			list:[]
		};
	},
	created: function(){
		$.getJSON('')
	}
});
new Vue({
el:'body'
});