// Single-key shortcuts: a link marked aria-keyshortcuts="h" is followed when H is pressed.
// Clicking the link (rather than setting location) keeps htmx boost and the menu bracket transition.
export function shortcuts() {
    document.addEventListener('keydown', (event) => {
        if (event.defaultPrevented || event.repeat || event.ctrlKey || event.metaKey || event.altKey) return;
        if (event.target.closest('input, textarea, select, [contenteditable]')) return;

        const key = event.key.toLowerCase();
        if (!/^[a-z]$/.test(key)) return;

        const link = document.querySelector(`a[aria-keyshortcuts~="${key}" i]`);
        if (!link || link.getAttribute('aria-current') === 'page') return;

        event.preventDefault();
        link.click();
    });
}
