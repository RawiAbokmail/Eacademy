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
            <div class="search-sort mb-3">
                <form method="GET" action="{{ route('dashboard.users.index') }}" class="row g-2 align-items-center">
                    <div class="col-md-6">
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control"
                            placeholder="Search by name or email..."
                            aria-label="Search Users"
                        >
                    </div>
                    <div class="col-md-4">
                        <select
                            name="sort_by"
                            class="form-select"
                            aria-label="Filter by Role"
                        >
                            <option value="">All Roles</option>
                            <option value="student" {{ request('sort_by') == 'student' ? 'selected' : '' }}>student</option>
                            <option value="teacher" {{ request('sort_by') == 'teacher' ? 'selected' : '' }}>Teacher</option>
                            <option value="admin" {{ request('sort_by') == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>
                    <div class="col-md-2 d-grid">
                        <button type="submit" class="btn btn-dark">
                            <i class="fa fa-search"></i> Search
                        </button>
                    </div>
                </form>
            </div>
            <table class="table">
  <thead>
    <tr class="table-info">
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
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
      <td>{{ ucfirst($user->role) }}</td>
      <td>{{ $user->created_at->format('M d, Y') }}</td>
      <td>

                    <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    @if($user->role !== 'admin')
                    <form class="d-inline" action="{{ route('dashboard.users.destroy',
                    $user->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                </form>
                    @endif


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


