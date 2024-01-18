<!-- <a href="{{ route('users.edit',$id) }}" data-toggle="tooltip" data-placement="top" title="Edit User" data-original-title="Delete" data-original-title="Edit" class="edit text-success">
	<i class="bi bi-pencil-square w-2"></i>
</a>
<a href="{{ route('users.show',$id) }}"  data-toggle="tooltip" data-placement="top" title="View User" data-original-title="Delete" data-original-title="View" class="view text-dark" >
	<i class="bi bi-eye w-2"></i>
</a>

<a href="javascript:void(0)" data-id="{{ $id }}" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete" class="delete text-danger" >
	<i class="bi bi-trash3 w-2"></i>
</a> -->

<li class="nav-item dropdown">
	<a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
		<i class="bi bi-three-dots-vertical"></i>
	</a>
	<div class="dropdown-menu dropdown-menu-end">
		<a href="{{ route('users.edit',$id) }}" data-toggle="tooltip" data-placement="top" title="Edit User" data-original-title="Delete" data-original-title="Edit" class="edit text-success dropdown-item">
			<i class="bi bi-pencil-square w-2"></i>
			Edit
		</a>
		<a href="{{ route('users.show',$id) }}" data-toggle="tooltip" data-placement="top" title="View User" data-original-title="Delete" data-original-title="View" class="view text-dark dropdown-item">
			<i class="bi bi-eye w-2"></i>
			View
		</a>

		<a href="javascript:void(0)" data-id="{{ $id }}" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete" class="delete text-danger dropdown-item">
			<i class="bi bi-trash3 w-2"></i>
			Delete
		</a>
	</div>
</li>