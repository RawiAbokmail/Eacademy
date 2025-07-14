<x-dashboard-layout>
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create User</h1>
          </div><!-- /.col -->
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>

            </ol>
          </div><!-- /.col --> --}}
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-dark text-white">
                        <h3 class="mb-0">New User Details</h3>
                    </div>
                    <div class="card-body bg-light">
                        <form action="{{ route('dashboard.users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <x-form.input type="text" name="name" label="Full Name" class="form-control rounded-pill" placeholder="Enter full name" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.input type="email" name="email" label="Email Address" class="form-control rounded-pill" placeholder="Enter email" />
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <x-form.input type="password" name="password" label="Password" class="form-control rounded-pill" placeholder="Enter password" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.input type="file" name="image" label="Image" class="form-control rounded-pill" />
                                </div>
                            </div>

                             <div class="form-group">
                                <label for="role" class="font-weight-bold">Role</label>
                                <select class="form-control rounded-pill" id="role" name="role">
                                    <option value="" disabled selected>Select role</option>
                                    <option value="admin">Admin</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="student">Student</option>
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <x-form.input type="text" name="job" label="Job" class="form-control rounded-pill" placeholder="Enter your job" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.input type="text" name="description" label="Description" class="form-control rounded-pill" placeholder="Enter your description" />
                                </div>

                                <div class="form-group col-md-12">
                                    <x-form.textarea name="bio" label="Bio" class="form-control rounded-pill" placeholder="type your bio here.." />
                                </div>


                            </div>

                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-dark btn-lg rounded-pill px-5 shadow">Add User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-dashboard-layout>
