document.querySelectorAll('[data-module="vibe_check"]').forEach((root) => {
    const questions = [...root.querySelectorAll('[data-question]')];
    const button = root.querySelector('[data-action]');
    const end = root.querySelector('[data-end]');
    if (!questions.length || !button) return;

    let current = 0;
    let state = 'idle'; // idle → answering → answered

    const setState = (value) => {
        state = value;
        root.dataset.state = value;
    };

    const showQuestion = (index) => {
        questions.forEach((q, i) => (q.hidden = i !== index));
    };

    button.addEventListener('click', () => {
        if (state === 'idle') {
            questions[current].querySelectorAll('[data-answer]').forEach((a) => (a.disabled = false));
            setState('answering');
            button.hidden = true;
            return;
        }

        if (state === 'answered') {
            if (current < questions.length - 1) {
                current += 1;
                showQuestion(current);
                questions[current].querySelectorAll('[data-answer]').forEach((a) => (a.disabled = false));
                setState('answering');
                button.hidden = true;
            } else {
                questions.forEach((q) => (q.hidden = true));
                if (end) end.hidden = false;
                setState('done');
                button.hidden = true;
            }
        }
    });

    root.querySelectorAll('[data-answer]').forEach((answer) => {
        answer.addEventListener('click', () => {
            if (state !== 'answering') return;

            const isCorrect = answer.dataset.correct === '1';
            const list = answer.closest('.answers');

            // → Alle Antworten sperren und das Ergebnis markieren
            list.querySelectorAll('[data-answer]').forEach((a) => {
                a.disabled = true;
                if (a.dataset.correct === '1') a.classList.add('is-correct');
            });
            if (!isCorrect) answer.classList.add('is-wrong');

            // → Rückmeldung der gewählten Antwort zeigen
            const feedback = answer.closest('.answer').querySelector('[data-feedback]');
            if (feedback) feedback.hidden = false;

            button.textContent = button.dataset.nextLabel;
            button.hidden = false;
            setState('answered');
        });
    });
});