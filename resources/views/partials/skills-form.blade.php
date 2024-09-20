<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
    <h3 class="text-lg font-medium text-gray-900">Add Skills</h3>

    <form method="POST" action="{{ route('skills.store') }}">
        @csrf

        <div class="mt-4">
            <x-input-label for="skills" :value="__('Skills (Use comma to separate)')" />
            <input id="skills" name="skills" type="text" class="block mt-1 w-full" data-role="tagsinput" />
            <x-input-error :messages="$errors->get('skills')" />
        </div>

        <x-primary-button class="mt-4">
            {{ __('Add Skills') }}
        </x-primary-button>
    </form>
</div>
