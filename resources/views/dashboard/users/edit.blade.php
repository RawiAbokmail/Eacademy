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
                        <form action="{{ route('dashboard.users.update', $user->id) }}" method="post" >
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <x-form.input type="text" name="name" label="Full Name" class="form-control rounded-pill" placeholder="Enter full name" value="{{ $user->name }}" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.input type="email" name="email" label="Email Address" class="form-control rounded-pill" placeholder="Enter email" value="{{ $user->email }}" />
                                </div>
                            </div>
                            {{-- <div class="form-row">
                                <div class="form-group col-md-12">
                                    <x-form.input type="password" name="password" label="Password" class="form-control rounded-pill" placeholder="Enter password"  />
                                </div>

                            </div> --}}
                            {{-- <div class="form-group">
                                <label for="role" class="font-weight-bold">Role</label>
                                <select class="form-control rounded-pill" id="role" name="role">
                                    <option value="" disabled selected>Select role</option>
                                    <option value="admin">Admin</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="student">Student</option>
                                </select>
                            </div> --}}
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
