<x-dashboard-layout>

    <div class="top p-3"  style="display: flex; justify-content: space-between; align-items: center;">
            <div><h1>All Categories</h1></div>
            <div><button class="btn btn-dark"><a style="color: #fff" href="{{ route('dashboard.categories.create') }}">
                Add New Category
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
      <th scope="col">Created at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($categories as $category)
<tr>
      <th scope="row">{{ $category->id }}</th>
      <td>{{ $category->name }}</td>
      <td> <img src="{{ asset('uploads/' . $category->image) }}" alt="Post Image" width="50" height="50"></td>
      <td>{{ $category->created_at->format('M d, Y') }}</td>
      <td>

                    <div class="d-flex justify-content-center align-items-center gap-2 h-100">
                        <a href="{{ route('dashboard.categories.show', parameters: $category) }}" class="btn btn-sm btn-success">
                        <i class="fa-solid fa-eye"></i> Show
                    </a>

                    <a href="{{ route('dashboard.categories.edit', $category) }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-edit"></i> Edit
                    </a>

                    <form class="d-inline" action="{{ route('dashboard.categories.destroy',
                    $category) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                </form>
                    </div>


                </td>

    </tr>
    @empty
    <tr>
        <td class="text-center" colspan="8">No data entered</td>
    </tr>
    @endforelse

  </tbody>
</table>
{{ $categories->appends($_GET)->links()}}
        </div>


</x-dashboard-layout>
