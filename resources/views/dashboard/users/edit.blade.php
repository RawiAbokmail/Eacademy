<x-dashboard-layout>
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update User</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-dark text-white">
                        <h3 class="mb-0">Update User Details</h3>
                    </div>
                    <div class="card-body bg-light">
                        <form action="{{ route('dashboard.users.update', $user->id) }}" method="post" enctype="multipart/form-data" >
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <x-form.input type="text" name="name" label="Full Name" class="form-control rounded-pill" placeholder="Enter full name" value="{{ $user->name }}"/>
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.input type="email" name="email" label="Email Address" class="form-control rounded-pill" placeholder="Enter email" value="{{ $user->email }}"/>
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <x-form.input type="file" name="image" label="Image" class="form-control rounded-pill"   value="{{ $user->image }}"/>
                                </div>
                            </div>

                             <div class="form-group">
                                <label for="role" class="font-weight-bold">Role</label>
                                <select class="form-control rounded-pill" id="role" name="role">
                                    <option value="" disabled>Select role</option>
                                    <option value="admin" value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="teacher" value="admin" {{ old('role', $user->role) == 'teacher' ? 'selected' : '' }}>Teacher</option>
                                    <option value="student" value="admin" {{ old('role', $user->role) == 'student' ? 'selected' : '' }}>Student</option>
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <x-form.input type="text" name="job" label="Job" class="form-control rounded-pill" placeholder="Enter your job" value="{{ $user->job }}"/>
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.input type="text" name="description" label="Description" class="form-control rounded-pill" placeholder="Enter your description" value="{{ $user->description }}"/>
                                </div>

                                <div class="form-group col-md-12">
                                    <x-form.textarea name="bio" label="Bio" class="form-control rounded-pill" placeholder="type your bio here.." value="{{ $user->bio }}"/>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <x-form.textarea name="about" label="About" class="form-control rounded-pill" placeholder="type your about here.." value="{{ $user->about }}" />
                                </div>

                                <div class="form-group col-md-12">
                                    <x-form.textarea name="achievements" label="Achievements" class="form-control rounded-pill" placeholder="type your achievements here.." value="{{ $user->achievements }}" />
                                </div>

                                <div class="form-group col-md-12">
                                    <x-form.textarea name="objective" label="Objective" class="form-control rounded-pill" placeholder="type your objective here.." value="{{ $user->objective }}" />
                                </div>
                            </div>

                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-dark btn-lg rounded-pill px-5 shadow">Update User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-dashboard-layout>
