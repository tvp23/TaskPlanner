<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Tasks') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="d-flex justify-content-center">
                    <h2>{{$task[0]->title}}</h2>
                </div>
                <div class="d-flex justify-content-around">
                    <div class="text-center">
                        <h3>Notes:</h3>
                        {{$task[0]->message}}
                    </div>
                    <div class="text-center">
                        <h3>Deadline:</h3>
                        {{$task[0]->deadlinedate}}
                        {{$task[0]->deadlinetime}}
                    </div>
                </div>
                <div class="d-flex justify-center mb-3 mt-5"><a class="btn btn-primary" href="{{url()->previous()}}">Back</a></div>
            </div>
        </div>
    </div>

</x-app-layout>
