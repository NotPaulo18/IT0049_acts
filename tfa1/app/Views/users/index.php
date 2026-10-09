<section class="page">
    <h1>User Accounts</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green;">
            <?= esc(session()->getFlashdata('success')) ?>
        </p>
    <?php endif; ?>

    <p>
        <a class="button" href="<?= site_url('users/new') ?>">
            Add New User
        </a>
    </p>

    <?php if (! empty($users)): ?>
        <table>
            <thead>
                <tr>
                    <th>Avatar</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($users as $user): ?>
                    <?php
                    $avatarFile = ! empty($user['avatar'])
                        ? $user['avatar']
                        : 'default-avatar.png';
                    ?>

                    <tr>
                        <td>
                            <img
                                src="<?= base_url(
                                    'uploads/avatars/'
                                    . rawurlencode($avatarFile)
                                ) ?>"
                                alt="<?= esc($user['full_name']) ?> avatar"
                                width="60"
                                height="60"
                                style="border-radius: 50%; object-fit: cover;"
                            >
                        </td>

                        <td><?= esc($user['username']) ?></td>

                        <td><?= esc($user['full_name']) ?></td>

                        <td>
                            <a href="<?= site_url(
                                'users/' . $user['id'] . '/edit'
                            ) ?>">
                                Edit
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No user accounts found.</p>
    <?php endif; ?>
</section>