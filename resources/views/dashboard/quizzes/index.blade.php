<x-dashboard-layout>

    <div class="top p-3"  style="display: flex; justify-content: space-between; align-items: center;">
            <div><h1>All Quizzes</h1></div>
            <div><button class="btn btn-dark"><a style="color: #fff" href="{{ route('dashboard.quizzes.create') }}">
                Add New Quiz
            </a> </button></div>
        </div>

        @if(session('success'))
            <div class="alert alert-{{ session('type') ?? 'success' }} alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

         <div class="container p-2">


<table class="table table-bordered text-center align-middle w-100">
  <thead>
    <tr class="table-info">
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Duration</th>
      <th scope="col">Starts At</th>
      <th scope="col">Course_title</th>
      <th scope="col">Created at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($quizzes as $quiz)
      <tr>
        <th scope="row" class="align-middle">{{ $quiz->id }}</th>
        <td class="align-middle">{{ $quiz->title }}</td>
        <td class="align-middle">{{ $quiz->duration }}</td>
        <td class="align-middle">{{ $quiz->starts_at }}</td>
        <td class="align-middle">{{ $quiz->course->title ?? 'N/A' }}</td>
        <td class="align-middle">{{ $quiz->created_at->format('M d, Y') }}</td>
        <td class="align-middle">
          <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
            <a href="{{ route('dashboard.quizzes.show', $quiz) }}" class="btn btn-sm btn-success d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-eye me-1"></i>
            </a>

            <a href="{{ route('dashboard.quizzes.results', $quiz) }}" class="btn btn-primary btn-sm">
                View Results</a>


            <a href="{{ route('dashboard.quizzes.questions.index', $quiz) }}" class="btn btn-sm btn-secondary">Questions</a>


            <a href="{{ route('dashboard.quizzes.edit', $quiz) }}" class="btn btn-sm btn-primary d-flex align-items-center justify-content-center">
              <i class="fa fa-edit me-1"></i>
            </a>

            <form class="d-inline" action="{{ route('dashboard.quizzes.destroy', $quiz) }}" method="post">
              @csrf
              @method('delete')
              <button class="btn btn-sm btn-danger d-flex align-items-center justify-content-center">
                <i class="fa fa-trash me-1"></i>
              </button>
            </form>
          </div>
        </td>
      </tr>
    @empty
      <tr>
        <td class="text-center align-middle" colspan="7">No data entered</td>
      </tr>
    @endforelse
  </tbody>
</table>
{{ $quizzes->appends($_GET)->links()}}
        </div>


</x-dashboard-layout>
