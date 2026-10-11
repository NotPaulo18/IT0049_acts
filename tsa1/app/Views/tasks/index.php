<section>
    <h1>Complete Task List</h1>

    <p class="subtitle">
        This page displays every task, ordered by task date.
    </p>

    <?php if (empty($tasks)): ?>
        <div class="empty-message">
            No task records were found.
        </div>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Task Date</th>
                    <th>Created</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= esc($task['id']) ?></td>

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

                        <td>
                            <?= esc(
                                date(
                                    'M j, Y g:i A',
                                    strtotime($task['created_at'])
                                )
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</section>