<x-dashboard-layout>


        <div class="top p-3"  style="display: flex; justify-content: space-between; align-items: center;">
            <div><h1>All Users</h1></div>
            <div><button class="btn btn-dark"><a style="color: #fff" href="{{ route('dashboard.users.create') }}">
                Add New User
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
      <th scope="col">Email</th>
      <th scope="col">Created at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>


    @forelse ($users as $user)
<tr>
      <th scope="row">{{ $user->id }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->created_at->format('M d, Y') }}</td>
      <td>

                    <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <form class="d-inline" action="{{ route('dashboard.users.destroy',
                    $user->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                </form>


                </td>

    </tr>
    @empty
    <tr>
        <td class="text-center" colspan="5">No data entered</td>
    </tr>
    @endforelse

  </tbody>
</table>
{{ $users->appends($_GET)->links()}}
        </div>



</x-dashboard-layout>


