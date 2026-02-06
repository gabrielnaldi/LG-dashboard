function initFilterForm() {
    const clearBtn = document.getElementById('clear-filter-button');
    const filterInput = document.getElementById('product-filter-input');
    const form = document.getElementById('filter-form');

    const toggleClearBtn = () => {
        if (filterInput.value.trim() !== '') {
            clearBtn.classList.remove('hidden');
        } else {
            clearBtn.classList.add('hidden');
        }
    };

    filterInput.addEventListener('input', toggleClearBtn);

    toggleClearBtn();

    clearBtn.addEventListener('click', () => {
        filterInput.value = '';
        toggleClearBtn();
        form.submit();
    });
}