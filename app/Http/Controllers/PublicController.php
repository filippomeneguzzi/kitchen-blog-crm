<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use App\Models\Tag;
use App\Services\RecipeService;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    protected $recipeService;

    public function __construct(RecipeService $recipeService)
    {
        $this->recipeService = $recipeService;
    }
    public function home()
    {
        $recipes = $this->recipeService->latestRecipes(10);
        $categories = $this->getCategories();
        return view('home', compact('recipes', 'categories'));
    }
    public function getCategories()
    {
        $categories = Category::all();
        return $categories;
    }
    public function getCatgoryRecipes(Category $category)
    {
        $categoryRecipes = Recipe::where('category_id', $category->id)
            ->paginate(10);

        return view('categories.show', compact('categoryRecipes', 'category'));
    }
    public function getTags()
    {
        $tags = Tag::all();
        return view('home', compact('tags'));
    }
    public function search(Request $request)
    {

        $searchedRecipes = Recipe::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('title', 'like', '%' . $request->search . '%')
                        ->orWhere('description', 'like', '%' . $request->search . '%');
                });
            })
            ->latest()
            ->paginate(2)
            /* ->take(10)
            ->get() */;

        return view('recipes.search-recipes', compact('searchedRecipes'));
    }
}
