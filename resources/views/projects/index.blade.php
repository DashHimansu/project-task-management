<x-app-layout>

<div style="width: 80%; margin: 40px auto;">

    <div style="margin-bottom: 20px; text-align: right;">
        <a href="{{ route('projects.create') }}" 
           style="padding: 8px 15px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 4px;">
            Create Project
        </a>
    </div>

    <table border="1" style="width: 100%; border-collapse: collapse; text-align: center;">
        <tr style="background-color: #f2f2f2;">
            <th style="padding: 10px;">Name</th>
            <th style="padding: 10px;">Task Count</th>
            <th style="padding: 10px;">Action</th>
        </tr>

        @foreach($projects as $project)
        <tr>
            <td style="padding: 10px;">{{ $project->name }}</td>
            <td style="padding: 10px;">{{ $project->tasks_count }}</td>
            <td style="padding: 10px;">
                <a href="{{ route('projects.edit',$project) }}" 
                   style="margin-right: 10px;">Edit</a>

                <form method="POST" 
                      action="{{ route('projects.destroy',$project) }}" 
                      style="display: inline;">
                    @csrf 
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>

</div>

</x-app-layout>