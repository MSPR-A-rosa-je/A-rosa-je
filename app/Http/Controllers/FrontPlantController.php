<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;

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
$user = auth()->user();
$user->plants()->create($request->all()); // Créer une plante pour l'utilisateur authentifié
return redirect()->route('front.plants.index');
}

// Supprimer une plante
public function destroy(Plant $plant)
{
$user = auth()->user();
// Vérifier si la plante appartient à l'utilisateur authentifié
if ($plant->user_id === $user->id) {
$plant->delete();
}
return redirect()->route('front.plants.index');
}
}
