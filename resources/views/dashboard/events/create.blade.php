<x-dashboard-layout>
     <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Event</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div>
       <!-- /.container-fluid -->

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-dark text-white">
                        <h3 class="mb-0">New Event Details</h3>
                    </div>
                    <div class="card-body bg-light">
                        <form action="{{ route('dashboard.events.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <x-form.input type="text" name="title" label="Title" class="form-control rounded-pill" placeholder="Enter Event Title" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.input type="file" name="image" label="Image" class="form-control rounded-pill" />
                                </div>

                                <div class="form-group col-md-6">
                                    <x-form.input type="date" name="duration" label="Duration" class="form-control rounded-pill" placeholder="Enter Event Duration" />
                                </div>

                                 <div class="form-group col-md-3">
                                    <x-form.input type="time" name="time_start" label="Time Start" class="form-control rounded-pill" placeholder="Enter Event Time Start" />
                                </div>

                                <div class="form-group col-md-3">
                                    <x-form.input type="time" name="time_end" label="Time End" class="form-control rounded-pill" placeholder="Enter Event Time End" />
                                </div>

                                <div class="form-group col-md-12">
                                    <x-form.input type="text" name="location" label="Location" class="form-control rounded-pill" placeholder="Enter Event Location" />
                                </div>

                                <div class="form-group col-md-12">
                                    <x-form.textarea name="description" label="Description" class="form-control rounded-pill" placeholder="type your description here.." rows="2" />
                                </div>

                                <div class="form-group col-md-12">
                                    <x-form.textarea name="content" label="Content" class="form-control rounded-pill" placeholder="type your content here.." />
                                </div>


                            </div>


                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-dark btn-lg rounded-pill px-5 shadow">Add Event</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-dashboard-layout>
