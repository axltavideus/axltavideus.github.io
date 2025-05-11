<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GrupJualBeliCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GrupJualBeliCardController extends Controller
{
    public function index()
    {
        $cards = GrupJualBeliCard::all();
        return view('admin.grup_jual_beli_cards.index', compact('cards'));
    }

    public function create()
    {
        return view('admin.grup_jual_beli_cards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'link' => 'nullable|url',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('grup_jual_beli_images', 'public');
        }

        GrupJualBeliCard::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
            'link' => $request->link,
        ]);

        return redirect()->route('admin.grup_jual_beli_cards.index')->with('success', 'Card created successfully.');
    }

    public function edit(GrupJualBeliCard $grupJualBeliCard)
    {
        return view('admin.grup_jual_beli_cards.edit', compact('grupJualBeliCard'));
    }

    public function update(Request $request, GrupJualBeliCard $grupJualBeliCard)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'link' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            if ($grupJualBeliCard->image_path) {
                Storage::disk('public')->delete($grupJualBeliCard->image_path);
            }
            $imagePath = $request->file('image')->store('grup_jual_beli_images', 'public');
            $grupJualBeliCard->image_path = $imagePath;
        }

        $grupJualBeliCard->title = $request->title;
        $grupJualBeliCard->description = $request->description;
        $grupJualBeliCard->link = $request->link;
        $grupJualBeliCard->save();

        return redirect()->route('admin.grup_jual_beli_cards.index')->with('success', 'Card updated successfully.');
    }

    public function destroy(GrupJualBeliCard $grupJualBeliCard)
    {
        if ($grupJualBeliCard->image_path) {
            Storage::disk('public')->delete($grupJualBeliCard->image_path);
        }
        $grupJualBeliCard->delete();

        return redirect()->route('admin.grup_jual_beli_cards.index')->with('success', 'Card deleted successfully.');
    }
}
