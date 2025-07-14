<x-dashboard-layout>
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Course</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div>
       <!-- /.container-fluid -->

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-dark text-white">
                        <h3 class="mb-0">New Course Details</h3>
                    </div>
                    <div class="card-body bg-light">
                        <form action="{{ route('dashboard.courses.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <x-form.courseform :course="null" :categories="$categories" :teachers="$teachers" />
                            <button class="btn btn-success">Create Course</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


</x-dashboard-layout>
