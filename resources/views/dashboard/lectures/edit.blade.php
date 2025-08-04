<x-dashboard-layout>
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Lecture</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div>
       <!-- /.container-fluid -->

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-dark text-white">
                        <h3 class="mb-0">Update Lecture Details</h3>
                    </div>
                    <div class="card-body bg-light">
                        <form action="{{ route('dashboard.lectures.update', parameters: $lecture) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <x-form.input name="name" label="Lecture Name" value="{{ $lecture->name }}" />
                            <x-form.input name="time" label="Lecture Time" type="time" value="{{ $lecture->time }}" />
                            <x-form.textarea name="description" label="Lecture Description" value="{{ $lecture->description }}" />

                                    <x-form.select name="course_id" label="Course">
                                        <option value="" disabled>-- Choose Course --</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}" {{ old('course_id', $lecture->course_id ?? '') == $course->id ? 'selected' : '' }}>{{ $course->title }}</option>
                                        @endforeach
                                    </x-form.select>
                            <x-form.input name="video" label="Lecture Video" class="form-control rounded-pill" type="file" value="{{ $lecture->video }}" />

                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-dark btn-lg rounded-pill px-5 shadow">Update Lecture</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-dashboard-layout>
