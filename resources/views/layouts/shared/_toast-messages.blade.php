<script>
	@if(Session::has('success'))
		toastr.success('{{ Session::get('success') }}', 'Succès !');
	@endif
</script>