<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('activities.lims') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <div>
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('activities.lims') }}</h3>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form action="/updatePref" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$userID}}">
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">

                                                <div class="col-span-6 ">

                                                    <label for="time_from" class="block text-sm font-medium text-gray-700">{{ __('courses.timePrefClickTab') }}</label>

                                                    @php
                                                    $start = 7;
                                                    $stop = 20;
                                                    $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
                                                    @endphp

                                                    <table style="border: 1px solid">
                                                        <thead>
                                                            <th>
                                                            </th>
                                                            @for ($i = $start; $i < $stop; $i++) <th>{{$i}}</th>
                                                                @endfor
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($days as $day)
                                                            <tr>
                                                                <td>
                                                                    {{$day}}
                                                                </td>
                                                                @for ($j = $start; $j < $stop; $j++) @php $id=$day.$j; $limName="limit_" .strtolower($day); @endphp @if ($data->$limName[$j-7]=='0' ||null) <td id={{$id}} style=" border: 1px solid" onclick={{'changeColor("'.$id.'")'}} class='null'>
                                                                    <div style="min-width: 40px; min-height: 30px">

                                                                    </div>
                                                                    </td>

                                                                    @elseif ($data->$limName[$j-7]=='1')

                                                                    <td id={{$id}} style=" border: 1px solid" onclick={{'changeColor("'.$id.'")'}} class='bg-green-300'>
                                                                        <div style="min-width: 40px; min-height: 30px">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                                            </svg>
                                                                        </div>
                                                                    </td>

                                                                    @elseif($data->$limName[$j-7]=='2')

                                                                    <td id={{$id}} style=" border: 1px solid" onclick={{'changeColor("'.$id.'")'}} class='bg-red-400'>
                                                                        <div style="min-width: 40px; min-height: 30px">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                                            </svg>
                                                                        </div>
                                                                    </td>

                                                                    @endif


                                                                    @endfor

                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <input type="hidden" id="hinput" name="hinput" value="1">
                                                    @foreach ($days as $day)
                                                    @for ($k = $start; $k < $stop; $k++) @php $inpName="in" .$day.$k; $limName="limit_" .strtolower($day); @endphp <input type="hidden" id={{$inpName}} name={{$inpName}} value={{$data->$limName[$k-7]}}>

                                                        @endfor
                                                        @endforeach



                                                </div>

                                            </div>
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-300 hover:bg-yellow-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                            Save
                                        </button>
                                    </div>
                                    </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript">
    function changeColor(id) {

        let cls = document.getElementById(id).getAttribute('class');
        let inpName = 'in' + id;

        if (cls === 'null') {
            document.getElementById(inpName).value = "1";
            document.getElementById(id).setAttribute('class', 'bg-green-300');
            document.getElementById(id).innerHTML = '<div style="min-width: 40px; min-height: 30px"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></div>';

        } else if (cls === 'bg-green-300') {
            document.getElementById(inpName).value = "2";
            document.getElementById(id).setAttribute('class', 'bg-red-400');
            document.getElementById(id).innerHTML = '<div style="min-width: 40px; min-height: 30px"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></div>';
        } else if (cls === 'bg-red-400') {
            document.getElementById(inpName).value = "0";
            document.getElementById(id).setAttribute('class', 'null');
            document.getElementById(id).innerHTML = '<div style="min-width: 40px; min-height: 30px"></div>';
        }

    }
</script>