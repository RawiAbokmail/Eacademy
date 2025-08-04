<x-dashboard-layout>
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Quiz</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div>
       <!-- /.container-fluid -->

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-dark text-white">
                        <h3 class="mb-0">New Quiz Details</h3>
                    </div>
                    <div class="card-body bg-light">
                        <form action="{{ route('dashboard.quizzes.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <x-form.input type="text" name="title" label="Title" class="form-control rounded-pill" placeholder="Enter Quiz Title" />
                                </div>

                                <div class="form-group col-md-12">
                                    <x-form.select name="course_id" label="Course" class="form-control rounded-pill" >
                                    <option value="" disabled>-- Choose Course --</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                    @endforeach
                                    </x-form.select>
                            </div>

                            {{-- Quiz Duration --}}
                            <div class="mb-3 col-md-6">
                                <label for="duration" class="form-label">Quiz Duration (minutes)</label>
                                <input type="number" name="duration" id="duration" class="form-control" min="1" step="1" value="{{ old('duration') }}" required>
                            </div>

                            {{-- Quiz Start At --}}
                            <div class="mb-3 col-md-6">
                                <label for="starts_at" class="form-label">Quiz Start At</label>
                                <input type="datetime-local" name="starts_at" id="start_at" class="form-control" value="{{ old('start_at') }}" required>
                            </div>

                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-dark btn-lg rounded-pill px-5 shadow">Add Quiz</button>
                                <a href="{{ route('dashboard.quizzes.index') }}" class="btn btn-secondary btn-lg rounded-pill px-5 shadow ml-2">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

 @section('scripts')

<script src="https://cdn.tiny.cloud/1/katzkefytv231v6h875786xbevx11dx1nl9admloyrfxdvt7/6/tinymce.min.js"></script>
    <script>
            tiny.init({
                selector: '#editor',
                height: 400,
                plugins: 'link image code lists',
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | code'
            });
</script>
@endsection

</x-dashboard-layout>
