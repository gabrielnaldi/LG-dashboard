function initMobileSidebar() {
    const container = document.getElementById('mobile-sidebar-container');
    const openBtn = document.getElementById('open-mobile-sidebar');
    const closeBtn = document.getElementById('close-mobile-sidebar');
    const overlay = document.getElementById('mobile-sidebar-overlay');

    if (!container || !openBtn) return;

    function openSidebar() {
        container.classList.remove('hidden');
    }

    function closeSidebar() {
        container.classList.add('hidden');
    }

    openBtn.addEventListener('click', openSidebar);

    if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
    if (overlay) overlay.addEventListener('click', closeSidebar);
}