// Hover intent for the htmx preload extension. Links under preload="preload:intent" are fetched
// once the pointer has rested on them for HOVER_MS, so a link that merely passes under the cursor
// while scrolling isn't fetched; a touch fetches straight away. Links to the current page never are.
const HOVER_MS = 250;

export function preload() {
    let pending = null;
    let timer;

    const linkFor = (event) => {
        const link = event.target.closest?.('a[href]');
        if (!link?.closest('[preload]')) return null;
        if (link.href.split('#')[0] === location.href.split('#')[0]) return null;
        return link;
    };

    const fire = (link) => link.dispatchEvent(new Event('preload:intent'));

    document.addEventListener('pointerover', (event) => {
        const link = linkFor(event);
        if (!link || link === pending) return;
        clearTimeout(timer);
        pending = null;
        if (event.pointerType !== 'mouse') return fire(link);
        pending = link;
        timer = setTimeout(() => fire(link), HOVER_MS);
    });

    document.addEventListener('pointerout', (event) => {
        if (!pending || pending.contains(event.relatedTarget)) return;
        clearTimeout(timer);
        pending = null;
    });
}
