<?php 

namespace App\Services;

use App\Models\Recipe;

class RecipeService
{
    public function latestRecipes($limit = 10){
        $latestRecipe = Recipe::latest()->take($limit)->get();

        return $latestRecipe;
    }
}