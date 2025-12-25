/**
 * LGD Diamond Core - Search Interactions
 * 
 * Handles the mobile-first slide-out filter panel.
 * 
 * @package LGD_Diamond_Core
 * @version 1.1.0
 */

(function() {
    'use strict';

    // DOM Elements
    const filterToggle = document.getElementById('lgd-filter-toggle');
    const filterPanel = document.getElementById('lgd-filter-panel');
    const filterClose = document.getElementById('lgd-filter-close');
    const filterApply = document.getElementById('lgd-filter-apply');
    const filterClear = document.getElementById('lgd-filter-clear');
    const filterOverlay = document.getElementById('lgd-filter-overlay');
    const filterCount = document.getElementById('lgd-filter-count');

    // State
    let isOpen = false;

    /**
     * Open Filter Panel
     */
    function openFilter() {
        if (!filterPanel) return;
        
        isOpen = true;
        filterPanel.classList.add('lgd-filter-open');
        document.body.classList.add('lgd-no-scroll');
        
        if (filterOverlay) {
            filterOverlay.classList.add('lgd-overlay-active');
        }

        // Accessibility
        filterPanel.setAttribute('aria-hidden', 'false');
        if (filterClose) {
            filterClose.focus();
        }
    }

    /**
     * Close Filter Panel
     */
    function closeFilter() {
        if (!filterPanel) return;
        
        isOpen = false;
        filterPanel.classList.remove('lgd-filter-open');
        document.body.classList.remove('lgd-no-scroll');
        
        if (filterOverlay) {
            filterOverlay.classList.remove('lgd-overlay-active');
        }

        // Accessibility
        filterPanel.setAttribute('aria-hidden', 'true');
        if (filterToggle) {
            filterToggle.focus();
        }
    }

    /**
     * Update Filter Count Badge
     */
    function updateFilterCount() {
        if (!filterCount) return;
        
        const checkedInputs = filterPanel ? 
            filterPanel.querySelectorAll('input[type="checkbox"]:checked') : [];
        const count = checkedInputs.length;

        if (count > 0) {
            filterCount.textContent = count;
            filterCount.style.display = 'inline-flex';
        } else {
            filterCount.style.display = 'none';
        }
    }

    /**
     * Clear All Filters
     */
    function clearFilters() {
        if (!filterPanel) return;
        
        const checkboxes = filterPanel.querySelectorAll('input[type="checkbox"]:checked');
        checkboxes.forEach(cb => {
            cb.checked = false;
        });

        updateFilterCount();
    }

    /**
     * Apply Filters
     * Constructs URL with filter parameters and redirects.
     */
    function applyFilters() {
        if (!filterPanel) return;
        
        const checkboxes = filterPanel.querySelectorAll('input[type="checkbox"]:checked');
        const params = new URLSearchParams(window.location.search);

        // Clear existing filter params
        const taxonomies = ['diamond_shape', 'diamond_color', 'diamond_clarity', 'diamond_cut', 'diamond_lab'];
        taxonomies.forEach(tax => {
            params.delete(tax);
        });

        // Add checked values
        const filterGroups = {};
        checkboxes.forEach(cb => {
            const name = cb.name.replace('[]', '');
            if (!filterGroups[name]) {
                filterGroups[name] = [];
            }
            filterGroups[name].push(cb.value);
        });

        // Build query string
        Object.keys(filterGroups).forEach(key => {
            params.set(key, filterGroups[key].join(','));
        });

        // Redirect with filters
        const newUrl = window.location.pathname + '?' + params.toString();
        window.location.href = newUrl;
    }

    /**
     * Handle Keyboard Events
     */
    function handleKeyboard(e) {
        if (e.key === 'Escape' && isOpen) {
            closeFilter();
        }
    }

    /**
     * Initialize Event Listeners
     */
    function init() {
        // Toggle button
        if (filterToggle) {
            filterToggle.addEventListener('click', openFilter);
        }

        // Close button
        if (filterClose) {
            filterClose.addEventListener('click', closeFilter);
        }

        // Overlay click
        if (filterOverlay) {
            filterOverlay.addEventListener('click', closeFilter);
        }

        // Apply button
        if (filterApply) {
            filterApply.addEventListener('click', applyFilters);
        }

        // Clear button
        if (filterClear) {
            filterClear.addEventListener('click', clearFilters);
        }

        // Checkbox changes
        if (filterPanel) {
            filterPanel.addEventListener('change', function(e) {
                if (e.target.type === 'checkbox') {
                    updateFilterCount();
                }
            });
        }

        // Keyboard
        document.addEventListener('keydown', handleKeyboard);

        // Initial count
        updateFilterCount();

        // Parse URL and pre-check filters
        parseUrlFilters();
    }

    /**
     * Parse URL and Pre-check Filters
     */
    function parseUrlFilters() {
        if (!filterPanel) return;

        const params = new URLSearchParams(window.location.search);
        const taxonomies = ['diamond_shape', 'diamond_color', 'diamond_clarity', 'diamond_cut', 'diamond_lab'];

        taxonomies.forEach(tax => {
            const values = params.get(tax);
            if (values) {
                const slugs = values.split(',');
                slugs.forEach(slug => {
                    const checkbox = filterPanel.querySelector(`input[name="${tax}[]"][value="${slug}"]`);
                    if (checkbox) {
                        checkbox.checked = true;
                    }
                });
            }
        });

        updateFilterCount();
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
