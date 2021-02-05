<form method="post" action="{{ route('tasks.store') }}">
    @csrf
    <div class="form-group my-4 form-inline">
        <label for="description" class="sr-only">Task Description</label>
        <input class="form-control col-sm-7 mr-2" type="text" name="description" placeholder="Add a new task..." maxlength="255" value="{{ old('description') }}">
        <select name="project" id="project" class="form-control mx-2 col-sm-2">
            @foreach (App\Models\Project::get() as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>
        <input type="submit" class="btn btn-success mx-2 col-sm-2" value="Add Task">
    </div>
</form>