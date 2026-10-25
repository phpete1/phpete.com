// Single-key shortcuts: an element marked aria-keyshortcuts="h" is used when H is pressed. A link is clicked
// (rather than setting location) to keep htmx boost and the menu bracket transition; a dialog is opened.
export function shortcuts() {
    document.addEventListener('keydown', (event) => {
        if (event.defaultPrevented || event.repeat || event.ctrlKey || event.metaKey || event.altKey) return;
        if (event.target.closest('input, textarea, select, [contenteditable]')) return;
        if (document.querySelector('dialog[open]')) return;

        const key = event.key.toLowerCase();
        if (!/^[a-z?]$/.test(key)) return;

        const target = document.querySelector(`a[aria-keyshortcuts~="${key}" i], dialog[aria-keyshortcuts~="${key}" i]`);
        if (!target || target.getAttribute('aria-current') === 'page') return;

        event.preventDefault();
        if (target instanceof HTMLDialogElement) target.showModal();
        else target.click();
    });
}
