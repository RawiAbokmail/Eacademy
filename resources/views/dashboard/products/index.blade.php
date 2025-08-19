<x-dashboard-layout>

    <div class="top p-3"  style="display: flex; justify-content: space-between; align-items: center;">
            <div><h1>All Products</h1></div>
            <div><button class="btn btn-dark"><a style="color: #fff" href="{{ route('dashboard.products.create') }}">
                Add New Product
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
      <th scope="col">Description</th>
      <th scope="col">category_id</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Image</th>
      <th scope="col">Created at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($products as $product)
      <tr>
        <th scope="row" class="align-middle">{{ $product->id }}</th>
        <td class="align-middle">{{ $product->title }}</td>
        <td class="align-middle">{{ $product->description }}</td>
        <td class="align-middle">{{ $product->category_id }}</td>
        <td class="align-middle">{{ $product->price }}</td>
        <td class="align-middle">{{ $product->quantity }}</td>
        <td class="align-middle">
            <div class="d-flex justify-content-center align-items-center" style="height: 100px;">
            <img src="{{ asset('products/' . $product->image) }}" alt="Post Image" style="max-width: 100px; max-height: 100px;">
            </div>
    </td>
        <td class="align-middle">{{ $product->created_at->format('M d, Y') }}</td>
        <td class="align-middle">
          <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
            <a href="{{ route('dashboard.products.show', $product) }}" class="btn btn-sm btn-success d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-eye me-1"></i>
            </a>

            <a href="{{ route('dashboard.products.edit', $product) }}" class="btn btn-sm btn-primary d-flex align-items-center justify-content-center">
              <i class="fa fa-edit me-1"></i>
            </a>

            <form class="d-inline" action="{{ route('dashboard.products.destroy', parameters: $product) }}" method="post">
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
{{ $products->appends($_GET)->links()}}
        </div>


</x-dashboard-layout>
