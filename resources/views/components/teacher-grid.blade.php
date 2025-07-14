<div class="row">
              @foreach ($teachers as $teacher)
             <div class="col-lg-3 col-sm-6">
                   <div class="singel-teachers mt-30 text-center">
                        <div class="image">
                            <img src="{{ asset('uploads/' . $teacher->image) }}" alt="Teachers">
                        </div>
                        <div class="cont">
                            <a href="{{ route('eacademy.teachers-single', $teacher->id) }}"><h6>{{ $teacher->name }}</h6></a>
                            <span>{{ $teacher->job }}</span>
                        </div>
                    </div> <!-- singel teachers -->
               </div>
              @endforeach

           </div> <!-- row -->
