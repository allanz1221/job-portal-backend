<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
    <h3 class="text-lg font-medium text-gray-900">Add Languages</h3>

    <form method="POST" action="{{ route('languages.store') }}">
        @csrf

        <div class="mt-4">
            <x-input-label for="language_name" :value="__('Language')" />
            <x-text-input id="language_name" name="language_name" type="text" class="block mt-1 w-full" required />
            <x-input-error :messages="$errors->get('language_name')" />
        </div>

        <div class="mt-4">
            <x-input-label for="language_level" :value="__('Level')" />
            <select id="language_level" name="language_level" class="block mt-1 w-full">
                <option value="basic">Basic</option>
                <option value="intermediate">Intermediate</option>
                <option value="advanced">Advanced</option>
                <option value="native">Native</option>
            </select>
            <x-input-error :messages="$errors->get('language_level')" />
        </div>

        <x-primary-button class="mt-4">
            {{ __('Add Language') }}
        </x-primary-button>
    </form>
</div>
