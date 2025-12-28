@extends('layouts.app')

@section('title', 'Dimas & Jasmine - Our Love Story')

@section('content')
<!-- Hero Section -->
<div class="hero-section" style="text-align: center; padding: 100px 20px; margin-bottom: 60px; background: linear-gradient(135deg, #fef3f2 0%, #fce7f3 50%, #f3e8ff 100%); border-radius: 20px; position: relative; overflow: hidden; box-shadow: 0 20px 60px rgba(236, 72, 153, 0.1);">
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; opacity: 0.05; background-image: radial-gradient(circle at 2px 2px, #ec4899 1px, transparent 0); background-size: 40px 40px;"></div>
    <div style="position: absolute; top: 20px; right: 20px; font-size: 120px; opacity: 0.1; color: #ec4899;">💕</div>
    <div style="position: absolute; bottom: 20px; left: 20px; font-size: 100px; opacity: 0.1; color: #a855f7;">💜</div>
    <div style="position: relative; z-index: 1;">
        <div style="font-size: 18px; color: #ec4899; font-weight: 500; margin-bottom: 16px; text-transform: uppercase; letter-spacing: 3px; animation: fadeInDown 0.8s ease;">
            Our Love Story
        </div>
        <h1 style="font-size: 64px; font-weight: 700; background: linear-gradient(135deg, #ec4899 0%, #a855f7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 12px; letter-spacing: -2px; animation: fadeInDown 0.8s ease 0.1s both;">
            Dimas & Jasmine
        </h1>
        <div style="font-size: 24px; color: #7c3aed; margin-bottom: 8px; font-weight: 500; animation: fadeInUp 0.8s ease 0.2s both;">
            💕 Together Since 22 Agustus 2025 💕
        </div>
        <p style="font-size: 18px; color: #6b7280; margin-bottom: 40px; max-width: 600px; margin-left: auto; margin-right: auto; line-height: 1.6; animation: fadeInUp 0.8s ease 0.3s both;">
            Setiap momen bersama adalah cerita indah yang ingin kami abadikan selamanya
        </p>
        <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap; animation: fadeInUp 0.8s ease 0.4s both;">
            <a href="#gallery" class="btn" style="padding: 14px 32px; font-size: 16px; text-decoration: none; background: linear-gradient(135deg, #ec4899 0%, #a855f7 100%); border: none;">
                Jelajahi Gallery 💕
            </a>
            <a href="{{ route('gallery.create') }}" class="btn btn-secondary" style="padding: 14px 32px; font-size: 16px; text-decoration: none; border: 2px solid #ec4899; color: #ec4899;">
                Tambah Momen ✨
            </a>
        </div>
    </div>
</div>


<!-- Statistics Section -->
<div class="stats-section" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 24px; margin-bottom: 60px;">
    <div class="stat-card" style="background: linear-gradient(135deg, #fef3f2 0%, #fce7f3 100%); padding: 32px; border-radius: 16px; border: 2px solid #fecdd3; text-align: center; transition: all 0.3s ease; opacity: 0; transform: translateY(20px); animation: fadeInUp 0.6s ease 0.1s both; position: relative; overflow: hidden;">
        <div style="position: absolute; top: -20px; right: -20px; font-size: 80px; opacity: 0.1;">📸</div>
        <div style="font-size: 52px; font-weight: 700; background: linear-gradient(135deg, #ec4899 0%, #a855f7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 8px; position: relative; z-index: 1;">{{ $totalPhotos }}</div>
        <div style="font-size: 14px; color: #7c3aed; text-transform: uppercase; letter-spacing: 1px; font-weight: 600; position: relative; z-index: 1;">Total Momen</div>
    </div>
    <div class="stat-card" style="background: linear-gradient(135deg, #f0f9ff 0%, #e0e7ff 100%); padding: 32px; border-radius: 16px; border: 2px solid #c7d2fe; text-align: center; transition: all 0.3s ease; opacity: 0; transform: translateY(20px); animation: fadeInUp 0.6s ease 0.2s both; position: relative; overflow: hidden;">
        <div style="position: absolute; top: -20px; right: -20px; font-size: 80px; opacity: 0.1;">✨</div>
        <div style="font-size: 52px; font-weight: 700; background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 8px; position: relative; z-index: 1;">{{ $latestPhotos->count() }}</div>
        <div style="font-size: 14px; color: #6366f1; text-transform: uppercase; letter-spacing: 1px; font-weight: 600; position: relative; z-index: 1;">Momen Terbaru</div>
    </div>
    <div class="stat-card" style="background: linear-gradient(135deg, #fefce8 0%, #fef3c7 100%); padding: 32px; border-radius: 16px; border: 2px solid #fde68a; text-align: center; transition: all 0.3s ease; opacity: 0; transform: translateY(20px); animation: fadeInUp 0.6s ease 0.3s both; position: relative; overflow: hidden;">
        <div style="position: absolute; top: -20px; right: -20px; font-size: 80px; opacity: 0.1;">💕</div>
        <div style="font-size: 52px; font-weight: 700; background: linear-gradient(135deg, #f59e0b 0%, #ec4899 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 8px; position: relative; z-index: 1;">{{ $daysTogether }}</div>
        <div style="font-size: 14px; color: #d97706; text-transform: uppercase; letter-spacing: 1px; font-weight: 600; position: relative; z-index: 1;">Hari Bersama</div>
    </div>
</div>

<!-- Featured Photos Section -->
@if($latestPhotos->count() > 0)
<div class="featured-section" style="margin-bottom: 60px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px;">
        <div>
            <h2 style="font-size: 36px; font-weight: 600; background: linear-gradient(135deg, #ec4899 0%, #a855f7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 8px;">Momen Terbaru Kami</h2>
            <p style="font-size: 16px; color: var(--text-secondary);">Kenangan indah yang baru saja kami abadikan</p>
        </div>
        <a href="#gallery" class="btn btn-secondary" style="text-decoration: none; padding: 10px 20px; border: 2px solid #ec4899; color: #ec4899;">
            Lihat Semua →
        </a>
    </div>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 24px;">
        @foreach($latestPhotos as $index => $photo)
            <div class="featured-photo" data-featured-index="{{ $index }}" style="border: 1px solid #e5e5e5; border-radius: 12px; overflow: hidden; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); cursor: pointer; opacity: 0; transform: translateY(30px) scale(0.95);" onclick="openLightboxFromCard(this)" data-image="{{ asset('storage/' . $photo->image_path) }}" data-title="{{ htmlspecialchars($photo->title, ENT_QUOTES, 'UTF-8') }}" data-description="{{ htmlspecialchars($photo->description ?? '', ENT_QUOTES, 'UTF-8') }}" data-date="{{ $photo->photo_date ? $photo->photo_date->format('d F Y') : '' }}" data-id="{{ $photo->id }}" data-index="{{ $index }}" data-image-path="{{ $photo->image_path }}">
                <div style="width: 100%; aspect-ratio: 4/3; overflow: hidden; background: var(--hover-bg); position: relative;">
                    <img loading="lazy" src="{{ asset('storage/' . $photo->image_path) }}" alt="{{ $photo->title }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);">
                    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 60%); opacity: 0; transition: opacity 0.3s ease;"></div>
                </div>
                <div style="padding: 20px; background: var(--bg-secondary);">
                    <h3 style="font-size: 18px; font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">{{ $photo->title }}</h3>
                    @if($photo->description)
                        <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 8px; line-height: 1.5; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $photo->description }}</p>
                    @endif
                    @if($photo->photo_date)
                        <p style="font-size: 12px; color: var(--text-secondary); opacity: 0.7;">{{ $photo->photo_date->format('d M Y') }}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif

<!-- Full Gallery Section -->
<div id="gallery" style="scroll-margin-top: 40px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px;">
        <div>
            <h2 style="font-size: 36px; font-weight: 600; background: linear-gradient(135deg, #ec4899 0%, #a855f7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 8px;">Semua Momen Kami</h2>
            <p style="font-size: 16px; color: var(--text-secondary);">Koleksi lengkap semua kenangan indah kami</p>
        </div>
        <button id="toggleGalleryBtn" onclick="toggleFullGallery()" class="btn btn-secondary" style="padding: 10px 20px; border: 2px solid #ec4899; color: #ec4899;">
            <span id="toggleGalleryText">Tampilkan Gallery</span>
        </button>
    </div>

    <div id="fullGallery" style="display: none;">
        <!-- Advanced Toolbar -->
        <div style="margin-bottom: 24px; display: flex; gap: 12px; flex-wrap: wrap; align-items: center; justify-content: space-between; padding: 16px; background: var(--bg-secondary); border-radius: 8px; border: 1px solid var(--border-color);">
            <div style="display: flex; gap: 12px; align-items: center; flex: 1;">
                <button id="selectModeBtn" onclick="toggleSelectMode()" class="btn btn-secondary" style="padding: 8px 16px; font-size: 13px;">
                    <span id="selectModeText">Select Mode</span>
                </button>
                <button id="slideshowBtn" onclick="startSlideshow()" class="btn btn-secondary" style="padding: 8px 16px; font-size: 13px;">
                    🎬 Slideshow
                </button>
                <button onclick="showKeyboardShortcuts()" class="btn btn-secondary" style="padding: 8px 16px; font-size: 13px;" title="Keyboard Shortcuts">
                    ⌨️ Shortcuts
                </button>
                <div id="batchActions" style="display: none; gap: 8px; align-items: center;">
                    <span id="selectedCount" style="font-size: 13px; color: var(--text-secondary);">0 selected</span>
                    <button onclick="deleteSelected()" class="btn btn-danger" style="padding: 8px 16px; font-size: 13px;">Delete Selected</button>
                    <button onclick="exitSelectMode()" class="btn btn-secondary" style="padding: 8px 16px; font-size: 13px;">Cancel</button>
                </div>
            </div>
            
            <form method="GET" action="{{ route('gallery.index') }}" style="display: flex; gap: 8px; align-items: center; min-width: 200px;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari foto..." style="flex: 1; padding: 8px 12px; border: 1px solid var(--border-color); border-radius: 4px; font-size: 14px; font-family: inherit; background: var(--bg-secondary); color: var(--text-primary);">
                <button type="submit" class="btn" style="padding: 8px 16px; font-size: 13px;">Cari</button>
                @if(request('search'))
                    <a href="{{ route('gallery.index') }}" class="btn btn-secondary" style="text-decoration: none; padding: 8px 16px; font-size: 13px;">Reset</a>
                @endif
            </form>
            
            <div style="display: flex; gap: 12px; align-items: center;">
                <select id="sortSelect" onchange="handleSortChange(this.value)" style="padding: 8px 12px; border: 1px solid var(--border-color); border-radius: 4px; font-size: 13px; font-family: inherit; background: var(--bg-secondary); color: var(--text-primary); cursor: pointer;">
                    <option value="latest" {{ request('sort') == 'latest' || !request('sort') ? 'selected' : '' }}>Terbaru</option>
                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                    <option value="title_asc" {{ request('sort') == 'title_asc' ? 'selected' : '' }}>Judul A-Z</option>
                    <option value="title_desc" {{ request('sort') == 'title_desc' ? 'selected' : '' }}>Judul Z-A</option>
                    <option value="date_asc" {{ request('sort') == 'date_asc' ? 'selected' : '' }}>Tanggal (Lama)</option>
                    <option value="date_desc" {{ request('sort') == 'date_desc' ? 'selected' : '' }}>Tanggal (Baru)</option>
                </select>
                
                <div style="display: flex; border: 1px solid var(--border-color); border-radius: 4px; overflow: hidden;">
                    <button id="viewGrid" onclick="setViewMode('grid')" style="padding: 8px 12px; background: var(--text-primary); color: var(--bg-secondary); border: none; cursor: pointer; font-size: 13px;" title="Grid View">
                        <svg width="14" height="14" viewBox="0 0 16 16" fill="currentColor">
                            <path d="M2 2h4v4H2V2zm6 0h4v4H8V2zm-6 6h4v4H2V8zm6 0h4v4H8V8z"/>
                        </svg>
                    </button>
                    <button id="viewMasonry" onclick="setViewMode('masonry')" style="padding: 8px 12px; background: var(--bg-secondary); color: var(--text-secondary); border: none; cursor: pointer; font-size: 13px; border-left: 1px solid var(--border-color);" title="Masonry View">
                        <svg width="14" height="14" viewBox="0 0 16 16" fill="currentColor">
                            <path d="M2 2h3v3H2V2zm5 0h3v3H7V2zm-5 5h3v3H2V7zm5 0h3v3H7V7zm-5 5h3v3H2v-3zm5 0h3v3H7v-3z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        @if($photos->count() > 0)
            <div id="photoGrid" class="photo-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 24px; margin-bottom: 40px;">
                @foreach($photos as $index => $photo)
                    <div class="photo-card" data-index="{{ $index }}" data-id="{{ $photo->id }}" data-image="{{ asset('storage/' . $photo->image_path) }}" data-title="{{ htmlspecialchars($photo->title, ENT_QUOTES, 'UTF-8') }}" data-description="{{ htmlspecialchars($photo->description ?? '', ENT_QUOTES, 'UTF-8') }}" data-date="{{ $photo->photo_date ? $photo->photo_date->format('d F Y') : '' }}" data-image-path="{{ $photo->image_path }}" style="border: 1px solid var(--border-color); border-radius: 8px; overflow: hidden; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); cursor: pointer; opacity: 0; transform: translateY(20px) scale(0.95); animation: fadeInUp 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;" onclick="handlePhotoClick(this, event)">
                        <div class="photo-checkbox" style="display: none; position: absolute; top: 12px; left: 12px; z-index: 10; width: 24px; height: 24px; border: 2px solid white; border-radius: 4px; background: rgba(0,0,0,0.5); cursor: pointer; transition: all 0.2s;">
                            <svg style="display: none; width: 100%; height: 100%; color: white;" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="photo-image-container" style="width: 100%; aspect-ratio: 4/3; overflow: hidden; background: var(--hover-bg); position: relative;">
                            <img loading="lazy" src="{{ asset('storage/' . $photo->image_path) }}" alt="{{ $photo->title }}" class="photo-image" style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);">
                            <div class="photo-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 50%); opacity: 0; transition: opacity 0.3s ease; display: flex; align-items: flex-end; justify-content: center; padding: 16px; gap: 8px;">
                                <a href="{{ route('gallery.download', $photo) }}" class="photo-action-btn" onclick="event.stopPropagation();" style="background: rgba(255,255,255,0.95); color: var(--text-primary); padding: 8px 12px; border-radius: 6px; text-decoration: none; font-size: 12px; font-weight: 500; transition: transform 0.2s;">⬇ Download</a>
                                <a href="{{ route('gallery.edit', $photo) }}" class="photo-action-btn" onclick="event.stopPropagation();" style="background: rgba(255,255,255,0.95); color: var(--text-primary); padding: 8px 12px; border-radius: 6px; text-decoration: none; font-size: 12px; font-weight: 500; transition: transform 0.2s;">✏️ Edit</a>
                            </div>
                        </div>
                        <div style="padding: 16px; background: var(--bg-secondary);">
                            <h3 style="font-size: 16px; font-weight: 500; color: var(--text-primary); margin-bottom: 8px;">{{ $photo->title }}</h3>
                    @if($photo->description)
                                <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 8px; line-height: 1.5; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $photo->description }}</p>
                    @endif
                    @if($photo->photo_date)
                                <p style="font-size: 12px; color: var(--text-secondary); opacity: 0.7;">{{ $photo->photo_date->format('d M Y') }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div style="display: flex; justify-content: center; margin-top: 40px;">
                {{ $photos->links() }}
            </div>
        @else
            <div style="text-align: center; padding: 80px 20px;">
                <p style="color: var(--text-secondary); font-size: 16px; margin-bottom: 24px;">
                    @if(request('search'))
                        Tidak ada foto yang ditemukan untuk "{{ request('search') }}"
                    @else
                        Belum ada foto
                    @endif
                </p>
                <a href="{{ route('gallery.create') }}" class="btn">Upload Foto</a>
            </div>
        @endif
    </div>
</div>

<!-- Enhanced Lightbox with Zoom -->
<div id="lightbox" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.98); z-index: 2000; align-items: center; justify-content: center; padding: 40px; opacity: 0; transition: opacity 0.3s ease;">
    <button onclick="closeLightbox()" class="lightbox-close" style="position: absolute; top: 20px; right: 20px; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2); color: white; font-size: 28px; cursor: pointer; padding: 0; width: 48px; height: 48px; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: all 0.2s; z-index: 10;">&times;</button>
    
    <button onclick="navigateLightbox(-1)" class="lightbox-nav lightbox-prev" style="position: absolute; left: 20px; top: 50%; transform: translateY(-50%); background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2); color: white; font-size: 32px; cursor: pointer; padding: 16px 20px; border-radius: 12px; transition: all 0.2s; z-index: 10;">‹</button>
    <button onclick="navigateLightbox(1)" class="lightbox-nav lightbox-next" style="position: absolute; right: 20px; top: 50%; transform: translateY(-50%); background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2); color: white; font-size: 32px; cursor: pointer; padding: 16px 20px; border-radius: 12px; transition: all 0.2s; z-index: 10;">›</button>
    
    <div id="lightboxContent" style="position: relative; max-width: 95%; max-height: 95%; display: flex; flex-direction: column; align-items: center; cursor: grab;">
        <div id="lightboxImageContainer" style="position: relative; max-width: 100%; max-height: 80vh; overflow: hidden; border-radius: 12px; user-select: none;">
            <img id="lightboxImage" src="" alt="" style="max-width: 100%; max-height: 80vh; object-fit: contain; border-radius: 12px; transition: transform 0.3s ease; cursor: zoom-in;">
        </div>
        <div style="color: white; text-align: center; margin-top: 24px; max-width: 700px;">
            <h2 id="lightboxTitle" style="font-size: 28px; font-weight: 500; margin-bottom: 12px;"></h2>
            <p id="lightboxDescription" style="font-size: 18px; color: #ccc; margin-bottom: 8px; line-height: 1.6;"></p>
            <p id="lightboxDate" style="font-size: 14px; color: #999;"></p>
        </div>
        <div style="margin-top: 24px; display: flex; gap: 12px;">
            <a id="lightboxDownload" href="#" class="btn btn-secondary" style="text-decoration: none; background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); color: white; border: 1px solid rgba(255,255,255,0.3); padding: 12px 24px;">⬇ Download</a>
            <a id="lightboxEdit" href="#" class="btn btn-secondary" style="text-decoration: none; background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); color: white; border: 1px solid rgba(255,255,255,0.3); padding: 12px 24px;">✏️ Edit</a>
            <form id="lightboxDelete" action="#" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus foto ini?')" style="background: rgba(220,38,38,0.8); backdrop-filter: blur(10px); color: white; border: 1px solid rgba(220,38,38,0.5); padding: 12px 24px;">🗑️ Hapus</button>
            </form>
        </div>
        <div style="margin-top: 16px; color: rgba(255,255,255,0.6); font-size: 12px;">
            <span id="lightboxCounter"></span> • Gunakan mouse wheel untuk zoom • Klik dan drag untuk pan
        </div>
    </div>
</div>

<!-- Keyboard Shortcuts Modal -->
<div id="shortcutsModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 3000; align-items: center; justify-content: center; padding: 40px;">
    <div style="background: var(--bg-secondary); border-radius: 12px; padding: 32px; max-width: 600px; width: 100%; max-height: 80vh; overflow-y: auto; border: 1px solid var(--border-color);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <h2 style="font-size: 24px; font-weight: 500; color: var(--text-primary);">Keyboard Shortcuts</h2>
            <button onclick="closeShortcutsModal()" style="background: transparent; border: none; font-size: 24px; cursor: pointer; color: var(--text-secondary);">&times;</button>
        </div>
        <div style="display: flex; flex-direction: column; gap: 16px;">
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px; background: var(--hover-bg); border-radius: 6px;">
                <span style="color: var(--text-primary);">Navigate Lightbox</span>
                <kbd style="padding: 4px 8px; background: var(--bg-secondary); border: 1px solid var(--border-color); border-radius: 4px; font-size: 12px;">← →</kbd>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px; background: var(--hover-bg); border-radius: 6px;">
                <span style="color: var(--text-primary);">Close Lightbox</span>
                <kbd style="padding: 4px 8px; background: var(--bg-secondary); border: 1px solid var(--border-color); border-radius: 4px; font-size: 12px;">ESC</kbd>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px; background: var(--hover-bg); border-radius: 6px;">
                <span style="color: var(--text-primary);">Toggle Select Mode</span>
                <kbd style="padding: 4px 8px; background: var(--bg-secondary); border: 1px solid var(--border-color); border-radius: 4px; font-size: 12px;">S</kbd>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px; background: var(--hover-bg); border-radius: 6px;">
                <span style="color: var(--text-primary);">Start Slideshow</span>
                <kbd style="padding: 4px 8px; background: var(--bg-secondary); border: 1px solid var(--border-color); border-radius: 4px; font-size: 12px;">P</kbd>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px; background: var(--hover-bg); border-radius: 6px;">
                <span style="color: var(--text-primary);">Select All</span>
                <kbd style="padding: 4px 8px; background: var(--bg-secondary); border: 1px solid var(--border-color); border-radius: 4px; font-size: 12px;">Ctrl+A</kbd>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px; background: var(--hover-bg); border-radius: 6px;">
                <span style="color: var(--text-primary);">Show Shortcuts</span>
                <kbd style="padding: 4px 8px; background: var(--bg-secondary); border: 1px solid var(--border-color); border-radius: 4px; font-size: 12px;">?</kbd>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 16px rgba(0,0,0,0.1);
}

.featured-photo:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 12px 24px rgba(0,0,0,0.15);
}

.featured-photo:hover img {
    transform: scale(1.1);
}

.featured-photo:hover > div > div {
    opacity: 1;
}

.photo-card {
    animation-delay: calc(var(--index, 0) * 0.03s);
}

.photo-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 12px 24px rgba(0,0,0,0.15);
}

.photo-card:hover .photo-image {
    transform: scale(1.1);
}

.photo-card:hover .photo-overlay {
    opacity: 1;
}

.photo-card.selected {
    border-color: #3b82f6;
    border-width: 2px;
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.2);
}

.photo-card.selected .photo-checkbox {
    display: block;
    background: #3b82f6;
    border-color: #3b82f6;
}

.photo-card.selected .photo-checkbox svg {
    display: block;
}

.photo-action-btn:hover {
    transform: translateY(-2px) scale(1.05);
}

.lightbox-close:hover,
.lightbox-nav:hover {
    background: rgba(255,255,255,0.2);
    transform: scale(1.1);
}

.lightbox-prev:hover {
    transform: translateY(-50%) scale(1.1);
}

.lightbox-next:hover {
    transform: translateY(-50%) scale(1.1);
}

.photo-grid.masonry {
    column-count: 4;
    column-gap: 24px;
}

.photo-grid.masonry .photo-card {
    break-inside: avoid;
    margin-bottom: 24px;
}

@media (max-width: 1200px) {
    .photo-grid.masonry {
        column-count: 3;
    }
}

[data-theme="dark"] .hero-section {
    background: linear-gradient(135deg, #1f1f23 0%, #2d1b3d 50%, #1e1b2e 100%) !important;
    box-shadow: 0 20px 60px rgba(236, 72, 153, 0.2) !important;
}

[data-theme="dark"] .stat-card {
    background: linear-gradient(135deg, #1a1a1a 0%, #2a1a2a 100%) !important;
    border-color: #3e3e3a !important;
}

@media (max-width: 768px) {
    .photo-grid.masonry {
        column-count: 2;
    }
    
    .lightbox-nav {
        display: none;
    }
    
    .hero-section h1 {
        font-size: 36px !important;
    }
    
    .hero-section p {
        font-size: 16px !important;
    }
    
    .couple-names {
        font-size: 16px !important;
    }
}
</style>

@php
    $searchValue = request('search') ?? '';
    $galleryIndexRoute = route('gallery.index');
@endphp
<script>
let currentPhotoIndex = 0;
let allPhotos = [];
let selectMode = false;
let selectedPhotos = new Set();
let slideshowInterval = null;
let isZoomed = false;
let zoomLevel = 1;
let panX = 0;
let panY = 0;
var galleryIndexUrl = '{{ $galleryIndexRoute }}';

// Build photos array from DOM
document.addEventListener('DOMContentLoaded', function() {
    const photoCards = document.querySelectorAll('.photo-card');
    const featuredPhotos = document.querySelectorAll('.featured-photo');
    
    [...photoCards, ...featuredPhotos].forEach(function(card) {
        allPhotos.push({
            id: parseInt(card.getAttribute('data-id')),
            title: card.getAttribute('data-title'),
            description: card.getAttribute('data-description'),
            image_path: card.getAttribute('data-image-path'),
            photo_date: card.getAttribute('data-date') ? card.getAttribute('data-date').split(' ')[0] : null
        });
    });
    
    // Set animation delays for photo cards
    photoCards.forEach((card, index) => {
        card.style.setProperty('--index', index);
    });
    
    // Set animation delays for featured photos
    featuredPhotos.forEach((photo, index) => {
        const delay = index * 0.1;
        photo.style.animation = `fadeInUp 0.6s cubic-bezier(0.4, 0, 0.2, 1) ${delay}s both`;
    });
});

function toggleFullGallery() {
    const gallery = document.getElementById('fullGallery');
    const btn = document.getElementById('toggleGalleryBtn');
    const text = document.getElementById('toggleGalleryText');
    
    if (gallery.style.display === 'none') {
        gallery.style.display = 'block';
        text.textContent = 'Sembunyikan Gallery';
        setTimeout(() => {
            gallery.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }, 100);
    } else {
        gallery.style.display = 'none';
        text.textContent = 'Tampilkan Gallery';
    }
}

function handleSortChange(value) {
    var searchParam = '{{ $searchValue }}';
    var url = galleryIndexUrl + '?sort=' + value;
    if (searchParam && searchParam !== '') {
        url = url + '&search=' + encodeURIComponent(searchParam);
    }
    window.location.href = url;
}

function setViewMode(mode) {
    const grid = document.getElementById('photoGrid');
    const gridBtn = document.getElementById('viewGrid');
    const masonryBtn = document.getElementById('viewMasonry');
    
    if (mode === 'masonry') {
        grid.classList.add('masonry');
        grid.style.display = 'block';
        grid.style.gridTemplateColumns = 'none';
        masonryBtn.style.background = 'var(--text-primary)';
        masonryBtn.style.color = 'var(--bg-secondary)';
        gridBtn.style.background = 'var(--bg-secondary)';
        gridBtn.style.color = 'var(--text-secondary)';
        localStorage.setItem('viewMode', 'masonry');
    } else {
        grid.classList.remove('masonry');
        grid.style.display = 'grid';
        grid.style.gridTemplateColumns = 'repeat(auto-fill, minmax(280px, 1fr))';
        gridBtn.style.background = 'var(--text-primary)';
        gridBtn.style.color = 'var(--bg-secondary)';
        masonryBtn.style.background = 'var(--bg-secondary)';
        masonryBtn.style.color = 'var(--text-secondary)';
        localStorage.setItem('viewMode', 'grid');
    }
}

// Load saved view mode
window.addEventListener('DOMContentLoaded', function() {
    const savedMode = localStorage.getItem('viewMode') || 'grid';
    setViewMode(savedMode);
});

function handlePhotoClick(element, event) {
    if (selectMode) {
        togglePhotoSelection(element);
        event.stopPropagation();
    } else {
        openLightboxFromCard(element);
    }
}

function toggleSelectMode() {
    selectMode = !selectMode;
    const cards = document.querySelectorAll('.photo-card');
    const batchActions = document.getElementById('batchActions');
    const selectModeBtn = document.getElementById('selectModeBtn');
    const selectModeText = document.getElementById('selectModeText');
    
    if (selectMode) {
        selectModeText.textContent = 'Exit Select';
        batchActions.style.display = 'flex';
        cards.forEach(card => {
            card.querySelector('.photo-checkbox').style.display = 'block';
        });
    } else {
        selectModeText.textContent = 'Select Mode';
        batchActions.style.display = 'none';
        cards.forEach(card => {
            card.classList.remove('selected');
            card.querySelector('.photo-checkbox').style.display = 'none';
        });
        selectedPhotos.clear();
        updateSelectedCount();
    }
}

function exitSelectMode() {
    selectMode = false;
    toggleSelectMode();
}

function togglePhotoSelection(element) {
    const photoId = element.getAttribute('data-id');
    const checkbox = element.querySelector('.photo-checkbox');
    
    if (selectedPhotos.has(photoId)) {
        selectedPhotos.delete(photoId);
        element.classList.remove('selected');
    } else {
        selectedPhotos.add(photoId);
        element.classList.add('selected');
    }
    updateSelectedCount();
}

function updateSelectedCount() {
    document.getElementById('selectedCount').textContent = selectedPhotos.size + ' selected';
}

function deleteSelected() {
    if (selectedPhotos.size === 0) return;
    if (!confirm('Hapus ' + selectedPhotos.size + ' foto yang dipilih?')) return;
    
    selectedPhotos.forEach(photoId => {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/photo/' + photoId;
        form.innerHTML = '@csrf @method("DELETE")';
        document.body.appendChild(form);
        form.submit();
    });
}

function openLightboxFromCard(element) {
    const image = element.getAttribute('data-image');
    const title = element.getAttribute('data-title');
    const description = element.getAttribute('data-description');
    const date = element.getAttribute('data-date');
    const photoId = element.getAttribute('data-id');
    const index = parseInt(element.getAttribute('data-index')) || 0;
    openLightbox(image, title, description, date, photoId, index);
}

function openLightbox(imageSrc, title, description, date, photoId, index) {
    currentPhotoIndex = index;
    const lightbox = document.getElementById('lightbox');
    lightbox.style.display = 'flex';
    setTimeout(() => lightbox.style.opacity = '1', 10);
    
    const img = document.getElementById('lightboxImage');
    img.src = imageSrc;
    img.style.transform = 'scale(1) translate(0, 0)';
    zoomLevel = 1;
    panX = 0;
    panY = 0;
    isZoomed = false;
    
    document.getElementById('lightboxTitle').textContent = title;
    document.getElementById('lightboxDescription').textContent = description || '';
    document.getElementById('lightboxDate').textContent = date || '';
    document.getElementById('lightboxEdit').href = '/photo/' + photoId + '/edit';
    document.getElementById('lightboxDownload').href = '/photo/' + photoId + '/download';
    document.getElementById('lightboxDelete').action = '/photo/' + photoId;
    document.getElementById('lightboxCounter').textContent = (index + 1) + ' / ' + allPhotos.length;
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    const lightbox = document.getElementById('lightbox');
    lightbox.style.opacity = '0';
    setTimeout(() => {
        lightbox.style.display = 'none';
        document.body.style.overflow = 'auto';
    }, 300);
}

function navigateLightbox(direction) {
    const total = allPhotos.length;
    currentPhotoIndex = (currentPhotoIndex + direction + total) % total;
    const photo = allPhotos[currentPhotoIndex];
    
    if (photo) {
        const photoDate = photo.photo_date ? new Date(photo.photo_date + 'T00:00:00').toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }) : '';
        const imagePath = '/storage/' + photo.image_path;
        openLightbox(
            imagePath,
            photo.title,
            photo.description || '',
            photoDate,
            photo.id,
            currentPhotoIndex
        );
    }
}

// Image Zoom
document.getElementById('lightboxImage')?.addEventListener('wheel', function(e) {
    if (!document.getElementById('lightbox').style.display || document.getElementById('lightbox').style.display === 'none') return;
    e.preventDefault();
    const delta = e.deltaY > 0 ? 0.9 : 1.1;
    zoomLevel = Math.max(1, Math.min(5, zoomLevel * delta));
    isZoomed = zoomLevel > 1;
    this.style.transform = `scale(${zoomLevel}) translate(${panX}px, ${panY}px)`;
    this.style.cursor = isZoomed ? 'grab' : 'zoom-in';
});

// Image Pan
let isDragging = false;
let startX, startY;

document.getElementById('lightboxImage')?.addEventListener('mousedown', function(e) {
    if (isZoomed) {
        isDragging = true;
        startX = e.clientX - panX;
        startY = e.clientY - panY;
        this.style.cursor = 'grabbing';
    }
});

document.addEventListener('mousemove', function(e) {
    if (isDragging && isZoomed) {
        panX = e.clientX - startX;
        panY = e.clientY - startY;
        document.getElementById('lightboxImage').style.transform = `scale(${zoomLevel}) translate(${panX}px, ${panY}px)`;
    }
});

document.addEventListener('mouseup', function() {
    isDragging = false;
    if (document.getElementById('lightboxImage')) {
        document.getElementById('lightboxImage').style.cursor = isZoomed ? 'grab' : 'zoom-in';
    }
});

// Slideshow
function startSlideshow() {
    if (allPhotos.length === 0) return;
    
    if (slideshowInterval) {
        stopSlideshow();
        return;
    }
    
    if (document.getElementById('lightbox').style.display === 'none') {
        const firstCard = document.querySelector('.photo-card, .featured-photo');
        if (firstCard) openLightboxFromCard(firstCard);
    }
    
    slideshowInterval = setInterval(() => {
        navigateLightbox(1);
    }, 3000);
    
    document.getElementById('slideshowBtn').textContent = '⏸ Stop Slideshow';
}

function stopSlideshow() {
    if (slideshowInterval) {
        clearInterval(slideshowInterval);
        slideshowInterval = null;
        document.getElementById('slideshowBtn').textContent = '🎬 Slideshow';
    }
}

// Keyboard Shortcuts
function showKeyboardShortcuts() {
    document.getElementById('shortcutsModal').style.display = 'flex';
}

function closeShortcutsModal() {
    document.getElementById('shortcutsModal').style.display = 'none';
}

document.addEventListener('keydown', function(e) {
    const lightbox = document.getElementById('lightbox');
    const shortcutsModal = document.getElementById('shortcutsModal');
    
    if (shortcutsModal.style.display === 'flex') {
        if (e.key === 'Escape') closeShortcutsModal();
        return;
    }
    
    if (lightbox.style.display === 'flex') {
        if (e.key === 'Escape') {
            closeLightbox();
            stopSlideshow();
        } else if (e.key === 'ArrowLeft') {
            navigateLightbox(-1);
        } else if (e.key === 'ArrowRight') {
            navigateLightbox(1);
        }
    } else {
        if (e.key === 's' || e.key === 'S') {
            if (!e.ctrlKey && !e.metaKey) {
                e.preventDefault();
                toggleSelectMode();
            }
        } else if (e.key === 'p' || e.key === 'P') {
            if (!e.ctrlKey && !e.metaKey) {
                e.preventDefault();
                startSlideshow();
            }
        } else if (e.key === '?' || e.key === '/') {
            e.preventDefault();
            showKeyboardShortcuts();
        } else if ((e.ctrlKey || e.metaKey) && e.key === 'a') {
            if (selectMode) {
                e.preventDefault();
                document.querySelectorAll('.photo-card').forEach(card => {
                    if (!card.classList.contains('selected')) {
                        togglePhotoSelection(card);
                    }
                });
            }
        }
    }
});

// Close lightbox when clicking outside
document.getElementById('lightbox')?.addEventListener('click', function(e) {
    if (e.target === this || e.target.classList.contains('lightbox-close')) {
        closeLightbox();
        stopSlideshow();
    }
});

// Close shortcuts modal when clicking outside
document.getElementById('shortcutsModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeShortcutsModal();
    }
});

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
});
</script>
@endsection
