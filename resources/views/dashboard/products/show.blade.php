<x-dashboard-layout>
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Show Product</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div>
       <!-- /.container-fluid -->

    <div class="container mt-4">
        <div class="card shadow-lg border-0">
            <div class="row g-0">
                <div class="col-md-5">
                    <img src="{{ asset('products/' . $product->image) }}" class="img-fluid rounded-start w-100 h-100 object-fit-cover" alt="{{ $product->title }}">
                </div>
                <div class="col-md-7">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <h2 class="card-title fw-bold">{{ $product->title }}</h2>
                        </div>
                        <br>

                        <div class="mb3">
                            <h5>Price of : {{ $product->price }}</h5>
                        </div>

                        <div class="mb3">
                            <h5>Quantity of : {{ $product->quantity }}</h5>
                        </div>


                        <div class="mb-3">
                            <span class="text-secondary small">Slug:</span>
                            <span class="text-dark">{{ $product->slug }}</span>
                        </div>
                        <div class="card-text" style="font-size: 1.1rem;">
                            {!! nl2br(e($product->description)) !!}
                        </div>
                        <br>

                        <div class="mb-3">
                            <h5>Gallery Images:</h5>
                            <div class="row">
                                @foreach ($product->gallery as $galleryImage)
                                    <div class="col-md-3 mb-2">
                                        <img src="{{ asset('products/' . $galleryImage->image) }}" class="img-thumbnail" alt="Gallery Image" style="width: 100%; height: auto;">
                                    </div>
                                @endforeach
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</x-dashboard-layout>
