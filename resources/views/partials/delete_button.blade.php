<!-- TODO: Delete Button -->
<form action="{{ $url }}" method="POST" style="display: inline;">
	{!! csrf_field() !!}
	{!! method_field('DELETE') !!}
								
	<button type="submit" id="delete-task-{{ $id }}" class="btn btn-danger" style="margin-top: 2px;">
	 <i class="fa fa-btn fa-trash"></i>Delete
	</button>
</form>