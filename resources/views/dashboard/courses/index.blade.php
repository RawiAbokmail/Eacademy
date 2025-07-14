<x-dashboard-layout>

    <div class="top p-3"  style="display: flex; justify-content: space-between; align-items: center;">
            <div><h1>All Courses</h1></div>
            <div><button class="btn btn-dark"><a style="color: #fff" href="{{ route('dashboard.courses.create') }}">
                Add New Course
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
                <th>Title</th>
                <th>Category</th>
                <th>Teacher</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->category->name }}</td>
                    <td>{{ $course->teacher->name }}</td>
                    <td>${{ $course->price }}</td>
                    <td>
                        @if ($course->image)
                            <img src="{{ asset('uploads/' . $course->image) }}" width="80">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('dashboard.courses.edit', $course) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('dashboard.courses.destroy', $course) }}" method="POST" class="d-inline"
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
