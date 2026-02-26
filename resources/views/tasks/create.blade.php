<x-app-layout>

<div style="max-width: 500px; margin: 50px auto; padding: 30px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">

    <h2 style="text-align: center; margin-bottom: 30px; font-size: 24px; color: #333;">Create Task</h2>

    <form method="POST" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Task Title -->
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 6px; font-weight: 500;">Task Title</label>
            <input type="text" name="title" required 
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <!-- Project Select -->
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 6px; font-weight: 500;">Select Project</label>
            <select name="project_id" required 
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Status -->
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 6px; font-weight: 500;">Status</label>
            <select name="status" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <option value="pending">Pending</option>
                <option value="in_progress">in_progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <!-- Assigned To -->
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 6px; font-weight: 500;">Assigned To</label>
            <input type="text" name="assigned_to" required 
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <!-- Due Date -->
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 6px; font-weight: 500;">Due Date</label>
            <input type="date" name="due_date" required 
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <!-- File Upload -->
        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 6px; font-weight: 500;">Attach File (Image/PDF max 2MB)</label>
            <input type="file" name="attachment" accept=".jpg,.jpeg,.png,.pdf" 
                   style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <!-- Submit -->
        <div style="text-align: center;">
            <button type="submit" 
                    style="padding: 10px 25px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; font-size: 16px;">
                Save Task
            </button>
        </div>

    </form>

    <div style="text-align: center; margin-top: 20px;">
        <a href="{{ route('tasks.index') }}" style="color: #2196F3; text-decoration: none;">Back</a>
    </div>

</div>

</x-app-layout>