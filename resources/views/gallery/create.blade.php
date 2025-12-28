@extends('layouts.app')

@section('title', 'Upload Foto')

@section('content')
<div style="max-width: 700px; margin: 0 auto;">
    <h2 style="font-size: 20px; font-weight: 500; margin-bottom: 32px; color: #1a1a1a;">Upload Foto</h2>
    
    <!-- Drag and Drop Zone -->
    <div id="dropZone" style="border: 2px dashed #e5e5e5; border-radius: 8px; padding: 60px 20px; text-align: center; margin-bottom: 32px; transition: all 0.3s ease; background: #fafafa; cursor: pointer;">
        <div id="dropZoneContent">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: #999; margin: 0 auto 16px;">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                <polyline points="17 8 12 3 7 8"></polyline>
                <line x1="12" y1="3" x2="12" y2="15"></line>
            </svg>
            <p style="font-size: 16px; color: #666; margin-bottom: 8px;">Drag & drop foto di sini</p>
            <p style="font-size: 14px; color: #999;">atau</p>
            <label for="image" style="display: inline-block; margin-top: 12px; padding: 10px 20px; background: #1a1a1a; color: white; border-radius: 4px; cursor: pointer; font-size: 14px; font-weight: 500;">Pilih File</label>
        </div>
        <div id="dropZonePreview" style="display: none;">
            <img id="previewImg" src="" alt="Preview" style="max-width: 100%; max-height: 400px; border-radius: 8px; margin-bottom: 16px;">
            <p id="fileName" style="font-size: 14px; color: #666; margin-bottom: 12px;"></p>
            <button type="button" onclick="clearPreview()" style="padding: 8px 16px; background: transparent; border: 1px solid #e5e5e5; border-radius: 4px; cursor: pointer; font-size: 14px; color: #666;">Ganti Foto</button>
        </div>
    </div>
    
    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
        @csrf
        
        <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/jpg,image/gif" required style="display: none;" onchange="handleFileSelect(this)">
        
        <div style="margin-bottom: 24px;">
            <label for="title" style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; color: #1a1a1a;">Judul</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required style="width: 100%; padding: 10px 12px; border: 1px solid #e5e5e5; border-radius: 4px; font-size: 14px; transition: border-color 0.2s; font-family: inherit;">
            @error('title')
                <p style="color: #dc2626; font-size: 12px; margin-top: 6px;">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 24px;">
            <label for="description" style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; color: #1a1a1a;">Deskripsi</label>
            <textarea name="description" id="description" rows="4" style="width: 100%; padding: 10px 12px; border: 1px solid #e5e5e5; border-radius: 4px; font-size: 14px; resize: vertical; font-family: inherit;">{{ old('description') }}</textarea>
            @error('description')
                <p style="color: #dc2626; font-size: 12px; margin-top: 6px;">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 32px;">
            <label for="photo_date" style="display: block; margin-bottom: 8px; font-size: 14px; font-weight: 500; color: #1a1a1a;">Tanggal</label>
            <input type="date" name="photo_date" id="photo_date" value="{{ old('photo_date') }}" style="width: 100%; padding: 10px 12px; border: 1px solid #e5e5e5; border-radius: 4px; font-size: 14px; font-family: inherit;">
        </div>

        <div style="display: flex; gap: 12px;">
            <button type="submit" class="btn" style="flex: 1;" id="submitBtn">
                Upload
            </button>
            <a href="{{ route('gallery.index') }}" class="btn btn-secondary" style="flex: 1; text-align: center; text-decoration: none;">
                Batal
            </a>
        </div>
    </form>
</div>

<style>
#dropZone.drag-over {
    border-color: #1a1a1a;
    background: #f5f5f5;
    transform: scale(1.02);
}
</style>

<script>
const dropZone = document.getElementById('dropZone');
const fileInput = document.getElementById('image');
const dropZoneContent = document.getElementById('dropZoneContent');
const dropZonePreview = document.getElementById('dropZonePreview');
const previewImg = document.getElementById('previewImg');
const fileName = document.getElementById('fileName');

// Click to select file
dropZone.addEventListener('click', () => fileInput.click());

// Drag and drop handlers
dropZone.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropZone.classList.add('drag-over');
});

dropZone.addEventListener('dragleave', () => {
    dropZone.classList.remove('drag-over');
});

dropZone.addEventListener('drop', (e) => {
    e.preventDefault();
    dropZone.classList.remove('drag-over');
    
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        handleFile(files[0]);
    }
});

fileInput.addEventListener('change', function() {
    if (this.files.length > 0) {
        handleFile(this.files[0]);
    }
});

function handleFile(file) {
    if (!file.type.startsWith('image/')) {
        alert('Harap pilih file gambar');
        return;
    }
    
    if (file.size > 20 * 1024 * 1024) {
        alert('Ukuran file maksimal 20MB');
        return;
    }
    
    fileInput.files = new DataTransfer().files;
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(file);
    fileInput.files = dataTransfer.files;
    
    const reader = new FileReader();
    reader.onload = function(e) {
        previewImg.src = e.target.result;
        fileName.textContent = file.name + ' (' + (file.size / 1024 / 1024).toFixed(2) + ' MB)';
        dropZoneContent.style.display = 'none';
        dropZonePreview.style.display = 'block';
    };
    reader.readAsDataURL(file);
}

function handleFileSelect(input) {
    if (input.files && input.files[0]) {
        handleFile(input.files[0]);
    }
}

function clearPreview() {
    fileInput.value = '';
    dropZoneContent.style.display = 'block';
    dropZonePreview.style.display = 'none';
}

// Form submission with loading state
document.getElementById('uploadForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.disabled = true;
    submitBtn.textContent = 'Mengupload...';
    submitBtn.style.opacity = '0.6';
});
</script>
@endsection

