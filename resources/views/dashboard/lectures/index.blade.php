<x-dashboard-layout>

    <div class="top p-3"  style="display: flex; justify-content: space-between; align-items: center;">
            <div><h1>All Lectures</h1></div>
            <div><button class="btn btn-dark"><a style="color: #fff" href="{{ route('dashboard.lectures.create') }}">
                Add New Lecture
            </a> </button></div>
        </div>

        @if(session('success'))
            <div class="alert alert-{{ session('type') ?? 'success' }} alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

          <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Video</th>
                <th>Time</th>
                <th>Description</th>
                <th>Course_id</th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lectures as $lecture)
                <tr>
                    <td>{{ $lecture->id }}</td>
                    <td>{{ $lecture->name }}</td>
                    <td>
                        @if ($lecture->image)
                            <img src="{{ asset('uploads/' . $lecture->image) }}" width="80">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $lecture->time }}</td>
                    <td>${{ $lecture->description }}</td>
                    <td>${{ $lecture->course->id }}</td>
                    <td>${{ $lecture->created_at }}</td>

                    <td>
                        <a href="{{ route('dashboard.lectures.edit', $lecture) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('dashboard.lectures.destroy', $lecture) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash me-1"></i></button>
                        </form>
                    </td>
                </tr>
                 @empty
                <tr>
                 <td class="text-center align-middle" colspan="7">No data entered</td>
                </tr>
             @endforelse

        </tbody>
    </table>


</x-dashboard-layout>
