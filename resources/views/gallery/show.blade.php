@extends('layouts.app')

@section('title', $photo->title)

@section('content')
<div style="max-width: 900px; margin: 0 auto;">
    <div style="display: flex; gap: 40px; align-items: flex-start;">
        <div style="flex: 1;">
            <img src="{{ asset('storage/' . $photo->image_path) }}" alt="{{ $photo->title }}" style="width: 100%; border-radius: 8px; border: 1px solid #e5e5e5;">
        </div>
        <div style="flex: 1;">
            <h1 style="font-size: 24px; font-weight: 500; margin-bottom: 16px; color: #1a1a1a;">{{ $photo->title }}</h1>
            
            @if($photo->description)
                <p style="font-size: 16px; color: #666; margin-bottom: 24px; line-height: 1.6;">{{ $photo->description }}</p>
            @endif
            
            @if($photo->photo_date)
                <p style="font-size: 14px; color: #999; margin-bottom: 32px;">{{ $photo->photo_date->format('d F Y') }}</p>
            @endif
            
            <div style="display: flex; gap: 12px; margin-top: 32px;">
                <a href="{{ route('gallery.edit', $photo) }}" class="btn btn-secondary" style="text-decoration: none;">
                    Edit
                </a>
                <form action="{{ route('gallery.destroy', $photo) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus foto ini?')">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
@media (max-width: 768px) {
    .content > div > div {
        flex-direction: column;
    }
}
</style>
@endsection

