<x-app-layout>

<div style="max-width: 900px; margin: 50px auto; padding: 20px;">

    <!-- Action Links -->
    <div style="margin-bottom: 20px; display: flex; gap: 15px;">
        <a href="{{ route('tasks.export') }}" 
           style="padding: 8px 15px; background-color: #4CAF50; color: white; border-radius: 5px; text-decoration: none;">
           Export Tasks
        </a>
        <a href="{{ route('tasks.create') }}" 
           style="padding: 8px 15px; background-color: #2196F3; color: white; border-radius: 5px; text-decoration: none;">
           Create Task
        </a>
    </div>

    <!-- Tasks Table -->
    <table style="width: 100%; border-collapse: collapse; text-align: center; border: 1px solid #ccc;">
        <thead style="background-color: #f2f2f2;">
            <tr>
                <th style="padding: 10px; border: 1px solid #ccc;">Title</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Project</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Status</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Assigned</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Attachment</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td style="padding: 10px; border: 1px solid #ccc;">{{ $task->title }}</td>
                <td style="padding: 10px; border: 1px solid #ccc;">{{ $task->project->name }}</td>
                
                <!-- Status Dropdown -->
                <td style="padding: 10px; border: 1px solid #ccc;">
                    <form method="POST" action="{{ route('tasks.update', $task) }}">
                        @csrf
                        @method('PUT')
                        <select name="status" onchange="this.form.submit()" 
                                style="padding: 5px; border-radius: 5px; border: 1px solid #ccc;">
                            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </form>
                </td>

                <td style="padding: 10px; border: 1px solid #ccc;">{{ $task->assigned_to }}</td>
                
                <td style="padding: 10px; border: 1px solid #ccc;">
                    @if($task->attachment)
                        <a href="{{ asset('storage/' . $task->attachment) }}" target="_blank" 
                           style="color: #2196F3; text-decoration: underline;">
                            View File
                        </a>
                    @else
                        N/A
                    @endif
                </td>

                <!-- Actions -->
                <td style="padding: 10px; border: 1px solid #ccc;">
                    @if(request()->has('trashed'))
                        <!-- Restore Button -->
                        <form method="POST" action="{{ route('tasks.restore', $task->id) }}">
                            @csrf
                            <button type="submit" 
                                    style="padding: 5px 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px;">
                                Restore
                            </button>
                        </form>
                    @else
                        <!-- Soft Delete Button -->
                        <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    style="padding: 5px 10px; background-color: #f44336; color: white; border: none; border-radius: 5px;">
                                Delete
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

</x-app-layout>