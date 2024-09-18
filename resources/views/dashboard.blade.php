<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900">Update Professional Profile</h3>

                <form method="POST" action="{{ route('professional-profile.update', $profile->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mt-4">
                        <x-input-label for="current_education_level" :value="__('Education Level')" />
                        <select id="current_education_level" name="current_education_level" class="block mt-1 w-full">
                            <option value="technical" {{ $profile->current_education_level === 'technical' ? 'selected' : '' }}>Technical</option>
                            <option value="specialist" {{ $profile->current_education_level === 'specialist' ? 'selected' : '' }}>Specialist</option>
                            <option value="bachelor" {{ $profile->current_education_level === 'bachelor' ? 'selected' : '' }}>Bachelor</option>
                            <option value="master" {{ $profile->current_education_level === 'master' ? 'selected' : '' }}>Master</option>
                            <option value="doctorate" {{ $profile->current_education_level === 'doctorate' ? 'selected' : '' }}>Doctorate</option>
                        </select>
                        <x-input-error :messages="$errors->get('current_education_level')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="educational_institution" :value="__('Educational Institution')" />
                        <x-text-input id="educational_institution" name="educational_institution" type="text" class="block mt-1 w-full" :value="old('educational_institution', $profile->educational_institution)" required />
                        <x-input-error :messages="$errors->get('educational_institution')" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="university_career" :value="__('University Career')" />
                        <x-text-input id="university_career" name="university_career" type="text" class="block mt-1 w-full" :value="old('university_career', $profile->university_career)" required />
                        <x-input-error :messages="$errors->get('university_career')" />
                    </div>

                    <!-- Add other fields as necessary -->

                    <x-primary-button class="mt-4">
                        {{ __('Save') }}
                    </x-primary-button>
                </form>
            </div>

            <!-- Form to update skills -->
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

            <!-- Form to update languages -->
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
        </div>
    </div>
</x-app-layout>
