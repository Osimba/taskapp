<div class="d-flex align-items-center px-2 py-4 my-4 border task" data-taskid="{{ $task->id }}" id="task-{{ $task->id }}" draggable="true">
    <i class="fas fa-grip-lines fa-2x grab-task"></i>
    <span class="pl-4">({{ $task->project->name }})</span>
    <span class="pr-4">{{ $task->description }}</span>
    <input type="text" class="form-control edit-description mx-2" name="task-description" maxlength="255" value="{{ $task->description }}">
    <button class="btn btn-light ml-auto edit-task" title="Edit"><i class="fas fa-edit"></i></button>
    <button class="btn btn-success ml-auto update-task" title="Update">Update</button>
    <button class="btn btn-danger ml-2 delete-task" title="Delete"><i class="far fa-trash-alt"></i></button>
    <button class="btn btn-light ml-2 cancel-edit" title="Cancel"><i class="fas fa-times"></i></button>
</div>