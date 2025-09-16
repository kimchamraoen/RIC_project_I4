<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Research\AddResearch;

class AddResearchController extends Controller
{
    public function store(Request $request)
    {
        // validate input
        $request->validate([
            'publication_type' => 'required|string',
            'title' => 'required|string',
            'authors' => 'required|string',
            'date' => 'required|date',
        ]);

        // create research record
        $research = AddResearch::create([
            'publication_type' => $request->input('publication_type'),
            'title'            => $request->input('title'),
            'authors'          => $request->input('authors'),
            'date'             => $request->input('date'),
            'file_path'        => $request->input('file_path', null),
        ]);
        
         // handle file upload if exists
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('research_files', 'public');
        }

        // if request expects JSON (API call, e.g., Postman)
        if ($request->wantsJson() || $request->isJson()) {
            return response()->json([
                'message' => 'Research item added successfully',
                'data'    => $research,
            ], 201);
        }

        // if request came from Blade form (redirect back with success message)
        return redirect()->back()->with('success', 'Research item added successfully');
    }
}
