<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index()
{
    $themes = Theme::all();
    return view('themes.index', compact('themes'));
}
 // Store a new theme
 public function store(Request $request)
 {
     // Validate incoming data
     $request->validate([
         'name' => 'required|string|max:255',      // Theme name
         'description' => 'nullable|string|max:1000', // Description (optional)
         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation

        ]);

       // Handle image upload
  $imagePath = null;
  if ($request->hasFile('image')) {
      $imagePath = $request->file('image')->store('themes', 'public'); // Store image in 'public/articles' directory
  }
     // Create and save the new theme
     $theme = new Theme();
     $theme->name = $request->name;
     $theme->description = $request->description;
     $theme->save();

     // Redirect to the themes index with a success message
     return redirect()->route('themes.index')->with('success', 'Theme created successfully!');
 }
public function show($id)
{
    // Find the theme by ID
    $theme = Theme::findOrFail($id);

    // Load the articles related to the theme (assuming you have a relationship in the Theme model)
    $articles = $theme->articles; // Adjust this if your relationship is named differently

    // Pass the theme and articles to the view
    return view('themes.show', compact('theme', 'articles'));
}
}
