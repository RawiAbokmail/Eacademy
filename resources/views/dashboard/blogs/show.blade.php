<x-dashboard-layout>
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Show Blog</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div>
       <!-- /.container-fluid -->

    <div class="container mt-4">
        <div class="card shadow-lg border-0">
            <div class="row g-0">
                <div class="col-md-5">
                    <img src="{{ asset('uploads/' . $blog->image) }}" class="img-fluid rounded-start w-100 h-100 object-fit-cover" alt="{{ $blog->title }}">
                </div>
                <div class="col-md-7">
                    <div class="card-body p-4">

                        <span class="badge bg-primary mb-2">{{ $blog->category->name ?? 'Uncategorized' }}</span>
                        <h2 class="card-title fw-bold">{{ $blog->title }}</h2>
                        <h5 class="card-subtitle mb-3 text-muted">{{ $blog->sub_title }}</h5>
                        <div class="mb-3">
                            <span class="text-secondary small">Slug:</span>
                            <span class="text-dark">{{ $blog->slug }}</span>
                        </div>
                        <div class="card-text" style="font-size: 1.1rem;">
                            {!! nl2br(e($blog->content)) !!}
                        </div>
                        <strong>Blog Tags : </strong>
                        @foreach ($blog->tags as $tag)
                            <span class="badge bg-info">{{ $tag->name }}</span>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-dashboard-layout>
