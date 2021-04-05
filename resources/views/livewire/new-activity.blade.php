<div>
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
                                <form action="/createActivity" method="POST">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{$course['id']}}">
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">

                                                <div class="col-span-6">
                                                    <label for="course_name" class="block text-sm font-medium text-gray-700">{{ __('courses.name') }}</label>
                                                    <input type="text" name="course_name" id="course_name" value="{{$course['name']}}" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="course_ais_id" class="block text-sm font-medium text-gray-700">{{ __('courses.id') }}</label>
                                                    <input type="text" name="course_ais_id" id="course_ais_id" value="{{$course['ais_id']}}" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="teacher" class="block text-sm font-medium text-gray-700">{{ __('activities.teacher') }}</label>
                                                    <select wire:model="teacherSelect" name="teacher" id="teacher" value="" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="">Select</option>
                                                        @foreach ($teachers as $teacher)
                                                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-4">
                                                    <label for="activity_type" class="block text-sm font-medium text-gray-700">{{ __('activities.actType') }}</label>

                                                    <select name="activity_type" id="activity_type" value="" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                        <option value="">Select</option>
                                                        <option value="Exercise" >Exercise</option>
                                                        <option value="Lecture" >Lecture</option>
                                                    </select>
                                                </div>

                                                <div>
                                                </div>

                                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                    <label for="teaching_place" class="block text-sm font-medium text-gray-700">{{ __('activities.teaching_place') }}</label>
                                                    <select name="teaching_place" id="teaching_place" value="" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="">Select</option>
                                                        @foreach($rooms as $room)
                                                        <option value="{{$room->id}}" >{{$room->room_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                    <label for="meeting_link" class="block text-sm font-medium text-gray-700">{{ __('activities.meeting_link') }}</label>
                                                    <input type="text" name="meeting_link" id="meeting_link" value="" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                    <label for="only_online" class="block text-sm font-medium text-gray-700">{{ __('activities.only_online') }}</label>
                                                    <select name="only_online" id="only_online" value="" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="">Select</option>
                                                        <option value="1" >Yes</option>
                                                        <option value="2" >No</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                    <label for="set_time_allocation" class="block text-sm font-medium text-gray-700">{{ __('activities.set_time_allocation') }}</label>
                                                    <input type="text" name="set_time_allocation" id="set_time_allocation" value="" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>

                                                <div class="col-span-6">

                                                @if($limits != null)

                                                    <label for="time_from" class="block text-sm font-medium text-gray-700">{{ __('activities.setStart') }}</label>

                                                    @php
                                                    $start = 7;
                                                    $stop = 20;
                                                    $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
                                                    $weeks = 13;
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
                                                                @for ($j = $start; $j < $stop; $j++) @php $id=$day.$j; $limName="limit_" .strtolower($day); $divid='d' .$day.$j; @endphp @if ($limits->$limName[$j-7]=='0' ||null) <td id={{$id}} style=" border: 1px solid" onclick="placeActivity(event)" class='null'>
                                                                        <div id={{$divid}} style="min-width: 40px; min-height: 30px">

                                                                        </div>
                                                                    </td>

                                                                    @elseif ($limits->$limName[$j-7]=='1')

                                                                    <td id={{$id}} style=" border: 1px solid" onclick="placeActivity(event)" class='bg-green-100'>
                                                                        <div id={{$divid}} style="min-width: 40px; min-height: 30px">

                                                                        </div>
                                                                    </td>

                                                                    @elseif($limits->$limName[$j-7]=='2')

                                                                    <td id={{$id}} style=" border: 1px solid" onclick="" class='bg-gray-400'>
                                                                        <div id={{$divid}} style="min-width: 40px; min-height: 30px">

                                                                        </div>
                                                                    </td>

                                                                    @endif


                                                                    @endfor

                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <input type="hidden" id="activity_start" name="activity_start" value="">
                                                    <input type="hidden" id="activity_day" name="activity_day" value="">

                                                </div>
                                                <div class="col-span-6 ">
                                                    <label for="weeks_selection" class="block text-sm font-medium text-gray-700">{{ __('activities.weeks') }}</label>
                                                    <br />
                                                    @for ($i=0; $i<$weeks; $i++) <input type="checkbox" name="weeks_selection[]" value="{{$i+1}}" checked="checked">{{$i+1}}
                                                        @endfor
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-300 hover:bg-yellow-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                                Save
                                            </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        let checkAvail = [];
        duration = Number(document.getElementById('set_time_allocation').value);
        dy = document.getElementById('activity_day').value;
        tm = Number(document.getElementById('activity_start').value);

        for (i = tm; i < tm + duration; i++) {
            let tdid = dy + i;
            let divid = 'd' + dy + i;
            document.getElementById(tdid).setAttribute('class', 'bg-yellow-500');
            document.getElementById(divid).innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>';
            checkAvail.push([tdid, 'null'])
        }


        function placeActivity(event) {

            duration = Number(document.getElementById('set_time_allocation').value);
            ln = event.target.id.length;
            positionClick = event.target.id.slice(1, ln);
            ln = positionClick.length;

            if (positionClick[ln - 2] == "y") {
                tm = Number(positionClick.substr(-1));
                dy = positionClick.substr(0, ln - 1);
            } else {
                tm = Number(positionClick.substr(-2));
                dy = positionClick.substr(0, ln - 2);
            }

            for (x in checkAvail) {
                divid = 'd' + checkAvail[x][0];
                document.getElementById(checkAvail[x][0]).setAttribute('class', checkAvail[x][1]);
                document.getElementById(divid).innerHTML = "";
            }

            checkAvail = [];

            for (i = tm; i < tm + duration; i++) {
                let tdid = dy + i;
                let cls = document.getElementById(tdid).getAttribute('class');

                if (cls == 'null') {
                    checkAvail.push([tdid, 'null'])
                } else if (cls == 'bg-green-100') {
                    checkAvail.push([tdid, 'bg-green-100'])
                }

            }

            if (checkAvail.length == duration) {
                for (i = tm; i < tm + duration; i++) {
                    let tdid = dy + i;
                    let divid = 'd' + dy + i;
                    document.getElementById(tdid).setAttribute('class', 'bg-yellow-500');
                    document.getElementById(divid).innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>';
                }
                document.getElementById('activity_start').value = tm;
                document.getElementById('activity_day').value = dy;

            }
        }
    </script>