<x-dashboard-layout>
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Tag</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div>
       <!-- /.container-fluid -->

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-dark text-white">
                        <h3 class="mb-0">New Tag Details</h3>
                    </div>
                    <div class="card-body bg-light">
                        <form action="{{ route('dashboard.tags.store') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <x-form.input type="text" name="name" label="Tag Name" class="form-control rounded-pill" placeholder="Enter tag name" />
                                </div>

                            </div>


                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-dark btn-lg rounded-pill px-5 shadow">Add Tag</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-dashboard-layout>
