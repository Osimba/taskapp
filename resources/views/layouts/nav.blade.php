<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Task Application</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="projectsDropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Projects</a>
                    <div class="dropdown-menu" aria-labelledby="projectsDropdown">
                        @foreach (App\Models\Project::get() as $project)
                            <a href="{{ route('project', [$project->slug]) }}" class="dropdown-item">{{ $project->name }}</a>
                        @endforeach
                    </div>
                </li>
            </ul>
            <span class="navbar-text ml-auto">Osei Quashie</span>
        </div><!-- #navbarNav -->
    </div><!-- .container -->
</nav>