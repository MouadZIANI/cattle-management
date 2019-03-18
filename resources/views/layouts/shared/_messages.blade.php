@if(Session::has('success'))
    <div class="note note-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
    	<h4 class="block">Succès !</h4>
        <p>{{ Session::get('success') }}</p>
    </div>
@endif