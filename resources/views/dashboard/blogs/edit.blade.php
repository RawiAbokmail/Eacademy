<x-dashboard-layout>
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Blog</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div>
       <!-- /.container-fluid -->

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-dark text-white">
                        <h3 class="mb-0">Update Blog Details</h3>
                    </div>
                    <div class="card-body bg-light">
                        <form action="{{ route('dashboard.blogs.update', parameters: $blog) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <x-form.input type="text" name="title" label="Title" class="form-control rounded-pill" placeholder="Enter Blog Title" value="{{ $blog->title }}" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.input type="text" name="sub_title" label="Sub Title" class="form-control rounded-pill" placeholder="Enter Sub Title" value="{{ $blog->sub_title }}" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.input type="file" name="image" label="Image" class="form-control rounded-pill" value="{{ $blog->image }}" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.select name="category_id" label="Choose Category" class="form-control rounded-pill">
                                        <option value="">--  Choose Category  --</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                    {{ old('category_id', $blog->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                    </option>
                                    @endforeach
                                    </x-form.select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="tags">Tags</label>
                                    <select name="tags[]" id="tags" class="form-control" multiple>
                                    @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                        {{ in_array($tag->id, old('tags', $blog->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                                        {{ $tag->name }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <x-form.textarea name="content" label="Content" class="form-control rounded-pill" placeholder="type your content here.." value="{{ $blog->content }}" />
                                </div>


                            </div>

                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-dark btn-lg rounded-pill px-5 shadow">Update Blog</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-dashboard-layout>
