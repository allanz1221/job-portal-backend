<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    /**
     * Store the skills.
     */
    public function store(Request $request)
    {
        // Validar que el campo 'skills' esté presente y sea una cadena
        $request->validate([
            'skills' => 'required|string',
        ]);

        // Explode the skills by comma
        $skills = explode(',', $request->skills);
        $userId = auth()->id();  // Assuming user is authenticated

        // Loop through skills and create them
        foreach ($skills as $skill) {
            Skill::create([
                'user_id' => $userId,
                'name' => trim($skill)
            ]);
        }

        // Return a JSON response
        return response()->json(['message' => 'Skills saved successfully!']);
    }

    public function getUserSkills(Request $request)
    {
        // Asumiendo que estás autenticando al usuario
        $user = auth()->user();

        // Obtener las skills del usuario
        $skills = $user->skills()->pluck('name');  // Supongo que tienes una relación en tu modelo User

        return response()->json($skills);
    }

    public function delete(Request $request)
    {
        $user = auth()->user();

        // Eliminar la skill del usuario
        $user->skills()->where('name', $request->skill)->delete();

        return response()->json(['message' => 'Skill removed successfully']);
    }

}
