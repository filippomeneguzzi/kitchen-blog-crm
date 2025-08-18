<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Recipe;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{

    public function index()
    {
        $recipes = Recipe::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.recipes.index', compact('recipes'));
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.recipes.create', compact('categories', 'tags'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:250',
            'body' => 'required|string',
            'image' => 'nullable|image',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'preparation_time' => 'nullable|integer',
            'difficulty' => 'nullable|string',
            'portions' => 'nullable|integer',
            'ingredients' => 'nullable|array',
            'note' => 'nullable|string',
        ]);

        $ingredientsArray = array_filter(array_map('trim', explode("\n", $request->input('ingredients')[0] ?? '')));

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('recipes', 'public');
        }
        $request->merge([
            'ingredients' => array_filter(array_map('trim', explode("\n", $request->input('ingredients')[0] ?? '')))
        ]);

        $recipe = Recipe::create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'image_path' => $path,
            'category_id' => $validated['category_id'],
            'user_id' => auth()->id(),
            'recipe_data' => [
                'preparation_time' => $validated['preparation_time'] ?? null,
                'difficulty' => $validated['difficulty'] ?? null,
                'portions' => $validated['portions'] ?? null,
                'ingredients' => $ingredientsArray ?? null,
                'note' => $validated['note'] ?? null,
            ],
        ]);

        $recipe->tags()->sync($validated['tags'] ?? []);

        return redirect()->route('admin.recipes.index');
    }


    public function show(string $id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('admin.recipes.show', compact('recipe'));
    }


    public function edit(string $id)
    {
        $recipe = Recipe::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.recipes.edit', compact('recipe', 'categories', 'tags'));
    }


    public function update(Request $request, Recipe $recipe)
    {
        if ($recipe->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:250',
            'body' => 'required|string',
            'image' => 'nullable|image',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'preparation_time' => 'nullable|integer',
            'difficulty' => 'nullable|string',
            'portions' => 'nullable|integer',
            'ingredients' => 'nullable|array',
            'note' => 'nullable|string',
        ]);
        $ingredientsArray = array_filter(array_map('trim', explode("\n", $request->input('ingredients')[0] ?? '')));

        if ($request->hasFile('image')) {
            if ($recipe->image_path) {
                Storage::disk('public')->delete($recipe->image_path);
            }
            $path = $request->file('image')->store('recipes', 'public');
            $recipe->image_path = $path;
        }

        $recipe->update([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'category_id' => $validated['category_id'],
            'recipe_data' => [
                'preparation_time' => $validated['preparation_time'] ?? null,
                'difficulty' => $validated['difficulty'] ?? null,
                'portions' => $validated['portions'] ?? null,
                'ingredients' => $ingredientsArray ?? null,
                'note' => $validated['note'] ?? null,
            ],
        ]);

        $recipe->tags()->sync($validated['tags'] ?? []);

        return redirect()->route('admin.recipes.index')->with('success', 'Ricetta aggiornata con successo.');
    }


    public function destroy(string $id)
    {
        $recipe = Recipe::findOrFail($id);
        if ($recipe->image_path) {
            Storage::disk('public')->delete($recipe->image_path);
        }
        $recipe->delete();

        return redirect()->route('admin.recipes.index')->with('success', 'Post deleted successfully');
    }
}
