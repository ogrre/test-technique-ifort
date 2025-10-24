/**
 * Registrations Management JavaScript
 * Handles priority toggling, deletion, search, and filtering
 */

// Get CSRF token from meta tag or page
const getCsrfToken = () => {
    const metaTag = document.querySelector('meta[name="csrf-token"]');
    return metaTag ? metaTag.content : '';
};

/**
 * Initialize priority buttons
 */
const initializePriorityButtons = () => {
    document.querySelectorAll('.btn-priorite').forEach(button => {
        button.addEventListener('click', async function() {
            const id = this.dataset.id;

            try {
                const response = await fetch(`/registrations/${id}/toggle-priority`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': getCsrfToken()
                    }
                });

                if (response.ok) {
                    location.reload();
                } else {
                    console.error('Failed to toggle priority');
                }
            } catch (error) {
                console.error('Error toggling priority:', error);
            }
        });
    });
};

/**
 * Initialize delete buttons
 */
const initializeDeleteButtons = () => {
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', async function(e) {
            e.preventDefault();

            if (!confirm('Êtes-vous sûr de vouloir supprimer cette inscription ?')) {
                return;
            }

            const id = this.dataset.id;

            try {
                const response = await fetch(`/registrations/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': getCsrfToken()
                    }
                });

                if (response.ok) {
                    location.reload();
                } else {
                    console.error('Failed to delete registration');
                }
            } catch (error) {
                console.error('Error deleting registration:', error);
            }
        });
    });
};

/**
 * Filter table based on search and status
 */
const filterTable = () => {
    const searchInput = document.getElementById('search-input');
    const statusFilter = document.getElementById('status-filter');

    if (!searchInput || !statusFilter) return;

    const searchValue = searchInput.value.toLowerCase();
    const statusValue = statusFilter.value;

    const url = new URL(window.location);

    if (searchValue) {
        url.searchParams.set('search', searchValue);
    } else {
        url.searchParams.delete('search');
    }

    if (statusValue) {
        url.searchParams.set('status', statusValue);
    } else {
        url.searchParams.delete('status');
    }

    window.location = url;
};

/**
 * Initialize search and filter functionality
 */
const initializeSearchAndFilter = () => {
    const searchInput = document.getElementById('search-input');
    const statusFilter = document.getElementById('status-filter');

    if (!searchInput || !statusFilter) return;

    // Debounced search
    let searchTimeout;
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(filterTable, 500);
    });

    // Immediate filter on status change
    statusFilter.addEventListener('change', filterTable);

    // Restore values from URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('search')) {
        searchInput.value = urlParams.get('search');
    }
    if (urlParams.has('status')) {
        statusFilter.value = urlParams.get('status');
    }
};

/**
 * Initialize all functionality when DOM is ready
 */
const initializeRegistrations = () => {
    initializePriorityButtons();
    initializeDeleteButtons();
    initializeSearchAndFilter();
};

// Auto-initialize when DOM is loaded
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeRegistrations);
} else {
    initializeRegistrations();
}

// Export for manual initialization if needed
export { initializeRegistrations };
