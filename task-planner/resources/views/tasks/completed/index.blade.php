<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Completed Tasks') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="d-flex justify-content-center">
                    <div>
                        <h4>Create new Task</h4>
                        <div class="d-flex justify-content-center">
                            <a style="text-decoration: none;" class="btn-sm btn-primary" href="{{route('completed_tasks.create')}}">Create</a>
                        </div>
                    </div>
                </div>
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Deadline</th>
                        <th style="width: 200px;" scope="col">Tools</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <th scope="row">{{$task->id}}</th>
                            <td scope="row">{{$task->title}}</td>
                            <td scope="row">{{$task->status}}</td>
                            <td scope="row">{{$task->deadlinedate}}</td>
                            <td scope="row" class="d-flex justify-content-start overflow-visible">
                                <a style="text-decoration: none;" href="{{route('completed_tasks.show',$task->id)}}" class="btn-sm btn-info ml-2">Show</a>
                                <a style="text-decoration: none;" href="{{route('completed_tasks.edit',$task->id)}}" class="btn-sm btn-warning ml-2">Edit</a>
                                <form action="{{route('completed_tasks.destroy',$task->id)}}" method="post" class="ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-sm btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
