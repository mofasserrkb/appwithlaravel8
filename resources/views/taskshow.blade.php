
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



                <h1>Task</h1>
               <div>
                <a class="btn btn-primary " href="{{route('task.index')}}">Back </a>
               </div>

                <div class="mb-3">
                    <label for="exampleInputProductname1" class="form-label"><strong>Task Name</strong></label>
                    {{$task->task_name}}
                  </div>
                  <div class="mb-3">
                    <label class="form-label"><strong>Task Category </strong></label>
                    {{$task->task_cate}}
                 </div>

                 <div class="mb-3">
                    <label class="form-label"><strong>Task Description Size</strong></label>

                  <div class="form-check">

                    <label class="form-check-label" for="flexCheckDefault">
                      Task Description Size
                    </label>
                    @php
                        $sizes= json_decode($task->task_desc_size)
                    @endphp
                    @foreach ($sizes as $size )
                    {{$size,}}

                    @endforeach

                  </div>


                  </div>



                <div class="mb-3">
                    <label class="form-label"><strong>Task Level</strong></label>
                  <div class="form-check">

                    <label class="form-check-label" for="flexRadioDefault1">
                        {{$task->task_level}}
                    </label>
                  </div>



                </div>


                    {{-- @error('product_price')
                    <p style="color: red">{{$message}}</p>
                   @enderror --}}


                  <div class="mb-3">
                    <label for="formFile" class="form-label"><strong>Task photo</strong></label>

                    <img src="{{asset('images/'.$task->task_photo)}}" width="300px">
                  </div>
                  <div class="mb-3">
                  <label for="formdesc" class="form-label"><strong>Task Description</strong></label>

                    {{$task->task_desc}}
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><strong>Submit Email address</strong></label>

                    {{$task->submit_email}}
                  </div>





                </div>
            </div>
        </div>

    </x-app-layout>
