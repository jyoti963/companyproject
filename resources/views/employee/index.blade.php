<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>ComapnyProject</title>
  </head>
  <body>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
   @endif
   @if (session('delete'))
    <div class="alert alert-danger">
        {{ session('delete') }}
    </div>
   @endif
    <div class="container mt-5">
        <h1 class="text-center">Employee Data</h1>
        <a class="btn btn-outline-success rounded-pill btn-sm float-end" href="{{ route('employee.create') }}">Add Employee</a>
        <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Employee Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Company Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr>
                  <td>
                      <div class="align-middle text-center">
                          {{ ++$i }}
                      </div>
                  </td>
                  <td class="align-middle text-center">
                    {{ $employee->first_name . " " . $employee->last_name }}
                  </td>
                  <td class="align-middle text-center text-sm">
                      {{ $employee->email }}
                  </td>
                  <td class="align-middle text-center">
                      {{ $employee->mobile }}
                  </td>
                  <td class="align-middle text-center">
                    {{ $employee->companies->name }}
                </td>
                  <td class="align-middle">
                    <a href="{{ route('employee.edit',$employee->id) }}" class="btn btn-outline-primary btn-sm rounded-pill" data-toggle="tooltip" data-original-title="Edit user">
                      Edit
                    </a>
                    <form method="post" action="{{ route('employee.destroy',$employee->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill">Delete</button>
                      </form>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          <div class="row">{{ $employees->links() }}</div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
