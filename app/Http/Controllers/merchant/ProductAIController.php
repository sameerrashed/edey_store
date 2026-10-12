<?php

namespace App\Http\Controllers\merchant;

use App\Ai\Agents\ProductWriter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Ai\Enums\Lab;

class ProductAIController extends Controller
{
    public function generate(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $response = (new ProductWriter)->prompt(
            'اكتب وصفًا للمنتج التالي: '.$data['name'],
            provider: Lab::Ollama,
            model: 'llama3.2',
        );

        return response()->json([
            'description' => (string) $response,
        ]);
    }
}
