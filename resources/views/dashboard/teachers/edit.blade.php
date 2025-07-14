<x-dashboard-layout>
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Teacher</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div>
       <!-- /.container-fluid -->

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-dark text-white">
                        <h3 class="mb-0">Update Teacher Details</h3>
                    </div>
                    <div class="card-body bg-light">
                        <form action="{{ route('dashboard.teachers.update', $teacher->id) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <x-form.input type="text" name="name" label="Full Name" class="form-control rounded-pill" placeholder="Enter full name" value="{{ $teacher->name }}" />
                                </div>

                                 <div class="form-group col-md-6">
                                    <x-form.input type="file" name="image" label="Image" class="form-control rounded-pill" />
                                    <img class="img-thumbnail mt-1" src="{{ asset('uploads/' . $teacher->image) }}" width="40" class="mt-2" style="border-radius: 50%">

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <x-form.input type="text" name="job" label="Job" class="form-control rounded-pill" placeholder="Enter your job" value="{{ $teacher->job }}" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.input type="text" name="description" label="Description" class="form-control rounded-pill" placeholder="type your message"  value="{{ $teacher->description }}" />
                                </div>

                                <div class="form-group col-md-12">
                                    <x-form.textarea name="bio" label="Bio" class="form-control rounded-pill" placeholder="type your bio here.." value="{{ $teacher->bio }}" />
                                </div>

                            </div>

                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-dark btn-lg rounded-pill px-5 shadow">Update Teacher</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-dashboard-layout>
