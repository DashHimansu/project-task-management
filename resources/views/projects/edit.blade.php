<x-app-layout>

<div style="width: 40%; margin: 50px auto; padding: 30px; border: 1px solid #ddd; border-radius: 8px;">

    <h2 style="text-align: center; margin-bottom: 25px;">Edit Project</h2>

    <form method="POST" action="{{ route('projects.update', $project) }}">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Project Name</label>
            <input type="text" 
                   name="name" 
                   value="{{ $project->name }}" 
                   required
                   style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Start Date</label>
            <input type="date" 
                   name="start_date" 
                   value="{{ $project->start_date }}" 
                   required
                   style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px;">End Date</label>
            <input type="date" 
                   name="end_date" 
                   value="{{ $project->end_date }}" 
                   required
                   style="width: 100%; padding: 8px;">
        </div>

        <div style="text-align: center;">
            <button type="submit" 
                    style="padding: 8px 20px; background-color: #2196F3; color: white; border: none; border-radius: 4px;">
                Update
            </button>
        </div>
    </form>

    <div style="text-align: center; margin-top: 15px;">
        <a href="{{ route('projects.index') }}">Back</a>
    </div>

</div>

</x-app-layout>