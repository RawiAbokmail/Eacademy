<x-dashboard-layout>
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Show Lecture</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div>
       <!-- /.container-fluid -->

    <div class="container mt-4">
        <div class="card shadow-lg border-0">
            <div class="row g-0">
                <div class="col-md-5">
                    <video src="{{ asset('uploads/' . $lecture->video) }}" class="img-fluid rounded-start w-100 h-100 object-fit-cover" controls alt="{{ $lecture->name }}">
                    </video>
                </div>
                <div class="col-md-7">
                    <div class="card-body p-4">

                        <span class="badge bg-primary mb-2">{{ $lecture->course->title ?? 'Uncategorized' }}</span>
                        <h2 class="card-title fw-bold">{{ $lecture->name }}</h2>
                        <div class="card-text" style="font-size: 1.1rem;">
                            {!! nl2br(e($lecture->description)) !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</x-dashboard-layout>
