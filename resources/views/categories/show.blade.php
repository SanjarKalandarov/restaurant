<x-guest-layout>

    <div class="container w-full px-5 py-6 mx-auto">

        <div class="grid lg:grid-cols-4 gap-y-6">

            @foreach($categories->menus as $menus)

                <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                    <img class="w-full h-48" src="{{asset('images/categories/'.$menus->image)}}"
                         alt="Image" />
                    <div class="flex items-center justify-content p-1">
                        <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 hover:text-green-400 uppercase">{{$menus->name}}</h4>
{{--                        <p class="leading-normal text-gray-700">{{$menus->description}}</p>--}}
                    </div>
                    <div class="flex items-center justify-content p-1">
{{--                        <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 hover:text-green-400 uppercase">{{$menus->name}}</h4>--}}
                        <p class="leading-normal text-gray-700">{{$menus->description}}</p>
                    </div>

{{--                        <div class="px-6 py-4">--}}

{{--                    --}}
{{--                        </div>--}}
                    <div class="flex items-center justify-content ">
                        <span class="text-xl text-green-600">
                            {{$menus->price}} $
                        </span>
                    </div>

                </div>
            @endforeach
        </div>
    </div>

</x-guest-layout>
