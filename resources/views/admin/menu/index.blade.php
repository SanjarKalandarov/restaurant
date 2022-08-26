<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <h1 class="text-center " style="font-size: 25px; font-weight:bold">Menu </h1>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end   mb-3">
                <a href="{{route('admin.menu.create')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounted-lg text-white" >Menu yaratish</a>
            </div>
            <div class="overflow-x-auto relative " >
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            ID
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Menu Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Description
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Images
                        </th>
                        <th scope="col" class="py-3 px-6">
                            price
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Amallar
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($menus as $menu)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="py-2 px-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">{{$menu->id}}
                            </th>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-black">
                                {{$menu->name}}
                            </td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-black">
                                {{$menu->description}}
                            </td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-black">
                                <img src="{{ asset('images/categories/'.$menu->image) }}" style="width: 200px; position: relative">
                            </td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-black">
                              {{$menu->price}}
                            </td>
                            <td>

                                <form action="{{ route('admin.menu.destroy',$menu->id) }}" method="POST"  onsubmit="return confirm('Ushu Menuuni ochirishga ichonchigiz komilmi')">
                                    <a class="py-2 px-6 text-white bg-green-500 hover:bg-green-700 rounded-t-lg" href="{{ route('admin.menu.edit',$menu->id) }}">Edit</a>


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
                {{ $menus->links() }}

            </div>
        </div>
    </div>
{{--    {{$menu->links()}}--}}
</x-admin-layout>
