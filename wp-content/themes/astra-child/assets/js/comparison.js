/**
 * Product Comparison Tool
 * Compare multiple diamonds side by side
 */

(function($) {
    'use strict';

    const ProductComparison = {
        comparedProducts: [],
        maxProducts: 4,

        init: function() {
            this.loadFromStorage();
            this.bindEvents();
            this.updateComparisonBar();
        },

        bindEvents: function() {
            // Add to compare
            $(document).on('click', '.add-to-compare', this.addToCompare.bind(this));
            
            // Remove from compare
            $(document).on('click', '.remove-from-compare', this.removeFromCompare.bind(this));
            
            // View comparison
            $('#view-comparison-btn').on('click', this.viewComparison.bind(this));
            
            // Clear all
            $('#clear-comparison-btn').on('click', this.clearAll.bind(this));
            
            // Close comparison modal
            $('.comparison-modal-close').on('click', this.closeModal.bind(this));
            
            // Compare checkboxes
            $('.compare-checkbox').on('change', this.handleCheckboxChange.bind(this));
        },

        handleCheckboxChange: function(e) {
            const $checkbox = $(e.currentTarget);
            const productId = $checkbox.data('product-id');

            if ($checkbox.is(':checked')) {
                this.addProduct(productId);
            } else {
                this.removeProduct(productId);
            }
        },

        addToCompare: function(e) {
            e.preventDefault();
            
            const productId = $(e.currentTarget).data('product-id');
            this.addProduct(productId);
        },

        removeFromCompare: function(e) {
            e.preventDefault();
            
            const productId = $(e.currentTarget).data('product-id');
            this.removeProduct(productId);
        },

        addProduct: function(productId) {
            if (this.comparedProducts.length >= this.maxProducts) {
                this.showNotification(`You can only compare up to ${this.maxProducts} products at once.`, 'error');
                return;
            }

            if (this.comparedProducts.includes(productId)) {
                this.showNotification('Product already in comparison.', 'info');
                return;
            }

            this.comparedProducts.push(productId);
            this.saveToStorage();
            this.updateComparisonBar();
            this.updateCheckboxes();
            
            this.showNotification('Product added to comparison.', 'success');
        },

        removeProduct: function(productId) {
            const index = this.comparedProducts.indexOf(productId);
            if (index > -1) {
                this.comparedProducts.splice(index, 1);
                this.saveToStorage();
                this.updateComparisonBar();
                this.updateCheckboxes();
                
                this.showNotification('Product removed from comparison.', 'info');
            }
        },

        clearAll: function(e) {
            if (e) e.preventDefault();
            
            this.comparedProducts = [];
            this.saveToStorage();
            this.updateComparisonBar();
            this.updateCheckboxes();
            
            this.showNotification('Comparison cleared.', 'info');
        },

        updateComparisonBar: function() {
            const count = this.comparedProducts.length;
            
            if (count > 0) {
                $('.comparison-bar').addClass('active');
                $('#comparison-count').text(`${count} product${count > 1 ? 's' : ''} selected`);
                $('#view-comparison-btn').prop('disabled', count < 2);
            } else {
                $('.comparison-bar').removeClass('active');
            }

            // Update product items in comparison bar
            this.updateComparisonBarItems();
        },

        updateComparisonBarItems: function() {
            const $container = $('#comparison-items');
            $container.empty();

            this.comparedProducts.forEach(productId => {
                const $product = $(`.product-card[data-product-id="${productId}"]`);
                const name = $product.find('.product-title').text() || 'Product';
                const image = $product.find('.product-image img').attr('src') || '';

                const itemHtml = `
                    <div class="comparison-item">
                        <img src="${image}" alt="${name}" />
                        <button class="remove-from-compare" data-product-id="${productId}">×</button>
                    </div>
                `;

                $container.append(itemHtml);
            });
        },

        updateCheckboxes: function() {
            $('.compare-checkbox').each((index, element) => {
                const $checkbox = $(element);
                const productId = $checkbox.data('product-id');
                $checkbox.prop('checked', this.comparedProducts.includes(productId));
            });
        },

        viewComparison: function(e) {
            e.preventDefault();
            
            if (this.comparedProducts.length < 2) {
                this.showNotification('Please select at least 2 products to compare.', 'error');
                return;
            }

            // Show loading
            $('.comparison-modal-loading').show();
            $('.comparison-modal-content').hide();
            $('.comparison-modal').fadeIn(300);

            // Fetch comparison data
            $.ajax({
                url: diamondAjax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'get_product_comparison',
                    product_ids: this.comparedProducts,
                    nonce: diamondAjax.nonce
                },
                success: (response) => {
                    if (response.success) {
                        this.displayComparison(response.data);
                    } else {
                        this.showNotification('Failed to load comparison.', 'error');
                        this.closeModal();
                    }
                },
                error: () => {
                    this.showNotification('Failed to load comparison.', 'error');
                    this.closeModal();
                }
            });
        },

        displayComparison: function(data) {
            const html = this.buildComparisonTable(data);
            $('.comparison-modal-content').html(html).show();
            $('.comparison-modal-loading').hide();
        },

        buildComparisonTable: function(data) {
            let html = '<div class="comparison-table-wrapper">';
            html += '<table class="comparison-table">';
            
            // Header with product images and names
            html += '<thead><tr><th class="spec-column">Specification</th>';
            data.products.forEach(product => {
                html += `
                    <th class="product-column">
                        <div class="product-header">
                            <img src="${product.image}" alt="${product.name}" />
                            <h4>${product.name}</h4>
                            <div class="product-price">${product.price}</div>
                        </div>
                    </th>
                `;
            });
            html += '</tr></thead>';
            
            // Body with specifications
            html += '<tbody>';
            
            const specs = [
                { key: 'shape', label: 'Shape' },
                { key: 'carat', label: 'Carat Weight' },
                { key: 'color', label: 'Color Grade' },
                { key: 'clarity', label: 'Clarity Grade' },
                { key: 'cut', label: 'Cut Grade' },
                { key: 'polish', label: 'Polish' },
                { key: 'symmetry', label: 'Symmetry' },
                { key: 'fluorescence', label: 'Fluorescence' },
                { key: 'table', label: 'Table %' },
                { key: 'depth', label: 'Depth %' },
                { key: 'measurements', label: 'Measurements' },
                { key: 'certification', label: 'Certification' }
            ];
            
            specs.forEach(spec => {
                html += `<tr><td class="spec-label">${spec.label}</td>`;
                
                data.products.forEach(product => {
                    const value = product.specs[spec.key] || 'N/A';
                    html += `<td class="spec-value">${value}</td>`;
                });
                
                html += '</tr>';
            });
            
            html += '</tbody>';
            
            // Footer with action buttons
            html += '<tfoot><tr><td></td>';
            data.products.forEach(product => {
                html += `
                    <td>
                        <a href="${product.url}" class="btn btn-primary">View Details</a>
                        <button class="btn btn-outline add-to-cart-btn" data-product-id="${product.id}">Add to Cart</button>
                    </td>
                `;
            });
            html += '</tr></tfoot>';
            
            html += '</table></div>';
            
            return html;
        },

        closeModal: function() {
            $('.comparison-modal').fadeOut(300);
        },

        saveToStorage: function() {
            try {
                localStorage.setItem('compared_products', JSON.stringify(this.comparedProducts));
            } catch (e) {
                console.error('Failed to save to localStorage:', e);
            }
        },

        loadFromStorage: function() {
            try {
                const stored = localStorage.getItem('compared_products');
                if (stored) {
                    this.comparedProducts = JSON.parse(stored);
                }
            } catch (e) {
                console.error('Failed to load from localStorage:', e);
            }
        },

        showNotification: function(message, type) {
            const notification = `
                <div class="comparison-notification ${type}">
                    <span class="notification-icon">
                        ${type === 'success' ? '✓' : type === 'error' ? '✗' : 'ℹ'}
                    </span>
                    <span class="notification-message">${message}</span>
                </div>
            `;

            const $notification = $(notification);
            $('body').append($notification);

            setTimeout(() => {
                $notification.addClass('show');
            }, 100);

            setTimeout(() => {
                $notification.removeClass('show');
                setTimeout(() => {
                    $notification.remove();
                }, 300);
            }, 3000);
        }
    };

    /**
     * Initialize on document ready
     */
    $(document).ready(function() {
        ProductComparison.init();
    });

})(jQuery);
