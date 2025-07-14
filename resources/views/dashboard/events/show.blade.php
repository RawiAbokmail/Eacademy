<x-dashboard-layout>
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Show Event</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div>
       <!-- /.container-fluid -->

    <div class="container mt-4">
        <div class="card shadow-lg border-0">
            <div class="row g-0">
                <div class="col-md-5">
                    <img src="{{ asset('uploads/' . $event->image) }}" class="img-fluid rounded-start w-100 h-100 object-fit-cover" alt="{{ $event->title }}">
                </div>
                <div class="col-md-7">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <span><i class="fa fa-calendar"></i> {{ $event->duration }}</span>
                        </div>
                        <div class="mb-3">
                            <h2 class="card-title fw-bold">{{ $event->title }}</h2>
                        </div>
                        <br>
                        <div class="mb-3">
                            <span><i class="fa fa-clock-o"></i> {{ $event->time_start }} - {{ $event->time_end }}</span>
                        </div>
                        <span><i class="fa fa-map-marker"></i> {{ $event->location }}</span>
                        <div class="mb-3">
                            <span class="text-secondary small">Slug:</span>
                            <span class="text-dark">{{ $event->slug }}</span>
                        </div>
                        <div class="card-text" style="font-size: 1.1rem;">
                            {!! nl2br(e($event->description)) !!}
                        </div>
                        <br>
                         <div class="card-text" style="font-size: 1.1rem;">
                            {!! nl2br(e($event->content)) !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</x-dashboard-layout>
