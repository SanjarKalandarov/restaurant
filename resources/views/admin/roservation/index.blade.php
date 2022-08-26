<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <h1 class="text-center " style="font-size: 25px; font-weight:bold">Roservation</h1>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end   mb-3">
                <a href="{{route('admin.roservation.create')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounted-lg text-white" >Roservation yaratish</a>
            </div>
            <div class="overflow-x-auto relative " >
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6 " style="color: white">
                            ID
                        </th>
                        <th scope="col" class="py-3 px-6" style="color: white">First Name
                        </th>
                        <th scope="col" class="py-3 px-6" style="color: white">Last Name
                        </th>
                        <th scope="col" class="py-3 px-6" style="color: white">Email
                        </th>
                        <th scope="col" class="py-3 px-6" style="color: white">
                         Telefon raqam
                        </th>
                        <th scope="col" class="py-3 px-6" style="color: white">Date
                        </th> <th scope="col" class="py-3 px-6" style="color: white">
                           Table
                        </th> <th scope="col" class="py-3 px-6" style="color: white">
                          Guest NUmber
                        </th>
                        <th scope="col" class="py-3 px-6" style="color: white">
                    amallar
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roservations as $roservation)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" style="color: black" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$roservation->id}}
                            </th>
                            <td class="py-4 px-6" style="color: black">
                                {{$roservation->first_name}}
                            </td>
                            <td class="py-4 px-6" style="color: black">
                                {{$roservation->last_name}}
                            </td>
                            <td class="py-4 px-6" style="color: black">
                                {{$roservation->email}}
                            </td>
                            <td class="py-4 px-6" style="color: black">
                                {{$roservation->tel_number}}
                            </td>
                            <td class="py-4 px-6" style="color: black">
                                {{$roservation->res_date}}
                            </td>
                            <td class="py-4 px-6" style="color: black">
                                {{$roservation->tables->name}}
                            </td>
                            <td class="py-4 px-6" style="color: black">
                                {{$roservation->guest_number}}
                            </td>
                            <td class="" style="color: black">

                                <form action="{{ route('admin.roservation.destroy',$roservation->id) }}" class="d-flex" method="POST"  onsubmit="return confirm('Ushu Menuuni ochirishga ichonchigiz komilmi')">
                                    <a class="text-white  bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-3 py-2.5 text-center mr-2 mb-2" href="{{ route('admin.roservation.edit',$roservation->id) }}">Edit</a>


                                    {{--                                 <a class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-3 py-2.5 text-center mr-2 mb-2" href="{{ route('admin.category.show',$category->id) }}">Show</a>--}}


                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white  bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-2.5 text-center mr-2 mb-2">delete</button>

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
