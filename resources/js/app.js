import htmx from 'htmx.org';
import 'htmx-ext-preload';
import { finishScramble, scramble } from './scramble';
import { shortcuts } from './shortcuts';
import { finishTypeIn, typeIn } from './type-in';

// Swaps run inside a View Transition so the menu brackets can slide to the new page (app.css).
htmx.config.globalViewTransitions = true;

shortcuts();
typeIn();
scramble();

// Boosted links swap in the new page without a reload, so hide its text before the swap
// and run the effects on it once it has settled.
document.addEventListener('htmx:beforeSwap', (event) => {
    if (event.detail.boosted && !matchMedia('(prefers-reduced-motion: reduce)').matches) {
        document.documentElement.classList.add('will-type');
    }
});

document.addEventListener('htmx:afterSettle', (event) => {
    if (!event.detail.boosted) return;
    typeIn();
    scramble();
});

// htmx snapshots the page for the back button before leaving it; finish the effects first
// so a page left mid-animation isn't restored half-typed.
document.addEventListener('htmx:beforeHistorySave', () => {
    finishTypeIn();
    finishScramble();
});
