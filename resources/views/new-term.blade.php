<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('courses.newTerm') }}
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
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('courses.newTerm2') }}</h3>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form action="/createNewTerm" method="POST">
                                    @csrf
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">

                                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                    <label for="term" class="block text-sm font-medium text-gray-700">{{ __('courses.selTerm') }}</label>
                                                    <select name="term" id="term" value="" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                        <option value="">Select</option>
                                                        <option value="winter">Winter</option>
                                                        <option value="summer">Summer</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                    <label for="active_year" class="block text-sm font-medium text-gray-700">{{ __('courses.setYear') }}</label>
                                                    <input type="text" name="active_year" id="active_year" value="" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>

                                                <div class="col-span-6">
                                                    <label for="course_selection" class="block text-sm font-medium text-gray-700">{{ __('courses.select') }}</label>
                                                    @foreach ($courseList as $course)
                                                    <input type="checkbox" name="course_selection[]" value="{{$course['id']}}">{{$course['name']}}<br/>                                                 
                                                    @endforeach

                                                </div>







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
</x-app-layout>

<script type="text/javascript">
    let checkAvail = [];
    duration = Number(document.getElementById('set_time_allocation').value);
    dy = document.getElementById('activity_day').value;
    tm = Number(document.getElementById('activity_start').value.slice(0, -3));

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