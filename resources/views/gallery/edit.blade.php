@extends('layouts.app')

@section('title', 'Edit Foto')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <h2 style="font-size: 20px; font-weight: 500; margin-bottom: 32px; color: #1a1a1a;">Edit Foto</h2>
    
    <form action="{{ route('gallery.update', $photo) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div style="margin-bottom: 24px;">
            <label for="title" style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; color: #1a1a1a;">Judul</label>
            <input type="text" name="title" id="title" value="{{ old('title', $photo->title) }}" required style="width: 100%; padding: 10px 12px; border: 1px solid #e5e5e5; border-radius: 4px; font-size: 14px; transition: border-color 0.2s; font-family: inherit;">
            @error('title')
                <p style="color: #dc2626; font-size: 12px; margin-top: 6px;">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 24px;">
            <label for="description" style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; color: #1a1a1a;">Deskripsi</label>
            <textarea name="description" id="description" rows="4" style="width: 100%; padding: 10px 12px; border: 1px solid #e5e5e5; border-radius: 4px; font-size: 14px; resize: vertical; font-family: inherit;">{{ old('description', $photo->description) }}</textarea>
            @error('description')
                <p style="color: #dc2626; font-size: 12px; margin-top: 6px;">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 24px;">
            <label for="photo_date" style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; color: #1a1a1a;">Tanggal</label>
            <input type="date" name="photo_date" id="photo_date" value="{{ old('photo_date', $photo->photo_date ? $photo->photo_date->format('Y-m-d') : '') }}" style="width: 100%; padding: 10px 12px; border: 1px solid #e5e5e5; border-radius: 4px; font-size: 14px; font-family: inherit;">
        </div>

        <div style="margin-bottom: 24px;">
            <label style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; color: #1a1a1a;">Foto Saat Ini</label>
            <div style="width: 100%; max-width: 300px; margin-bottom: 12px;">
                <img src="{{ asset('storage/' . $photo->image_path) }}" alt="{{ $photo->title }}" style="width: 100%; border-radius: 4px; border: 1px solid #e5e5e5;">
            </div>
        </div>

        <div style="margin-bottom: 32px;">
            <label for="image" style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; color: #1a1a1a;">Ganti Foto (opsional)</label>
            <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/jpg,image/gif" style="width: 100%; padding: 10px 12px; border: 1px solid #e5e5e5; border-radius: 4px; font-size: 14px; font-family: inherit;">
            <p style="color: #999; font-size: 12px; margin-top: 6px;">JPG, PNG, GIF (maks. 20MB)</p>
            @error('image')
                <p style="color: #dc2626; font-size: 12px; margin-top: 6px;">{{ $message }}</p>
            @enderror
        </div>

        <div style="display: flex; gap: 12px;">
            <button type="submit" class="btn" style="flex: 1;">
                Simpan Perubahan
            </button>
            <a href="{{ route('gallery.index') }}" class="btn btn-secondary" style="flex: 1; text-align: center; text-decoration: none;">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection

