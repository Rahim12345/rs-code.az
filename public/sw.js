/**
 * RS Code — Service Worker
 * Strategy:
 *  - Static assets (CSS/JS/fonts/images): Cache-First
 *  - Navigation (HTML pages): Network-First with offline fallback
 *  - API / AJAX / POST: Network-Only
 */

const CACHE_NAME    = 'rscode-v1';
const OFFLINE_URL   = '/offline';

// Assets to pre-cache on install
const PRECACHE = [
    '/',
    '/offline',
    '/manifest.json',
    '/img/og-default.jpg',
    '/img/icon-192.png',
    '/img/icon-512.png',
    '/img/132.png',
];

// ── Install ───────────────────────────────────────────────────────────────────
self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME).then(cache => cache.addAll(PRECACHE))
    );
    self.skipWaiting();
});

// ── Activate — clean up old caches ───────────────────────────────────────────
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(keys =>
            Promise.all(
                keys.filter(k => k !== CACHE_NAME).map(k => caches.delete(k))
            )
        )
    );
    self.clients.claim();
});

// ── Fetch ─────────────────────────────────────────────────────────────────────
self.addEventListener('fetch', event => {
    const { request } = event;
    const url = new URL(request.url);

    // Skip non-http(s) schemes (chrome-extension, data, blob, etc.)
    if (url.protocol !== 'http:' && url.protocol !== 'https:') return;

    // Skip non-GET, admin, filemanager, track-click
    if (request.method !== 'GET') return;
    if (url.pathname.startsWith('/admin')) return;
    if (url.pathname.startsWith('/filemanager')) return;
    if (url.pathname.startsWith('/track-click')) return;
    if (url.pathname.startsWith('/language/')) return;

    // Static assets → Cache-First
    if (isStaticAsset(url.pathname)) {
        event.respondWith(cacheFirst(request));
        return;
    }

    // HTML navigation → Network-First
    if (request.mode === 'navigate') {
        event.respondWith(networkFirstWithFallback(request));
        return;
    }

    // Everything else → Network with cache fallback
    event.respondWith(networkWithCacheFallback(request));
});

// ── Helpers ───────────────────────────────────────────────────────────────────
function isStaticAsset(path) {
    return /\.(css|js|woff2?|ttf|eot|svg|png|jpe?g|gif|webp|ico|avif)$/i.test(path);
}

async function cacheFirst(request) {
    const cached = await caches.match(request);
    if (cached) return cached;
    try {
        const response = await fetch(request);
        if (response.ok) {
            const cache = await caches.open(CACHE_NAME);
            cache.put(request, response.clone());
        }
        return response;
    } catch {
        return new Response('', { status: 503 });
    }
}

async function networkFirstWithFallback(request) {
    try {
        const response = await fetch(request);
        if (response.ok) {
            const cache = await caches.open(CACHE_NAME);
            cache.put(request, response.clone());
        }
        return response;
    } catch {
        const cached = await caches.match(request);
        if (cached) return cached;
        return caches.match(OFFLINE_URL);
    }
}

async function networkWithCacheFallback(request) {
    try {
        return await fetch(request);
    } catch {
        const cached = await caches.match(request);
        return cached || new Response('', { status: 503 });
    }
}
