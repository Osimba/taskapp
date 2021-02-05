@extends('layouts.app')
@section('content')
    <main class="container">
        
        @include('partials.task-form')
        
        <h1 class="text-center mt-5">All Tasks</h1>

        <div class="tasks-container p-4">
            @forelse ($tasks as $task)
                <x-task :task="$task"></x-task>
            @empty
                No tasks to show...
            @endforelse
        </div>
        
    </main>
@endsection