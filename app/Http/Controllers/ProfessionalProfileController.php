<?php

namespace App\Http\Controllers;

use App\Models\ProfessionalProfile;
use App\Models\Skill;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessionalProfileController extends Controller
{
    // Constructor para validar que el usuario esté autenticado
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        // Buscar un solo perfil asociado al usuario actual
        $profile = ProfessionalProfile::where('user_id', $user->id)->first();

        return view('dashboard', compact('profile'));        
    }

    public function show()
    {
        $user = Auth::user();
        $profile = $user->professionalProfile;

        if (!$profile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        $skills = $user->skills->map(function ($skill) {
            return ['value' => $skill->id, 'label' => $skill->name];
        });

        $languages = $user->languages->map(function ($language) {
            return ['value' => $language->id, 'label' => $language->name, 'level' => $language->level];
        });

        $profileData = $profile->toArray();
        $profileData['skills'] = $skills;
        $profileData['languages'] = $languages;

        return response()->json($profileData);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        // Obtener el perfil del usuario si existe, o crear uno nuevo si no
        $profile = $user->professionalProfile ?? new ProfessionalProfile(['user_id' => $user->id]);

        $validatedData = $request->validate([
            'current_education_level' => 'required|string',
            'educational_institution' => 'required|string',
            'university_career' => 'required|string',
            'degree_obtained' => 'required|string',
            'academic_certifications' => 'nullable|string',
            'currently_employed' => 'boolean',
            'current_company' => 'required_if:currently_employed,true|string|nullable',
            'current_position' => 'required_if:currently_employed,true|string|nullable',
            'responsibilities_description' => 'nullable|string',
            'skills' => 'required|array|min:1',
            'skills.*.value' => 'required|string',
            'skills.*.label' => 'required|string',
            'languages' => 'required|array|min:1',
            'languages.*.value' => 'required|string',
            'languages.*.label' => 'required|string',
            'languages.*.level' => 'required|in:basic,intermediate,advanced,native',
        ]);

        $profile->fill($validatedData);
        $profile->save();

        // Actualizar habilidades
        $user->skills()->delete();
        foreach ($validatedData['skills'] as $skill) {
            $user->skills()->create([
                'name' => $skill['label'],
                'type' => 'technical', // Puedes modificar el tipo según el formulario
            ]);
        }

        // Actualizar idiomas
        $user->languages()->delete();
        foreach ($validatedData['languages'] as $language) {
            $user->languages()->create([
                'name' => $language['label'],
                'level' => $language['level'],
            ]);
        }

        return response()->json(['message' => 'Profile updated successfully']);
    }
}
