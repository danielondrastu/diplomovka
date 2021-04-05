<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit teaching activities') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">{{$courseData['ais_id']}} - {{$courseData['name']}}</h3>
                        <br />
                        <span class="mt-4 text-base font-bold text-gray-600">Course guarantor: </span><span class="mt-4 text-base text-gray-600">{{$courseData['lecturer']}}</span>
                        <br />
                        <!-- <span class="mt-4 text-base font-bold text-gray-600">Assigned students: </span><span class="mt-4 text-base text-gray-600">{{__('tbd...')}}</span>
                        <br /> -->
                        <span class="mt-4 text-base font-bold text-gray-600">Time allocation and forms: </span>
                        <table>
                            <tr>
                                <td>Lecture - {{$courseData['time_allocation_lecture']}}HRS/week </td>
                            </tr>
                            <tr>
                                <td>Exercise - {{$courseData['time_allocation_lecture']}}HRS/week </td>
                            </tr>
                        </table>
                    </div>
                    <div class="my-8">

                        <a href="{{'/newTeachingActivity/'.$courseData['id']}}" class="max-h-12 justify-center justify-self-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-300 hover:bg-yellow-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                            Add new teaching activity
                        </a>
                    </div>
                    <span class="mt-4 text-base font-bold text-gray-600">Teaching activities</span>
                    <div class="grid gap-x-4 gap-y-4 grid-cols-3">
                        @foreach ($allActivities as $activity)


                        <div class="shadow border rounded-lg">
                            <div class="flex items-center space-x-4 p-4">

                                <div class="flex-1">

                                    <table>
                                        <tr>
                                            <td><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                                </svg></td>
                                            <td>
                                                <p class="text-gray-600 font-semibold">{{$activity->activity_type}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                                </svg></td>
                                            <td>
                                                <p class="text-gray-600 font-semibold">{{$activity->name}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg></td>
                                            <td>
                                                <p class="text-gray-600 font-semibold">{{$activity->day}}, {{$activity->start_time}}:00 - {{$activity->end_time}}:00</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg></td>
                                            <td>
                                                <p class="text-gray-600 font-semibold">{{$activity->room_name}}</p>
                                            </td>
                                        </tr>
                                    </table>
                                    <br />
                                    @php
                                    $editLink = "/editTeachingActivity/".$activity->id;
                                    $delLink = "/deleteActivity/".$courseData['id']."/".$activity->id;
                                    @endphp
                                    <!-- <form action={{$editLink}} method="get">
                                        <button type="submit" class="inline-flex justify-center justify-self-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-300 hover:bg-yellow-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                            Edit
                                        </button>
                                    </form> -->
                                    <a href={{$editLink}} class="max-h-12 justify-center justify-self-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-300 hover:bg-yellow-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                        Edit
                                    </a>
                                    <a href={{$delLink}} class="mx-4 max-h-12 justify-center justify-self-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-300 hover:bg-yellow-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>