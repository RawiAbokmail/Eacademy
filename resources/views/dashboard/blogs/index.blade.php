<x-dashboard-layout>

    <div class="top p-3"  style="display: flex; justify-content: space-between; align-items: center;">
            <div><h1>All Blogs</h1></div>
            <div><button class="btn btn-dark"><a style="color: #fff" href="{{ route('dashboard.blogs.create') }}">
                Add New Blog
            </a> </button></div>
        </div>

        @if(session('success'))
            <div class="alert alert-{{ session('type') ?? 'success' }} alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

         <div class="container p-2">


<table class="table table-bordered text-center align-middle w-100">
  <thead>
    <tr class="table-info">
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      {{-- <th scope="col">Sub_Title</th> --}}
      <th scope="col">Content</th>
      <th scope="col">Image</th>
      <th scope="col">Category_id</th>
      <th scope="col">Tags</th>
      <th scope="col">Created at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($blogs as $blog)
      <tr>
        <th scope="row" class="align-middle">{{ $blog->id }}</th>
        <td class="align-middle">{{ $blog->title }}</td>
        {{-- <td class="align-middle">{{ $blog->sub_title }}</td> --}}
        <td class="align-middle">{{ $blog->content }}</td>
        <td class="align-middle">
          <div class="d-flex justify-content-center align-items-center" style="height: 100px;">
            <img src="{{ asset('uploads/' . $blog->image) }}" alt="Post Image" style="max-width: 100px; max-height: 100px;">
          </div>
        </td>
        <td class="align-middle">{{ $blog->category_id }}</td>
        <td class="align-middle">
            @foreach ($blog->tags as $tag)
            <span class="badge bg-info">{{ $tag->name }}</span>
            @endforeach
        </td>
        <td class="align-middle">{{ $blog->created_at->format('M d, Y') }}</td>
        <td class="align-middle">
          <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
            <a href="{{ route('dashboard.blogs.show', $blog) }}" class="btn btn-sm btn-success d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-eye me-1"></i>
            </a>

            <a href="{{ route('dashboard.blogs.edit', $blog) }}" class="btn btn-sm btn-primary d-flex align-items-center justify-content-center">
              <i class="fa fa-edit me-1"></i>
            </a>

            <form class="d-inline" action="{{ route('dashboard.blogs.destroy', $blog) }}" method="post">
              @csrf
              @method('delete')
              <button class="btn btn-sm btn-danger d-flex align-items-center justify-content-center">
                <i class="fa fa-trash me-1"></i>
              </button>
            </form>
          </div>
        </td>
      </tr>
    @empty
      <tr>
        <td class="text-center align-middle" colspan="9">No data entered</td>
      </tr>
    @endforelse
  </tbody>
</table>
{{ $blogs->appends($_GET)->links()}}
        </div>


</x-dashboard-layout>
