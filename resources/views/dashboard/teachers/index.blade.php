<x-dashboard-layout>

    <div class="top p-3"  style="display: flex; justify-content: space-between; align-items: center;">
            <div><h1>All Teachers</h1></div>
            <div><button class="btn btn-dark"><a style="color: #fff" href="{{ route('dashboard.teachers.create') }}">
                Add New Teacher
            </a> </button></div>
        </div>

        @if(session('success'))
            <div class="alert alert-{{ session('type') ?? 'success' }} alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        

         <div class="container p-2">
            <table class="table">
  <thead>
    <tr class="table-info">
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Job</th>
      <th scope="col">Description</th>
      <th scope="col">Bio</th>
      <th scope="col">Created at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($teachers as $teacher)
<tr>
      <th scope="row">{{ $teacher->id }}</th>
      <td>{{ $teacher->name }}</td>
      <td> <img src="{{ asset('uploads/' . $teacher->image) }}" alt="Post Image" width="50" height="50"></td>
      <td>{{ $teacher->job }}</td>
      <td>{{ $teacher->description }}</td>
      <td>{{ $teacher->bio }}</td>
      <td>{{ $teacher->created_at->format('M d, Y') }}</td>
      <td>

                    <a href="{{ route('dashboard.teachers.edit', $teacher->id) }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <form class="d-inline" action="{{ route('dashboard.teachers.destroy',
                    $teacher->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                </form>


                </td>

    </tr>
    @empty
    <tr>
        <td class="text-center" colspan="8">No data entered</td>
    </tr>
    @endforelse

  </tbody>
</table>
{{ $teachers->appends($_GET)->links()}}
        </div>


</x-dashboard-layout>
