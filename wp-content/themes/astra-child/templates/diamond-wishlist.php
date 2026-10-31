<?php
/**
 * Diamond Wishlist and Shareable Shortlist Template
 */

// Enqueue wishlist styles
wp_enqueue_style( 'diamond-wishlist-css', get_stylesheet_directory_uri() . '/assets/css/wishlist.css', array(), defined('ASTRA_CHILD_THEME_VERSION') ? ASTRA_CHILD_THEME_VERSION : wp_get_theme()->get('Version') );

?>

<!-- Floating Trigger Button -->
<button id="diamond-wishlist-trigger" class="wishlist-trigger-btn" aria-label="<?php esc_attr_e( 'Open Wishlist', 'astra-child-diamond' ); ?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
    <span class="wishlist-count" id="wishlist-count-badge">0</span>
</button>

<!-- Backdrop -->
<div id="diamond-wishlist-backdrop" class="wishlist-backdrop"></div>

<!-- Slide-out Drawer -->
<div id="diamond-wishlist-drawer" class="wishlist-drawer">
    <div class="wishlist-header">
        <h2 class="wishlist-title"><?php esc_html_e( 'Your Shortlist', 'astra-child-diamond' ); ?></h2>
        <button id="wishlist-close-btn" class="wishlist-close-btn" aria-label="<?php esc_attr_e( 'Close Wishlist', 'astra-child-diamond' ); ?>">&times;</button>
    </div>

    <div class="wishlist-content">
        <div id="wishlist-empty-state" class="wishlist-empty">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
            <p><?php esc_html_e( 'Your wishlist is currently empty.', 'astra-child-diamond' ); ?></p>
            <p class="wishlist-empty-sub"><?php esc_html_e( 'Explore our collection to find your perfect diamond.', 'astra-child-diamond' ); ?></p>
        </div>

        <ul id="wishlist-items-list" class="wishlist-items">
            <!-- Items injected by JS -->
        </ul>
    </div>

    <div class="wishlist-footer">
        <div class="wishlist-totals">
            <div class="wishlist-total-row">
                <span class="total-label"><?php esc_html_e( 'Total Carat Weight:', 'astra-child-diamond' ); ?></span>
                <span id="wishlist-total-carat" class="total-value">0.00 ct</span>
            </div>
            <div class="wishlist-total-row">
                <span class="total-label"><?php esc_html_e( 'Total Value:', 'astra-child-diamond' ); ?></span>
                <span id="wishlist-total-value" class="total-value price-usd">$0.00</span>
            </div>
        </div>

        <div class="wishlist-actions">
            <button id="wishlist-share-btn" class="wishlist-action-btn primary-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
                <?php esc_html_e( 'Share Shortlist', 'astra-child-diamond' ); ?>
            </button>
            <div id="wishlist-share-container" class="share-container hidden">
                <input type="text" id="wishlist-share-url" readonly />
                <button id="wishlist-copy-btn" class="wishlist-action-btn outline-btn"><?php esc_html_e( 'Copy Link', 'astra-child-diamond' ); ?></button>
                <p id="wishlist-copy-msg" class="copy-msg hidden"><?php esc_html_e( 'Copied to clipboard!', 'astra-child-diamond' ); ?></p>
            </div>
            
            <button id="wishlist-clear-btn" class="wishlist-action-btn text-btn"><?php esc_html_e( 'Clear All', 'astra-child-diamond' ); ?></button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const STORAGE_KEY = 'diamond_wishlist';
    
    // UI Elements
    const triggerBtn = document.getElementById('diamond-wishlist-trigger');
    const badge = document.getElementById('wishlist-count-badge');
    const drawer = document.getElementById('diamond-wishlist-drawer');
    const backdrop = document.getElementById('diamond-wishlist-backdrop');
    const closeBtn = document.getElementById('wishlist-close-btn');
    const itemsList = document.getElementById('wishlist-items-list');
    const emptyState = document.getElementById('wishlist-empty-state');
    const totalCaratEl = document.getElementById('wishlist-total-carat');
    const totalValueEl = document.getElementById('wishlist-total-value');
    
    const shareBtn = document.getElementById('wishlist-share-btn');
    const shareContainer = document.getElementById('wishlist-share-container');
    const shareUrlInput = document.getElementById('wishlist-share-url');
    const copyBtn = document.getElementById('wishlist-copy-btn');
    const copyMsg = document.getElementById('wishlist-copy-msg');
    const clearBtn = document.getElementById('wishlist-clear-btn');

    let wishlist = [];

    // Initialize
    function init() {
        loadWishlist();
        parseUrlForShortlist();
        renderWishlist();
        setupEventListeners();
    }

    // Load from LocalStorage
    function loadWishlist() {
        try {
            const stored = localStorage.getItem(STORAGE_KEY);
            if (stored) {
                wishlist = JSON.parse(stored);
            }
        } catch (e) {
            console.error('Error loading wishlist from LocalStorage', e);
            wishlist = [];
        }
    }

    // Save to LocalStorage
    function saveWishlist() {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(wishlist));
        renderWishlist();
        triggerAccountSync();
    }

    // Trigger Account Sync hook (optional)
    function triggerAccountSync() {
        // Dispatch custom event for potential customer account sync integration
        const event = new CustomEvent('diamond_wishlist_updated', { detail: { items: wishlist } });
        document.dispatchEvent(event);
    }

    // Parse URL parameter to restore shared shortlist
    function parseUrlForShortlist() {
        const urlParams = new URLSearchParams(window.location.search);
        const shortlistData = urlParams.get('shortlist');
        
        if (shortlistData) {
            try {
                // Decode base64 and parse JSON
                const decoded = decodeURIComponent(escape(atob(shortlistData)));
                const sharedItems = JSON.parse(decoded);
                
                if (Array.isArray(sharedItems)) {
                    // Merge avoiding duplicates
                    sharedItems.forEach(item => {
                        if (!wishlist.find(i => i.id === item.id)) {
                            wishlist.push(item);
                        }
                    });
                    saveWishlist();
                    // Open drawer automatically if items are merged
                    openDrawer();
                    
                    // Remove shortlist param from URL to clean it up
                    const url = new URL(window.location.href);
                    url.searchParams.delete('shortlist');
                    window.history.pushState({path: url.href}, '', url.href);
                }
            } catch (e) {
                console.error('Failed to parse shortlist URL parameter', e);
            }
        }
    }

    // Drawer Toggles
    function openDrawer() {
        drawer.classList.add('open');
        backdrop.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeDrawer() {
        drawer.classList.remove('open');
        backdrop.classList.remove('open');
        document.body.style.overflow = '';
        // Hide share container on close
        shareContainer.classList.add('hidden');
    }

    // Render Wishlist
    function renderWishlist() {
        // Update badge
        const count = wishlist.length;
        badge.textContent = count;
        
        if (count > 0) {
            badge.style.display = 'flex';
            emptyState.style.display = 'none';
            itemsList.style.display = 'block';
            document.querySelector('.wishlist-footer').style.display = 'block';
        } else {
            badge.style.display = 'none';
            emptyState.style.display = 'flex';
            itemsList.style.display = 'none';
            document.querySelector('.wishlist-footer').style.display = 'none';
        }

        // Render items
        itemsList.innerHTML = '';
        let totalCarat = 0;
        let totalValue = 0;

        wishlist.forEach(item => {
            totalCarat += parseFloat(item.carat || 0);
            totalValue += parseFloat(item.price || 0);

            const li = document.createElement('li');
            li.className = 'wishlist-item';
            
            // Format price - defaulting to USD formatting, actual multi-currency would need integration with currency switcher
            const formattedPrice = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(item.price || 0);

            // Safe DOM insertion to prevent XSS
            const escapeHTML = str => {
                if (!str) return '';
                return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#039;');
            };

            const safeTitle = escapeHTML(item.title);
            const safeImage = escapeHTML(item.image);
            let safeUrl = '#';
            try {
                if (item.url) {
                    const parsedUrl = new URL(item.url, window.location.origin);
                    if (parsedUrl.protocol === 'http:' || parsedUrl.protocol === 'https:') {
                        safeUrl = parsedUrl.href;
                    }
                }
            } catch(e) {}
            const safeCarat = escapeHTML(item.carat);
            const safeColor = escapeHTML(item.color);
            const safeClarity = escapeHTML(item.clarity);
            const safeId = escapeHTML(item.id);

            li.innerHTML = `
                <div class="wishlist-item-img">
                    ${safeImage ? `<img src="${safeImage}" alt="${safeTitle}" />` : '<div class="no-img"></div>'}
                </div>
                <div class="wishlist-item-details">
                    <h4 class="wishlist-item-title"><a href="${safeUrl}">${safeTitle}</a></h4>
                    <div class="wishlist-item-specs">
                        ${safeCarat ? `<span>${safeCarat} Carat</span>` : ''}
                        ${safeColor ? `<span>${safeColor} Color</span>` : ''}
                        ${safeClarity ? `<span>${safeClarity}</span>` : ''}
                    </div>
                    <div class="wishlist-item-price">${formattedPrice}</div>
                </div>
                <button class="wishlist-item-remove" data-id="${safeId}" aria-label="Remove item">&times;</button>
            `;
            itemsList.appendChild(li);
        });

        // Update Totals
        totalCaratEl.textContent = totalCarat.toFixed(2) + ' ct';
        totalValueEl.textContent = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(totalValue);
    }

    // Generate Shareable Link
    function generateShareLink() {
        if (wishlist.length === 0) return '';
        
        // Optimize payload by taking only necessary fields to keep base64 string reasonable
        const shareableData = wishlist.map(item => ({
            id: item.id,
            title: item.title,
            url: item.url,
            image: item.image,
            price: item.price,
            carat: item.carat,
            color: item.color,
            clarity: item.clarity
        }));
        
        const jsonStr = JSON.stringify(shareableData);
        const encoded = btoa(unescape(encodeURIComponent(jsonStr)));
        
        const baseUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
        return baseUrl + '?shortlist=' + encodeURIComponent(encoded);
    }

    // Event Listeners Setup
    function setupEventListeners() {
        triggerBtn.addEventListener('click', openDrawer);
        closeBtn.addEventListener('click', closeDrawer);
        backdrop.addEventListener('click', closeDrawer);
        
        // Remove item delegation
        itemsList.addEventListener('click', function(e) {
            if (e.target.classList.contains('wishlist-item-remove')) {
                const id = e.target.getAttribute('data-id');
                wishlist = wishlist.filter(item => String(item.id) !== String(id));
                saveWishlist();
            }
        });

        // Share button
        shareBtn.addEventListener('click', function() {
            const link = generateShareLink();
            if (link) {
                shareUrlInput.value = link;
                shareContainer.classList.remove('hidden');
            }
        });

        // Copy button
        copyBtn.addEventListener('click', function() {
            shareUrlInput.select();
            shareUrlInput.setSelectionRange(0, 99999);
            
            try {
                navigator.clipboard.writeText(shareUrlInput.value).then(() => {
                    copyMsg.classList.remove('hidden');
                    setTimeout(() => copyMsg.classList.add('hidden'), 2000);
                });
            } catch (err) {
                // Fallback for older browsers
                document.execCommand('copy');
                copyMsg.classList.remove('hidden');
                setTimeout(() => copyMsg.classList.add('hidden'), 2000);
            }
        });

        // Clear button
        clearBtn.addEventListener('click', function() {
            if (confirm('Are you sure you want to clear your wishlist?')) {
                wishlist = [];
                saveWishlist();
                shareContainer.classList.add('hidden');
            }
        });

        // Global function to allow external scripts (like PDP buttons) to add items
        window.addToDiamondWishlist = function(itemData) {
            // itemData should look like: { id, title, price, carat, color, clarity, image, url }
            const existing = wishlist.find(i => String(i.id) === String(itemData.id));
            if (!existing) {
                wishlist.push(itemData);
                saveWishlist();
                openDrawer();
            } else {
                // Already in wishlist, maybe just open drawer
                openDrawer();
            }
        };
        
        window.removeFromDiamondWishlist = function(itemId) {
            wishlist = wishlist.filter(item => String(item.id) !== String(itemId));
            saveWishlist();
        };
        
        window.isInDiamondWishlist = function(itemId) {
            return wishlist.some(i => String(i.id) === String(itemId));
        };
    }

    // Run
    init();
});
</script>
