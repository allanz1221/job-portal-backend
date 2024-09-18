<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- User Type -->
        <div class="mt-4">
            <x-input-label for="user_type" :value="__('User Type')" />
            <select id="user_type" class="block mt-1 w-full" name="user_type" required>
                <option value="admin">Admin</option>
                <option value="company">Company</option>
                <option value="professional">Professional</option>
            </select>
            <x-input-error :messages="$errors->get('user_type')" class="mt-2" />
        </div>

        <!-- Education Level -->
        <div class="mt-4">
            <x-input-label for="education_level" :value="__('Education Level')" />
            <select id="education_level" class="block mt-1 w-full" name="education_level">
                <option value="technical">Technical</option>
                <option value="university">University</option>
            </select>
            <x-input-error :messages="$errors->get('education_level')" class="mt-2" />
        </div>

        <!-- Available -->
        <div class="mt-4">
            <x-input-label for="available" :value="__('Available')" />
            <x-checkbox id="available" class="block mt-1" name="available" :value="true" checked />
            <x-input-error :messages="$errors->get('available')" class="mt-2" />
        </div>

        <!-- Birth Date -->
        <div class="mt-4">
            <x-input-label for="birth_date" :value="__('Birth Date')" />
            <x-text-input id="birth_date" class="block mt-1 w-full" type="date" name="birth_date" />
            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
        </div>

        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="gender" :value="__('Gender')" />
            <select id="gender" class="block mt-1 w-full" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Civil Status -->
        <div class="mt-4">
            <x-input-label for="civil_status" :value="__('Civil Status')" />
            <select id="civil_status" class="block mt-1 w-full" name="civil_status">
                <option value="single">Single</option>
                <option value="married">Married</option>
                <option value="other">Other</option>
            </select>
            <x-input-error :messages="$errors->get('civil_status')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <x-textarea id="address" class="block mt-1 w-full" name="address">{{ old('address') }}</x-textarea>
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Photo -->
        <div class="mt-4">
            <x-input-label for="photo" :value="__('Photo')" />
            <x-text-input id="photo" class="block mt-1 w-full" type="text" name="photo" />
            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
        </div>

        <!-- Validation -->
        <div class="mt-4 hidden">
            <x-text-input id="validated" class="block mt-1 w-full" type="hidden" name="validated" value="false" />
        </div>

        <!-- Register Button -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
