<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
    <h3 class="text-lg font-medium text-gray-900">Update Professional Profile</h3>

    <form method="POST" 
        action="{{ $profile ? route('dashboard.update', $profile->id) : route('dashboard.create') }}" 
        enctype="multipart/form-data">
        @csrf
        @if($profile)
            @method('PATCH')
        @endif

        <div class="mt-4">
            <x-input-label for="current_education_level" :value="__('Education Level')" />
            <select id="current_education_level" name="current_education_level" class="block mt-1 w-full">
                <option value="technical" {{ isset($profile) && $profile->current_education_level === 'technical' ? 'selected' : '' }}>Technical</option>
                <option value="specialist" {{ isset($profile) && $profile->current_education_level === 'specialist' ? 'selected' : '' }}>Specialist</option>
                <option value="bachelor" {{ isset($profile) && $profile->current_education_level === 'bachelor' ? 'selected' : '' }}>Bachelor</option>
                <option value="master" {{ isset($profile) && $profile->current_education_level === 'master' ? 'selected' : '' }}>Master</option>
                <option value="doctorate" {{ isset($profile) && $profile->current_education_level === 'doctorate' ? 'selected' : '' }}>Doctorate</option>
            </select>
            <x-input-error :messages="$errors->get('current_education_level')" />
        </div>

        <div class="mt-4">
            <x-input-label for="educational_institution" :value="__('Educational Institution')" />
            <x-text-input id="educational_institution" name="educational_institution" type="text" class="block mt-1 w-full" 
                :value="old('educational_institution', $profile->educational_institution ?? '')" required />
            <x-input-error :messages="$errors->get('educational_institution')" />
        </div>

        <div class="mt-4">
            <x-input-label for="university_career" :value="__('University Career')" />
            <x-text-input id="university_career" name="university_career" type="text" class="block mt-1 w-full" 
                :value="old('university_career', $profile->university_career ?? '')" required />
            <x-input-error :messages="$errors->get('university_career')" />
        </div>

        <!-- Otros campos del formulario -->

        <x-primary-button class="mt-4">
            {{ __('Save') }}
        </x-primary-button>
    </form>

</div>
