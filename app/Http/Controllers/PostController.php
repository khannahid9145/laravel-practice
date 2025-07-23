<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use OpenAI;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{

    // composer require openai-php/laravel


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug',
            'content' => 'required|string',
            'summary' => 'nullable|string',
            'status' => 'required|in:draft,published,archived',
            'published_at' => 'nullable|date',
            'author' => 'nullable|integer',
        ]);

        Post::create($validated);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }



    public function generateSlug(Request $request)
    {
        // return response()->json(['slug' => 'ai-error']);
        $request->validate([
            'title' => 'required|string',
        ]);

        // Compose your prompt
        $prompt = $request->title;
        // $prompt = "Generate a short, URL-friendly brains quotes in lowercase with hyphens for the following title:\n\n" .
        //     "{$request->title}\n\n" .
        //     "Only return the quotes without any extra words.";


        $response = Http::post('http://localhost:11434/api/generate', [
            'model' => 'gemma',
            'prompt' => $prompt,
            'stream' => false
        ]);


        $slug = trim($response);

        return response()->json(['slug' => $slug]);
    }

    public function generateSummary(Request $request)
    {

        try {
            $request->validate([
                'title' => 'required|string',
            ]);

            // Compose your prompt
            $prompt = "Generate a short, Summary for the following title:\n\n" .
                "{$request->title}";



            $response = Http::post('http://localhost:11434/api/generate', [
                'model' => 'llama3',
                'prompt' => $prompt,
                'stream' => false
            ]);

            $json = $response->json();

            if (isset($json['error'])) {
                return response()->json(['summary' => $json]);
            }

            // Extract the actual text result
            $summary = trim($json['response']);

            return response()->json(['summary' => $summary]);
        } catch (\Exception $e) {
            return response()->json(['summary' => $e]);
        }
        // return response()->json(['summary' => 'ai-summary']);

    }
}
