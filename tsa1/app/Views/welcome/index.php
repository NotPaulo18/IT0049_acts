<section>
    <h1>Welcome to Tasks for Today</h1>

    <p class="subtitle">
        Tasks scheduled for <?= esc($today) ?>
    </p>

    <?php if (empty($tasks)): ?>
        <div class="empty-message">
            No tasks are scheduled for today.
        </div>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= esc($task['title']) ?></td>

                        <td>
                            <span
                                class="status <?= esc(
                                    $task['status'],
                                    'attr'
                                ) ?>"
                            >
                                <?= esc(
                                    ucwords(
                                        str_replace(
                                            '_',
                                            ' ',
                                            $task['status']
                                        )
                                    )
                                ) ?>
                            </span>
                        </td>

                        <td>
                            <?= esc(
                                date(
                                    'F j, Y',
                                    strtotime($task['task_date'])
                                )
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</section>