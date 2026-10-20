// Scramble-decode: [data-scramble] text starts as random glyphs and resolves left to right.
// Meant for monospace text, so the width never changes. Rows are staggered by their --i.
const GLYPHS = '!<>-_\\/[]{}=+*^?#01';

export function scramble() {
    if (matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    document.querySelectorAll('[data-scramble]').forEach((el) => {
        const final = el.textContent.replace(/\s+/g, ' ').trim();
        const index = Number(getComputedStyle(el).getPropertyValue('--i')) || 0;
        const delay = 450 + index * 120;
        const duration = 550;
        const random = () => GLYPHS[Math.floor(Math.random() * GLYPHS.length)];
        const noise = (from) => [...final].map((ch, i) => (i < from || ch === ' ' ? ch : random())).join('');

        el.setAttribute('aria-label', final);
        el.textContent = noise(0);
        el.style.opacity = '0';

        let start = null;
        const frame = (t) => {
            if (start === null) start = t;
            const elapsed = t - start - delay;
            if (elapsed < 0) return requestAnimationFrame(frame);

            el.style.opacity = '1';
            const resolved = Math.floor((elapsed / duration) * final.length);
            if (resolved >= final.length) {
                el.textContent = final;
                return;
            }
            el.textContent = noise(resolved);
            requestAnimationFrame(frame);
        };
        requestAnimationFrame(frame);
    });
}
