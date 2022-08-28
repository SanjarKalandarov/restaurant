<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <h1 class="text-center " style="font-size: 25px; font-weight:bold">Roser Update</h1>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{route('admin.roservation.update',$roservation->id)}}" method="POST">
                @csrf
@method('PUT')
                <div class="mb-6">
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 text-black">First Name</label>
                    <input type="text" id="last_name" value="{{$roservation->first_name}}" name="first_name"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="first Name" required="">
                </div>
                <div class="mb-6">
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 text-black">last NAmee</label>
                    <input type="text" id="first_name"  value="{{$roservation->last_name}}" name="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="Last name" required="">
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 text-black">Email</label>
                <input type="email" id="email" name="email"  value="{{$roservation->email}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Email" required="">
                 </div>
                <div class="mb-6">
                    <label for="tel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 text-black">Tel</label>
                    <input type="tel" id="tel" name="tel_number" value="{{$roservation->tel_number}}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="+998990000000" required="">
                </div>
                <div class="mb-6">
                    <label for="red-date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 text-black">Resevation date</label>
                    <input type="datetime-local" id="red-date" name="res_date" value="{{$roservation->res_date->format('Y-m-d\TH:i:s')}}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   required="">
                </div>
                <div class="mb-6">
                    <label for="table_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Table</label>
                    <select id="table_id" name="table_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" SELECTED>Tanlang</option>
                     @foreach($tables as $table)
                            <option value="{{$table->id}}" @selected($table->id==$roservation->table_id)>{{$table->name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mb-6">
                    <label for="guest_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 text-black">Guest number</label>
                    <input type="number" id="guest_number"  value="{{$roservation->guest_number}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="guest_number" placeholder="Guest name" required="">
                </div>

                <div class="flex items-start mb-6">
                    <div class="flex items-center h-5">
                        <input id="remember" type="checkbox"  class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                    </div>
                    <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    </div>
</x-admin-layout>


