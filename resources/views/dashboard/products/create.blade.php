<x-dashboard-layout>
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Product</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div>
       <!-- /.container-fluid -->

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-dark text-white">
                        <h3 class="mb-0">New Product Details</h3>
                    </div>
                    <div class="card-body bg-light">
                        <form action="{{ route('dashboard.products.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <x-form.input type="text" name="title" label="Title" class="form-control rounded-pill" placeholder="Enter Product Title" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.input type="number" name="price" label="Price" class="form-control rounded-pill" placeholder="Enter Product Price" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.input type="number" name="quantity" label="Quantity" class="form-control rounded-pill" placeholder="Enter Product Quantity" />
                                </div>

                                <div class="mb-3 col-md-12">
                                <label for="category_id">Category</label>
                                <select name="category_id" class="form-control" required>
                                    <option value="">-- Choose Category --</option>
                                         @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ (old('category_id', $course->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                                             {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                                <div class="form-group col-md-12">
                                    <x-form.textarea name="description" label="Description" class="form-control rounded-pill" placeholder="type your description here.." rows="2" />
                                </div>

                                <div class="form-group col-md-12">
                                    <x-form.input type="file" name="image" label="Main Image" class="form-control rounded-pill" />
                                </div>

                                 <div class="form-group col-md-12">

                                <label for="gallery">Gallery Images (More than one image can be selected.)</label>
                                <input type="file" id="gallery" name="gallery[]"  class="form-control rounded-pill" multiple aria-describedby="galleryHelp" />
+                                     <small id="galleryHelp" class="form-text text-muted">
+                                         You can select multiple images for the product gallery.
+                                     </small>

                            </div>


                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-dark btn-lg rounded-pill px-5 shadow">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-dashboard-layout>
