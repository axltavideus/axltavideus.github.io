<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUsCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactUsCardController extends Controller
{
    public function index()
    {
        $cards = ContactUsCard::all();
        return view('admin.contact_us_cards.index', compact('cards'));
    }

    public function create()
    {
        return view('admin.contact_us_cards.create');
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
            $imagePath = $request->file('image')->store('contact_us_images', 'public');
        }

        ContactUsCard::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
            'link' => $request->link,
        ]);

        return redirect()->route('admin.contact_us_cards.index')->with('success', 'Card created successfully.');
    }

    public function edit(ContactUsCard $contactUsCard)
    {
        return view('admin.contact_us_cards.edit', compact('contactUsCard'));
    }

    public function update(Request $request, ContactUsCard $contactUsCard)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'link' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            if ($contactUsCard->image_path) {
                Storage::disk('public')->delete($contactUsCard->image_path);
            }
            $imagePath = $request->file('image')->store('contact_us_images', 'public');
            $contactUsCard->image_path = $imagePath;
        }

        $contactUsCard->title = $request->title;
        $contactUsCard->description = $request->description;
        $contactUsCard->link = $request->link;
        $contactUsCard->save();

        return redirect()->route('admin.contact_us_cards.index')->with('success', 'Card updated successfully.');
    }

    public function destroy(ContactUsCard $contactUsCard)
    {
        if ($contactUsCard->image_path) {
            Storage::disk('public')->delete($contactUsCard->image_path);
        }
        $contactUsCard->delete();

        return redirect()->route('admin.contact_us_cards.index')->with('success', 'Card deleted successfully.');
    }
}
