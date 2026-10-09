<section class="page">
    <h1>Edit User</h1>

    <?php if (! empty($errors)): ?>
        <div style="color: red;">
            <p>
                <strong>Please correct the following errors:</strong>
            </p>

            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php
    $avatarFile = ! empty($user['avatar'])
        ? $user['avatar']
        : 'default-avatar.png';
    ?>

    <p>
        <img
            src="<?= base_url(
                'uploads/avatars/' . rawurlencode($avatarFile)
            ) ?>"
            alt="<?= esc($user['full_name']) ?> avatar"
            width="120"
            height="120"
            style="
                border-radius: 50%;
                object-fit: cover;
            "
        >
    </p>

    <form
        action="<?= site_url('users/' . $user['id']) ?>"
        method="post"
        enctype="multipart/form-data"
    >
        <?= csrf_field() ?>

        <p>
            <label for="username">Username</label><br>

            <input
                type="text"
                id="username"
                name="username"
                value="<?= esc(old(
                    'username',
                    $user['username']
                )) ?>"
                maxlength="50"
            >
        </p>

        <p>
            <label for="full_name">Full Name</label><br>

            <input
                type="text"
                id="full_name"
                name="full_name"
                value="<?= esc(old(
                    'full_name',
                    $user['full_name']
                )) ?>"
                maxlength="100"
            >
        </p>

        <p>
            <label for="avatar">Profile Picture</label><br>

            <input
                type="file"
                id="avatar"
                name="avatar"
                accept=".jpg,.jpeg,.png,image/jpeg,image/png"
            >
        </p>

        <p>
            Only JPG and PNG files are allowed. Maximum size: 2 MB.
        </p>

        <button type="submit">Update User</button>

        <a href="<?= site_url('users') ?>">
            Cancel
        </a>
    </form>
</section>