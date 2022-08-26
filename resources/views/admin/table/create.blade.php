<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <h1 class="text-center " style="font-size: 25px; font-weight:bold">Table Qoshish</h1>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{route('admin.table.store')}}" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 text-black">Name</label>
                    <input type="text" id="name" value="{{old('name')}}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="name" placeholder="Name" required="">
           @error('name')
                    <div class="text-sm text-red-600">{{$message}}</div>
                    @enderror

                </div>
                <div class="mb-6">
                    <label for="gust" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 text-black">Guestl</label>
                    <input type="number" id="guest" value="{{old('guest_number')}}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="guest_number" placeholder="Number" required="">
                    @error('guest_number')
                    <div class="text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Status</label>
                    <select id="countries" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                     @foreach(App\Enums\TableStatus::cases() as $status)
                            <option value="" SELECTED>Tanlang</option>
                            <option value="{{$status->value}}">{{$status->name}}</option>
                        @endforeach

                    </select>
                    @error('$status')
                    <div class="text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Location</label>
                    <select id="location" name="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach(App\Enums\TableLocation::cases() as $location)

                            <option value="{{$location->value}}">{{$location->name}}</option>
                        @endforeach

                    </select>
                    @error('location')
                    <div class="text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class="flex items-start mb-6">
                    <div class="flex items-center h-5">
                        <input id="remember" type="checkbox" value="" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                    </div>
{{--                    <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>--}}
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    </div>
</x-admin-layout>


