// Type-in effect: reveals the text inside [data-type] elements character by character,
// followed by an orange block caret that blinks and fades out. The text is laid out from
// the start (just invisible), so nothing shifts while it types.
export function typeIn() {
    const root = document.documentElement;
    if (!root.classList.contains('will-type')) return;

    const chars = [];
    document.querySelectorAll('[data-type]').forEach((el) => {
        const walker = document.createTreeWalker(el, NodeFilter.SHOW_TEXT);
        const nodes = [];
        while (walker.nextNode()) if (walker.currentNode.textContent.trim()) nodes.push(walker.currentNode);
        nodes.forEach((node) => {
            const frag = document.createDocumentFragment();
            // Collapse whitespace, and drop template indentation at the start/end of an element.
            let text = node.textContent.replace(/\s+/g, ' ');
            if (!node.previousSibling) text = text.trimStart();
            if (!node.nextSibling) text = text.trimEnd();
            for (const ch of text) {
                const span = document.createElement('span');
                span.className = 'tw';
                span.textContent = ch;
                frag.appendChild(span);
                chars.push(span);
            }
            node.replaceWith(frag);
        });
    });
    root.classList.remove('will-type');
    if (!chars.length) return;

    const caret = document.createElement('span');
    caret.className = 'caret';
    caret.setAttribute('aria-hidden', 'true');

    // Never take longer than ~2.2s, however much text there is.
    const perSecond = Math.max(55, chars.length / 2.2);
    let start = null;
    let shown = 0;

    const frame = (t) => {
        if (start === null) start = t;
        const target = Math.min(chars.length, Math.floor(((t - start) / 1000) * perSecond));
        while (shown < target) chars[shown++].classList.add('on');
        if (shown) chars[shown - 1].after(caret);
        if (shown < chars.length) return requestAnimationFrame(frame);
        caret.classList.add('idle');
        setTimeout(() => caret.classList.add('gone'), 1800);
    };
    requestAnimationFrame(frame);
}

// Show all typed text at once and drop the caret.
export function finishTypeIn() {
    document.querySelectorAll('.tw').forEach((span) => span.classList.add('on'));
    document.querySelectorAll('.caret').forEach((caret) => caret.remove());
}
