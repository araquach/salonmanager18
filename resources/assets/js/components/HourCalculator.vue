<script>
	new Vue({
		el: '#app',
		
		data: {
			days: '',
		},
		
		computed: {
			hours: function () {
    			return this.days * 8
    		}
		}
	})
</script>