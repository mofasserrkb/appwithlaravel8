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
<div>
    @if (session()->has('success'))
    <div class="alert alert-success">
        <p></p>
        {{ session()->get('success') }}
    </div>
   @endif
 <h2>All Task  </h2>
 <div class="pull-right">
    <a class="btn btn-success" href="{{ route('task.create') }}"> Create New Task</a>

</div>
<div>
<table  class="table table-bordered">
    <thead>

      <tr>
        <th scope="col">#</th>
        <th scope="col">Task Name</th>
        <th scope="col">Task Category</th>
        <th scope="col">Task Size</th>
        <th scope="col">Task Image</th>
        <th scope="col">Task Description</th>
        <th scope="col">Task Level</th>
        <th scope="col">Submit Email Address</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
        @php
        //   dd($products);
        @endphp
        @foreach ($tasks as $key=>$task)

        <tr>
        <th scope="row">{{++$key}}</th>
        <td>{{ $task->task_name }}</td>
        <td>{{ $task->task_cate }}</td>
        <td>
            @php
              $sizes=  json_decode($task->task_desc_size);
              $count=count($sizes);

             // dd($count);

            @endphp
            {{-- @if ($count<2)
            {{ $sizes[0] }}
            @else --}}
            @foreach ($sizes as $size)
            {{-- @if ($sizes[$count-1]== $size) --}}
            {{-- {{ $size }}
            @else --}}
            {{ $size }},
            {{-- @endif --}}
            @endforeach
            {{-- @endif --}}

        </td>



        <td><img src="{{asset('/images/'.$task->task_photo)}}" width="100px"></td>
        <td>{{ $task->task_desc }}</td>
        <td>{{ $task->task_desc }}</td>
        <td>{{ $task->submit_email }}</td>


        <td>



                <a class="btn btn-info" href="{{ route('task.show',$task->id) }}">Show</a>
                @can('task_edit')


                <a class="btn btn-primary" href="{{ route('task.edit',$task->id) }}">Edit</a>

                @endcan
                @can('task_delete')
                <form action="{{ route('task.destroy',$task->id) }}" method="POST">
                @csrf
                @method('DELETE')



                <button type="submit" class="btn btn-danger">Delete</button>


            </form>
            @endcan
        </td>
      </tr>
     @endforeach

    </tbody>
  </table>
</div>
</div>
</div>
</div>
</div>

</x-app-layout>
