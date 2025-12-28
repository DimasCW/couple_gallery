<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index(Request $request)
    {
        $query = Photo::query();
        
        // Search functionality
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }
        
        // Sort functionality
        $sort = $request->get('sort', 'latest');
        switch($sort) {
            case 'oldest':
                $query->oldest();
                break;
            case 'title_asc':
                $query->orderBy('title', 'asc');
                break;
            case 'title_desc':
                $query->orderBy('title', 'desc');
                break;
            case 'date_asc':
                $query->orderBy('photo_date', 'asc');
                break;
            case 'date_desc':
                $query->orderBy('photo_date', 'desc');
                break;
            default:
                $query->latest();
        }
        
        $photos = $query->paginate(12)->withQueryString();
        $totalPhotos = Photo::count();
        $latestPhotos = Photo::latest()->take(6)->get();
        
        // Calculate days since relationship start (22 Agustus 2025)
        $relationshipStartDate = \Carbon\Carbon::parse('2025-08-22');
        // If date is in the future, calculate from that date to now
        if ($relationshipStartDate->isFuture()) {
            $daysTogether = 0; // Not started yet
        } else {
            $daysTogether = $relationshipStartDate->diffInDays(now());
        }
        
        return view('gallery.index', compact('photos', 'totalPhotos', 'latestPhotos', 'daysTogether'));
    }

    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
            'photo_date' => 'nullable|date'
        ]);

        $imagePath = $request->file('image')->store('photos', 'public');

        Photo::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
            'photo_date' => $request->photo_date
        ]);

        return redirect()->route('gallery.index')->with('success', 'Foto berhasil diupload!');
    }

    public function download(Photo $photo)
    {
        $path = storage_path('app/public/' . $photo->image_path);
        
        if (!file_exists($path)) {
            abort(404);
        }
        
        return response()->download($path, $photo->title . '.' . pathinfo($path, PATHINFO_EXTENSION));
    }

    public function show(Photo $photo)
    {
        return view('gallery.show', compact('photo'));
    }

    public function edit(Photo $photo)
    {
        return view('gallery.edit', compact('photo'));
    }

    public function update(Request $request, Photo $photo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
            'photo_date' => 'nullable|date'
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'photo_date' => $request->photo_date
        ];

        // Update image if new one is uploaded
        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($photo->image_path);
            // Store new image
            $data['image_path'] = $request->file('image')->store('photos', 'public');
        }

        $photo->update($data);

        return redirect()->route('gallery.index')->with('success', 'Foto berhasil diperbarui!');
    }

    public function destroy(Photo $photo)
    {
        Storage::disk('public')->delete($photo->image_path);
        $photo->delete();

        return redirect()->route('gallery.index')->with('success', 'Foto berhasil dihapus!');
    }
}
