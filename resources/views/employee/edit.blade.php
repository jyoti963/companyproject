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
    <div class="container">
        <h1 class="text-center mt-5">Edit Employee Data</h1>
        <a class="btn btn-outline-danger rounded-pill btn-sm float-end" href="{{ route('employee.index') }}">Back</a>
    <div class="d-flex justify-content-center align-items-center ">

        <form action="{{ route('employee.store',$employee->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="mb-3 ">
                    <label for="name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="name" name="first_name" value="{{ old('first_name',$employee->first_name) }}">
                </div>
                <div class="mb-3 ">
                    <label for="name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="name" name="last_name" value="{{ old('last_name',$employee->last_name) }}">
                </div>
                <div class="mb-3 ">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email',$employee->email) }}">
                </div>
                <div class="mb-3 ">
                    <label for="exampleInputPassword1" class="form-label">Mobile</label>
                    <input type="text" class="form-control" name="mobile" value="{{ old('mobile',$employee->mobile) }}">
                </div>
                <div class="mb-3 ">
                    <label for="exampleInputEmail1" class="form-label">Select Company</label>
                    <select name="company" id="" class="form-control">
                        <option value="">--Select Company--</option>
                        @foreach($company as $value)
                        <option value="{{ $value->id }}" @if($employee->company_id == $value->id)
                            selected
                         @endif>{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
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
