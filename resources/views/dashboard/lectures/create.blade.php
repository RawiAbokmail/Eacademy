<x-dashboard-layout>
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Leacture</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div>
       <!-- /.container-fluid -->

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-dark text-white">
                        <h3 class="mb-0">New Lecture Details</h3>
                    </div>
                    <div class="card-body bg-light">
                        <form action="{{ route('dashboard.lectures.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <x-form.input name="name" label="Lecture Name" />
                            <x-form.input name="time" label="Lecture Time" type="time" />
                            <x-form.textarea name="description" label="Lecture Description" />

                                    <x-form.select name="course_id" label="Course">
                                        <option value="" disabled>-- Choose Course --</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                                        @endforeach
                                    </x-form.select>
                            <x-form.input name="video" label="Lecture Video" type="file"/>


                            <button class="btn btn-success">Create Lecture</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


</x-dashboard-layout>
