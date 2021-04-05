<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('courses.editCourse') }}
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
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('courses.basicInfo') }}</h3>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form action="/updateCourse" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$data['id']}}">
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">

                                                <div class="col-span-6">
                                                    <label for="street_address" class="block text-sm font-medium text-gray-700">{{ __('courses.name') }}</label>
                                                    <input type="text" name="course_name" id="course_name" value="{{$data['name']}}" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="first_name" class="block text-sm font-medium text-gray-700">{{ __('courses.id') }}</label>
                                                    <input type="text" name="course_id" id="course_id" value="{{$data['id']}}" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="last_name" class="block text-sm font-medium text-gray-700">{{ __('courses.guarantor') }}</label>
                                                    <input type="text" name="lecturer" id="lecturer" value="{{$data['lecturer']}}" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-4">
                                                    <label for="guaranting_department" class="block text-sm font-medium text-gray-700">{{ __('courses.guarantingDepartment') }}</label>
                                                    <input type="text" name="guaranting_department" id="guaranting_department" value="{{$data['guaranting_department']}}" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div>
                                                </div>

                                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                    <label for="type" class="block text-sm font-medium text-gray-700">{{ __('courses.type') }}</label>
                                                    
                                                    <select name="type" id="type" value="" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="">Select</option>
                                                        <option value="P" {{$data['type'] == "P" ? 'selected' : '' }}>P</option>
                                                        <option value="PP" {{$data['type'] == "PP" ? 'selected' : '' }}>PP</option>
                                                        <option value="PV" {{$data['type'] == "PV" ? 'selected' : '' }}>PV</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                    <label for="ais_id" class="block text-sm font-medium text-gray-700">{{ __('courses.aisID') }}</label>
                                                    <input type="text" name="ais_id" id="ais_id" value="{{$data['ais_id']}}" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                    <label for="active_year" class="block text-sm font-medium text-gray-700">{{ __('courses.active') }}</label>
                                                    <input type="text" name="active_year" id="active_year" value="{{$data['active_year']}}" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                    <label for="term" class="block text-sm font-medium text-gray-700">{{ __('courses.term') }}</label>
                                                    <input type="text" name="term" id="term" value="{{$data['term']}}" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>

                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('courses.teachingInfo') }}</h3>
                                    <p class="mt-1 text-sm text-gray-600">
                                        {{ __('courses.editPreff') }}
                                    </p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        
                                            <div>
                                                <legend class="text-base font-medium text-gray-900">{{ __('courses.place') }}</legend>
                                                <select name="preferred_room" id="preferred_room" value="" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="">Select</option>
                                                        @foreach($rooms as $room)
                                                        <option value="{{$room->id}}" {{$data['preferred_room'] == $room->id ? 'selected' : '' }}>{{$room->room_name}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            
                                        <div class="mt-10"></div>
                                        <div class="grid grid-cols-6 gap-6">

                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="time_allocation_lecture" class="block text-sm font-medium text-gray-700">{{ __('courses.weekAllocLe') }}</label>
                                                <input type="number" name="time_allocation_lecture" id="time_allocation_lecture" value="{{$data['time_allocation_lecture']}}" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="time_allocation_exercise" class="block text-sm font-medium text-gray-700">{{ __('courses.weekAllocEx') }}</label>
                                                <input type="number" name="time_allocation_exercise" id="time_allocation_exercise" value="{{$data['time_allocation_exercise']}}" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div></div>

                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="max_stud" class="block text-sm font-medium text-gray-700">{{ __('courses.maxStud') }}</label>
                                                <input type="number" name="max_stud" id="max_stud" value="{{$data['max_stud']}}" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="max_par" class="block text-sm font-medium text-gray-700">{{ __('courses.maxPar') }}</label>
                                                <input type="number" name="max_par" id="max_par" value="{{$data['max_par']}}" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="not_parallel" class="block text-sm font-medium text-gray-700">{{ __('courses.notPar') }}</label>
                                                <input type="text" name="not_parallel" id="not_parallel" value="{{$data['not_parallel']}}" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>                                       

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>

                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('courses.additional') }}</h3>

                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">

                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">

                                            <div class="col-span-6">
                                                <label for="special_requirements" class="block text-sm font-medium text-gray-700">{{ __('courses.specialReq') }}</label>

                                                <textarea type="text" name="special_requirements" id="special_requirements" value="{{$data['special_requirements']}}" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                            </div>

                                            <div class="col-span-6">
                                                <label for="message_for_students" class="block text-sm font-medium text-gray-700">{{ __('courses.messageStud') }}</label>

                                                <textarea type="text" name="message_for_students" id="message_for_students" value="{{$data['message_for_students']}}" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-300 hover:bg-yellow-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                            Save
                                        </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>

