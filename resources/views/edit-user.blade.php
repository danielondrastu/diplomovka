<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

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
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('users.edituser') }}</h3>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form action="/updateUser" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$data['id']}}">
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">

                                                <div class="col-span-6">
                                                    <label for="name" class="block text-sm font-medium text-gray-700">{{ __('users.name') }}</label>
                                                    <input type="text" name="name" id="name" value="{{$data['name']}}" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" disabled>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="username" class="block text-sm font-medium text-gray-700">{{ __('users.username') }}</label>
                                                    <input type="text" name="username" id="username" value="{{$data['username']}}" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('users.email') }}</label>
                                                    <input type="text" name="email" id="email" value="{{$data['email']}}" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>


                                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                    <label for="role" class="block text-sm font-medium text-gray-700">{{ __('users.role') }}</label>

                                                    <select name="role" id="role" value="{{$userRole->role_id}}" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="">Select</option>
                                                        @foreach($roleList as $role)
                                                        <option value="{{$role->id}}" {{$userRole->role_id == $role->id ? 'selected' : '' }}>{{$role->display_name}}</option>
                                                        @endforeach
                                                    </select>
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
                    <div class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>

                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('users.activities') }}</h3>
                                    <p class="mt-1 text-sm text-gray-600">
                                        {{ __('users.editAct') }}
                                    </p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">

                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <form action="/registerToActivity" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{$data['id']}}">
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6">

                                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                        <table class="min-w-full divide-y divide-gray-200" id="coursesTable">
                                                            <thead class="bg-gray-50">
                                                                <tr>
                                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                        {{ __('activities.actName') }}
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                        {{ __('users.actAct') }}
                                                                    </th>
                                                                    <th scope="col" class="relative px-6 py-3">
                                                                        <span class="sr-only"></span>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="bg-white divide-y divide-gray-200">
                                                                @foreach ($actList as $activity)
                                                                <tr>
                                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                                        {{$activity->name}} - {{$activity->day}}, {{$activity->start_time}}
                                                                    </td>
                                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                                        {{$activity->role_name}}
                                                                    </td>
                                                                    <input type="hidden" value="{{$activity->id}}">
                                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                                        <a href="{{'/removeFromActivity/'.$activity->id.'/'.$activity->user_id}}" class="text-indigo-600 hover:text-indigo-900">{{ __('users.del') }}</a>
                                                                    </td>
                                                                </tr>

                                                                @endforeach

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                    <label for="select_activity" class="block text-sm font-medium text-gray-700">{{ __('users.selAct') }}</label>
                                                    <select name="select_activity" id="select_activity" value="" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="">Select</option>
                                                        @foreach($allActivities as $activity)
                                                        <option value="{{$activity->id}}">{{$activity->name}}, {{$activity->day}} @ {{$activity->start_time}}</option>
                                                        @endforeach
                                                    </select>
                                                    <!-- <input type="text" name="select_activity" id="select_activity" value="" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> -->
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                    <label for="activity_role" class="block text-sm font-medium text-gray-700">{{ __('users.roleAct') }}</label>
                                                    <select name="activity_role" id="activity_role" value="" class="mt-1 focus:ring-yellow-300 focus:border-yellow-300 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value="2">Student</option>
                                                        <option value="1">Teacher</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="h-10 self-end inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-300 hover:bg-yellow-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                                    Register
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