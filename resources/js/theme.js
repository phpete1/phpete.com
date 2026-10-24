// Light/dark theme. The head script in layouts/app.blade.php sets <html data-theme> before first paint;
// this keeps it following the system and handles the header toggle.
const system = matchMedia('(prefers-color-scheme: light)');

const systemTheme = () => (system.matches ? 'light' : 'dark');

const saved = () => {
    try {
        return localStorage.getItem('theme');
    } catch {
        return null;
    }
};

const save = (theme) => {
    try {
        // Picking the system's own theme clears the override, so the page follows the system again.
        if (theme === systemTheme()) localStorage.removeItem('theme');
        else localStorage.setItem('theme', theme);
    } catch {
        // Storage blocked: the choice lasts until the next full page load.
    }
};

export function theme() {
    system.addEventListener('change', () => {
        if (!saved()) document.documentElement.dataset.theme = systemTheme();
    });

    // Delegated, since boosted navigation swaps the header out.
    document.addEventListener('click', (event) => {
        if (!event.target.closest('[data-theme-toggle]')) return;

        const next = document.documentElement.dataset.theme === 'light' ? 'dark' : 'light';
        document.documentElement.dataset.theme = next;
        save(next);
    });
}
