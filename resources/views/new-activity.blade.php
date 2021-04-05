<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('courses.editCourse') }}
        </h2>
    </x-slot>
    <livewire:new-activity :course=$course>
    
</x-app-layout>

