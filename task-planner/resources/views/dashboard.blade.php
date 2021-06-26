<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <script src="{{asset('js/dashboard.js')}}" defer></script>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg pb-2">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <h2>Welcome, {{$user->name}}</h2>
                        <p>Here you see all your tasks. to see more info click on one of the widgets. If you want to see all press more.</p>
                        <button id="alltasks" class="btn btn-primary">All Tasks</button>
                    </div>
                </div>
                <div class="d-flex justify-content-around" style="height: 200px">
                    <button id="completed" class="card mt-2 bg-success" style="width: 18rem;">
                        <div class="card-body rounded d-flex align-items-center justify-content-center w-100">
                            <div class="text-light">
                                <h3 class="align-middle ">Completed Tasks</h3>
                                <h4>({{$tasks_completed}})</h4>
                            </div>
                        </div>
                    </button>
                    <button id="current" class="card mt-2 bg-info" style="width: 18rem;">
                        <div class="card-body rounded d-flex align-items-center justify-content-center w-100">
                            <div class="text-light">
                                <h3 class="align-middle ">Current Tasks</h3>
                                <h4>({{$tasks_current}})</h4>
                            </div>
                        </div>
                    </button>
                    <button id="on_hold" class="card mt-2 bg-warning" style="width: 18rem;">
                        <div class="card-body rounded d-flex align-items-center justify-content-center w-100">
                            <div class="text-light">
                                <h3 class="align-middle ">Tasks On hold</h3>
                                <h4>({{$tasks_on_hold}})</h4>
                            </div>
                        </div>
                    </button>
                    <button id="canceled" class="card mt-2 bg-danger" style="width: 18rem;">
                        <div class="card-body rounded d-flex align-items-center justify-content-center w-100">
                            <div class="text-light">
                                <h3 class="align-middle ">Canceled Tasks</h3>
                                <h4>({{$tasks_canceled}})</h4>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

