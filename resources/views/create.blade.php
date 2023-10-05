{{-- @extends('master')

@section('content') --}}
<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}

    </h2>

</x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                Hello    You're logged in!
                </div>

        @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }}</li>

            @endforeach
        </ul>
    </div>
@endif
        <form action="{{route('task.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1>Task List:</h1>
            <!-- To keep old value for some input fields after submitting form, we have to use old() helper function     -->
            <div class="mb-3">
                <label for="exampleInputProductname1" class="form-label"><strong>Task Name</strong></label>
                <input type="text" name="task_name" value="" class="form-control" id="exampleInputProductname1">
              </div>
              <div class="mb-3">
                <label class="form-label"><strong>Task Category </strong></label>
                <select name="task_cate"  class="form-select" aria-label="Default select example">
                    <option selected>select category</option>
                     <option value="A" {{ old('task_cate') == 'A' ? 'selected' : '' }} >A</option>
                    <option value="B" {{ old('task_cate') == 'B' ? 'selected' : '' }} >B</option>
                    <option value="C"{{ old('task_cate') == 'C' ? 'selected' : '' }}>C</option>
                </select>
             </div>

             <div class="mb-3">
                <label class="form-label"><strong>Task Description Size</strong></label>
                <!-- for update laravel 9, <input type="checkbox" name="active" value="active" /* @checked*/(old('active', $someVariableOrValue )) />          -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="task_desc_size[]" value="large" id="flexCheckDefault"  >
                <label class="form-check-label" for="flexCheckDefault">
                  Large
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="task_desc_size[]" value="Medium" id="flexCheckDefault"  >
                <label class="form-check-label" for="flexCheckDefault">
                  Medium
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="task_desc_size[]" value="Short" id="flexCheckDefault"  >
                <label class="form-check-label" for="flexCheckDefault">
                  Short
                </label>
              </div>
              </div>

            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Task Level</strong></label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="task_level" value="First Class" id="flexRadioDefault1" >
                <label class="form-check-label" for="flexRadioDefault1">
                    First Class
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="task_level" value="Second Class" id="flexRadioDefault2"  >
                <label class="form-check-label" for="flexRadioDefault2">
                    Second Class
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="task_level" value="Third Class" id="flexRadioDefault3" >
                <label class="form-check-label" for="flexRadioDefault3">
                    Third Class
                </label>
              </div>
            </div>


                {{-- @error('product_price')
                <p style="color: red">{{$message}}</p>
               @enderror --}}


              <div class="mb-3">
                <label for="formFile" class="form-label"><strong>Task photo</strong></label>
                <input class="form-control" type="file" name="task_photo" id="formFile">
              </div>
              <label for="floatingTextarea1" class="form-label"><strong>Task Description</strong></label>
              <div class="form-floating">

              <textarea class="form-control" style="height: 100px" name="task_desc" placeholder="Product Description" id="floatingTextarea"></textarea>

              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><strong>Submit Email address</strong></label>
                <input type="email"  class="form-control" value="" name="submit_email" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text"> Email </div>
              </div>


            <button type="submit" class="btn btn-primary">Submit</button>
          </form>


            </div>
        </div>
    </div>
{{-- @endsection --}}
</x-app-layout>
