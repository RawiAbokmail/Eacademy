<x-dashboard-layout>

    <div class="top p-3"  style="display: flex; justify-content: space-between; align-items: center;">
            <div><h1>All Tags</h1></div>
            <div><button class="btn btn-dark"><a style="color: #fff" href="{{ route('dashboard.tags.create') }}">
                Add New Tag
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
      <th scope="col">Created at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($tags as $tag)
<tr>
      <th scope="row">{{ $tag->id }}</th>
      <td>{{ $tag->name }}</td>
      <td>{{ $tag->created_at->format('M d, Y') }}</td>
      <td>

                    <div class="d-flex align-items-center gap-2 h-100">

                    <a href="{{ route('dashboard.tags.edit', $tag->id) }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-edit"></i> Edit
                    </a>

                    <form class="d-inline" action="{{ route('dashboard.tags.destroy',
                    $tag->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                </form>
                    </div>


                </td>

    </tr>
    @empty
    <tr>
        <td class="text-center" colspan="4">No data entered</td>
    </tr>
    @endforelse

  </tbody>
</table>
{{ $tags->appends($_GET)->links()}}
        </div>


</x-dashboard-layout>
