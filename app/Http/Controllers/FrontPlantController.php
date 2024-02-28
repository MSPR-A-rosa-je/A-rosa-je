<?php
namespace App\Http\Controllers;

use App\Constants\ValidationRules;
use Illuminate\Http\Request;
use App\Models\Plant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use function Laravel\Prompts\error;

class FrontPlantController extends Controller
{
// Afficher les plantes de l'utilisateur
public function index()
{
$user = auth()->user();
$plants = $user->plants; // Récupérer les plantes de l'utilisateur authentifié
return view('front.plants.index', compact('plants'));
}

// Afficher le formulaire de création de plante
public function create()
{
return view('front.plants.create');
}

// Enregistrer une nouvelle plante
public function store(Request $request)
{
    $validateData = $request->validate([
        "specie_name" => ValidationRules::MAX_STRING_LENGTH,
        "location" => ValidationRules::MAX_STRING_LENGTH,
        "url_photo" => ValidationRules::MAX_STRING_LENGTH,
        "status" => ValidationRules::MAX_STRING_LENGTH,
        "description" => 'required|log|max:2000',
    ]);

    try {
        $user = Auth::user();

        $plant = $user->plants()->create($validateData);

        $plant->save();

        Log::info('Plant created:' . $plant->id);

        return redirect()
            ->route('plantes.index')
            ->with('success', 'Plant: ' . $plant->id . 'created successfully');
    } catch (\Throwable $e) {
        Log::error($e);
        return back()->withInput()->withErrors(['error' => 'Failed to create plant !']);
    }
}

// Supprimer une plante
public function destroy(Plant $plant)
{
$user = auth()->user();
// Vérifier si la plante appartient à l'utilisateur authentifié
if ($plant->user_id === $user->id) {
$plant->delete();
}
return redirect()->route('plants.index');
}
}
