<x-dashboard-layout>
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Show Category</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div>
       <!-- /.container-fluid -->

    <div class="container mt-4">
        <div class="card shadow-lg border-0">
            <div class="row g-0">
                <div class="col-md-5">
                    <img src="{{ asset('uploads/' . $category->image) }}" class="img-fluid rounded-start w-100 h-100 object-fit-cover" alt="{{ $category->name }}">
                </div>
                <div class="col-md-7">
                    <div class="card-body p-4">
<br>
                        <div class="mb-3 d-flex gap-2 align-items-center">
                            <h4 class="fw-bold">Category name : </h4>
                            <h4 class="">{{ $category->name }}</h4>
                        </div>
                        <br>
                        <div class="mb-3 d-flex gap-2">
                            <h4 class="text-secondary">Slug : </h4>
                            <h4 class="text-dark">{{ $category->slug }}</h4>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</x-dashboard-layout>
