<section class="page">
    <h1>Add New User</h1>

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

    <form action="<?= site_url('users') ?>" method="post">
        <?= csrf_field() ?>

        <p>
            <label for="username">Username</label><br>

            <input
                type="text"
                id="username"
                name="username"
                value="<?= esc(old('username')) ?>"
                maxlength="50"
            >
        </p>

        <p>
            <label for="full_name">Full Name</label><br>

            <input
                type="text"
                id="full_name"
                name="full_name"
                value="<?= esc(old('full_name')) ?>"
                maxlength="100"
            >
        </p>

        <button type="submit">Save User</button>

        <a href="<?= site_url('users') ?>">
            Cancel
        </a>
    </form>
</section>