<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- You're logged in! -->
                    @php
                    $daystart = 7;
                    $daystop = 20;



                    @endphp
                    <div>
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <table style="border: 1px solid">
                                    <thead>
                                        <th>
                                        </th>
                                        @for ($i = $daystart; $i < $daystop+1; $i++) <th class="text-xs w-36">{{$i}}:00</th>
                                            @endfor
                                    </thead>
                                    <tbody>
                                        @foreach ($tableData as $nday => $dday)
                                        <tr class="h-24">
                                            <td>{{$nday}}</td>
                                            @if(count($dday)==0)

                                            @for ($i = $daystart; $i < $daystop+1; $i++) <td style="border: 1px solid">
                                                </td>
                                                @endfor

                                                @else
                                                @for ($i = $daystart; $i < $dday[0]->start_time; $i++) <td style="border: 1px solid">
                                                    </td>
                                                    @endfor

                                                    @for ($i = 0; $i < count($dday); $i++) @php $link="/dashboard/" .$dday[$i]->id; $dur=$dday[$i]->end_time - $dday[$i]->start_time; @endphp <td style="border: 1px solid" colspan="{{$dur}}"><a href="{{$link}}" class="text-indigo-600 hover:text-indigo-900">{{$dday[$i]->name}}</a></td>
                                                        @if (count($dday)>$i+1)
                                                        @for($j = $dday[$i]->end_time; $j < $dday[$i+1]->start_time; $j++) <td style="border: 1px solid">
                                                            </td>
                                                            @endfor
                                                            @endif

                                                            @endfor

                                                            @for ($k = $dday[$i-1]->end_time; $k < $daystop+1; $k++) <td style="border: 1px solid">
                                                                </td>
                                                                @endfor
                                                                @endif
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    @isset ($data)
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{$data[0]->name}}</h3>
                                    <table>
                                        <tr>
                                            <td><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                                </svg></td>
                                            <td>
                                                <p class="text-gray-600 font-semibold">{{$data[0]->activity_type}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                                </svg></td>
                                            <td>
                                                <p class="text-gray-600 font-semibold">{{$data[0]->teacher_name}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg></td>
                                            <td>
                                                <p class="text-gray-600 font-semibold">{{$data[0]->day}}, {{$data[0]->start_time}} - {{$data[0]->end_time}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg></td>
                                            <td>
                                                <p class="text-gray-600 font-semibold">{{$data[0]->room_name}}</p>
                                            </td>
                                        </tr>
                                    </table>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>