<x-dashboard-layout>
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Quiz</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div>
       <!-- /.container-fluid -->

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-dark text-white">
                        <h3 class="mb-0">Update Quiz Details</h3>
                    </div>
                    <div class="card-body bg-light">
                        <form action="{{ route('dashboard.quizzes.update', parameters: $quiz) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <x-form.input type="text" name="title" label="Title" class="form-control rounded-pill" placeholder="Enter Quiz Title" value="{{ $quiz->title }}" />
                                </div>

                                <div class="form-group col-md-12">
                                    <x-form.select name="course_id" label="Course" class="form-control rounded-pill">
                                        <option value="" disabled>-- Choose Course --</option>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}" {{ $quiz->course_id == $course->id ? 'selected' : '' }}>{{ $course->title }}</option>
                                        @endforeach
                                    </x-form.select>

                            </div>

                            {{-- Quiz Duration --}}
                            <div class="mb-3 col-md-6">
                                <label for="duration" class="form-label">Quiz Duration (minutes)</label>
                                <input type="number" name="duration" id="duration" class="form-control" min="1" step="1" value="{{ old('duration', $quiz->duration) }}" required>
                            </div>

                            {{-- Quiz Start At --}}
                            <div class="mb-3 col-md-6">
                                <label for="starts_at" class="form-label">Quiz Start At</label>
                                <input type="datetime-local" name="starts_at" id="start_at" class="form-control" value="{{ old('starts_at', $quiz->starts_at) }}" required>
                            </div>

                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-dark btn-lg rounded-pill px-5 shadow">Update Quiz</button>
                                <a href="{{ route('dashboard.quizzes.index') }}" class="btn btn-secondary btn-lg rounded-pill px-5 shadow ml-2">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-dashboard-layout>
