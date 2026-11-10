<?php
$data      = $args['data'];
$questions = $data['questions'] ?? [];
?>

<section data-module="vibe_check" data-state="idle">
    <?php foreach ($questions as $q => $question) : ?>
        <div class="question" data-question <?= $q > 0 ? 'hidden' : '' ?>>

            <div class="insider">
                <?php if (!empty($data['insider_label'])) : ?>
                    <p class="insider__label"><?= esc_html($data['insider_label']) ?></p>
                <?php endif; ?>
                <blockquote class="insider__quote"><?= esc_html($question['quote']) ?></blockquote>
            </div>

            <div class="quiz">
                <?php if (!empty($data['quiz_tag'])) : ?>
                    <p class="quiz__tag"><?= esc_html($data['quiz_tag']) ?></p>
                <?php endif; ?>

                <h3 class="title"><?= esc_html($question['question']) ?></h3>

                <?php if (!empty($question['answers'])) : ?>
                    <ol class="answers">
                        <?php foreach ($question['answers'] as $a => $answer) : ?>
                            <li class="answer">
                                <button
                                        type="button"
                                        class="answer__button"
                                        data-answer
                                        data-correct="<?= !empty($answer['correct']) ? '1' : '0' ?>"
                                        disabled
                                >
                                    <span class="answer__number"><?= sprintf('%02d', $a + 1) ?></span>
                                    <?= esc_html($answer['answer']) ?>
                                </button>

                                <?php if (!empty($answer['feedback'])) : ?>
                                    <p class="answer__feedback" data-feedback hidden>
                                        <?= esc_html($answer['feedback']) ?>
                                    </p>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>

    <?php if (!empty($data['end_text'])) : ?>
        <p class="end" data-end hidden><?= nl2br(esc_html($data['end_text'])) ?></p>
    <?php endif; ?>

    <?php if (!empty($questions)) : ?>
        <button
                type="button"
                class="button"
                data-action
                data-start-label="<?= esc_attr($data['start_label']) ?>"
                data-next-label="<?= esc_attr($data['next_label']) ?>"
        >
            <?= esc_html($data['start_label']) ?>
        </button>
    <?php endif; ?>
</section>