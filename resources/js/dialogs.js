// Dialogs open and close through invoker commands (commandfor/command), with a fallback for browsers
// without them, and close on a backdrop click. Escape closes them natively.
export function dialogs() {
    if (!('command' in HTMLButtonElement.prototype)) {
        document.addEventListener('click', (event) => {
            const button = event.target.closest('button[commandfor]');
            const dialog = button && document.getElementById(button.getAttribute('commandfor'));
            if (!(dialog instanceof HTMLDialogElement)) return;

            const command = button.getAttribute('command');
            if (command === 'show-modal') dialog.showModal();
            else if (command === 'close') dialog.close();
        });
    }

    // A click on the dialog element itself, not its content, landed on the backdrop.
    // (closedby="any" would do this natively, but some browsers cancel the dialog as soon as it opens.)
    document.addEventListener('click', (event) => {
        if (event.target instanceof HTMLDialogElement && event.target.open) event.target.close();
    });
}
