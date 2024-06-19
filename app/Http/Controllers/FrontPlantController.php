<?php
namespace App\Http\Controllers;

use App\Constants\ValidationRules;
use Illuminate\Http\Request;
use App\Models\Plant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        "specie_name" => 'required|max:255',
        "location" => 'required|max:255',
        "url_photo" => 'required|max:255',
        "status" => 'required|max:255',
        "description" => 'required|max:2000',
    ]);



    try {
        $user = Auth::user();

        $plant = new Plant();
        $plant->specie_name = $validateData['specie_name'];
        $plant->location = $validateData['location'];
        $plant->url_photo = $validateData['url_photo'];
        $plant->status = $validateData['status'];
        $plant->description = $validateData['description'];
        $plant->owner_id = $user->id;

        $plant->save();

        Log::info('Plant created:' . $plant->id);

        return redirect()
            ->route('plants.index')
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
