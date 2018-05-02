<script>
	new Vue({
		el: '#app',
		
		data: {
			days: '{!! $holiday->hours_requested / 8 !!}',
		},
		
		computed: {
			hours: function () {
				return this.days * 8
			}
		}
	})
</script>