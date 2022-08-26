<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <h1 class="text-center " style="font-size: 25px; font-weight:bold">Table</h1>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end   mb-3">
                <a href="{{route('admin.table.create')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounted-lg text-white" >tableyaratish</a>
            </div>
            <div class="overflow-x-auto relative " >
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            ID
                        </th>
                        <th scope="col" class="py-3 px-6"> Name
                        </th>
                        <th scope="col" class="py-3 px-6">Guest Number
                        </th>
                        <th scope="col" class="py-3 px-6">Status
                        </th>
                        <th scope="col" class="py-3 px-6">
                           Location
                        </th>
                        <th scope="col" class="py-3 px-6">
                          amallar
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tables as $table)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{$table->id}}
                            </th>
                            <td class="py-4 px-6 dark:text-black">
                                {{$table->name}}
                            </td>
                            <td class="py-4 px-6 dark:text-black">
                                {{$table->guest_number}}
                            </td>
                            <td class="py-4 px-6 dark:text-black">
                                {{$table->status->name}}
                            </td>
                            <td class="py-4 px-6 dark:text-black">
                                {{$table->location->name}}
                            </td>
                            <td>

                                <form action="{{ route('admin.table.destroy',$table->id) }}" method="POST"  onsubmit="return confirm('Ushu Menuuni ochirishga ichonchigiz komilmi')">
                                    <a class="py-2 px-6 text-white bg-green-500 hover:bg-green-700 rounded-t-lg" href="{{ route('admin.table.edit',$table->id) }}">Edit</a>


                                    {{--                                 <a class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-3 py-2.5 text-center mr-2 mb-2" href="{{ route('admin.category.show',$category->id) }}">Show</a>--}}


                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-2.5 text-center mr-2 mb-2">delete</button>

                                </form>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
