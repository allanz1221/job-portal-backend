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

        <div class="mt-4">
            <x-input-label for="degree_obtained" :value="__('Degree Obtained')" />
            <x-text-input id="degree_obtained" name="degree_obtained" type="text" class="block mt-1 w-full" 
                :value="old('degree_obtained', $profile->degree_obtained ?? '')" required />
            <x-input-error :messages="$errors->get('degree_obtained')" />
        </div>

        <div class="mt-4">
            <x-input-label for="academic_certifications" :value="__('Academic Certifications')" />
            <x-textarea id="academic_certifications" name="academic_certifications" class="block mt-1 w-full" 
                required>{{ old('academic_certifications', $profile->academic_certifications ?? '') }}</x-textarea>
            <x-input-error :messages="$errors->get('academic_certifications')" />
        </div>

        <div class="mt-4">
            <x-input-label for="currently_employed" :value="__('Currently Employed')" />
            <input type="checkbox" id="currently_employed" name="currently_employed" {{ isset($profile) && $profile->currently_employed ? 'checked' : '' }} />
        </div>

        <div class="mt-4">
            <x-input-label for="current_company" :value="__('Current Company')" />
            <x-text-input id="current_company" name="current_company" type="text" class="block mt-1 w-full" 
                :value="old('current_company', $profile->current_company ?? '')" />
            <x-input-error :messages="$errors->get('current_company')" />
        </div>

        <div class="mt-4">
            <x-input-label for="current_position" :value="__('Current Position')" />
            <x-text-input id="current_position" name="current_position" type="text" class="block mt-1 w-full" 
                :value="old('current_position', $profile->current_position ?? '')" />
            <x-input-error :messages="$errors->get('current_position')" />
        </div>

        <div class="mt-4">
            <x-input-label for="responsibilities_description" :value="__('Responsibilities Description')" />
            <x-textarea id="responsibilities_description" name="responsibilities_description" class="block mt-1 w-full" 
                >{{ old('responsibilities_description', $profile->responsibilities_description ?? '') }}</x-textarea>
            <x-input-error :messages="$errors->get('responsibilities_description')" />
        </div>

        <div class="mt-4">
            <x-input-label for="cv_path" :value="__('Upload CV')" />
            <x-file-input id="cv_path" name="cv_path" />
            <x-input-error :messages="$errors->get('cv_path')" />
        </div>

        <div class="mt-4">
            <x-input-label for="cover_letter_path" :value="__('Upload Cover Letter')" />
            <x-file-input id="cover_letter_path" name="cover_letter_path" />
            <x-input-error :messages="$errors->get('cover_letter_path')" />
        </div>

        <div class="mt-4">
            <x-input-label for="additional_certifications_path" :value="__('Additional Certifications')" />
            <x-file-input id="additional_certifications_path" name="additional_certifications_path" />
            <x-input-error :messages="$errors->get('additional_certifications_path')" />
        </div>

        <div class="mt-4">
            <x-input-label for="recommendation_letter_path" :value="__('Recommendation Letter')" />
            <x-file-input id="recommendation_letter_path" name="recommendation_letter_path" />
            <x-input-error :messages="$errors->get('recommendation_letter_path')" />
        </div>

        <x-primary-button class="mt-4">
            {{ __('Save') }}
        </x-primary-button>
    </form>
</div>

