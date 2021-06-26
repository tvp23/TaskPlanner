<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg pb-2">
                <div class="d-flex justify-content-center">
                    <form method="post" style="width: 500px" action="{{route('completed_tasks.update', $task->id)}}">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <input name="user_id" type="hidden" value="{{$task->user_id}}">
                        </div>
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input class="form-control required" name="title" type="text" value="{{$task->title}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Message</label>
                            <textarea class="form-control" name="message" required>{{$task->message}}</textarea>
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <div>
                                <label for="">Priority & Deadline</label>
                                <div class="d-flex" style="width: 375px">
                                    <input style="width: 50px;" class="form-control" name="priority" type="number" min="1" value="{{$task->Priority}}" required>
                                    <input class="form-control" name="deadlinedate" type="date" value="{{$task->deadlinedate}}" required>
                                    <input class="form-control" name="deadlinetime" type="time" value="{{$task->deadlinetime}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <div>
                                <label for="">Status</label>
                                <select class="form-select" name="status">
                                    <option value="1">Completed</option>
                                    <option value="2">Current</option>
                                    <option value="3">On Hold</option>
                                    <option value="4">Canceled</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn-lg btn-primary" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
