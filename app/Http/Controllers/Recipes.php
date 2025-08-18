<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class Recipes extends Controller
{
    public function getRecipes()
    {
        //take only the last 10 recipes
        $recipes = Recipe::latest()->take(5)->get();
        return view('recipes.recipes', compact('recipes'));
    }

    public function showDetailRecipe($id){
        $recipe = Recipe::findOrFail($id);
        return view('recipes.recipe-detail', compact('recipe'));
    }
}
