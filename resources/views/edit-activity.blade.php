<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('activities.edit') }}
        </h2>
    </x-slot>
    @php
    $teacherSelect = $data['teacher'];
    @endphp
    <livewire:edit-activity :data=$data :course=$course :teacherSelect=$teacherSelect>

</x-app-layout>