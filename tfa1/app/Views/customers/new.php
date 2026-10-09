<section class="page">
    <h1><?= esc($title) ?></h1>

    <?php if (! empty($errors)): ?>
        <div style="color: red;">
            <p><strong>Please correct the following errors:</strong></p>

            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('customers') ?>" method="post">
        <?= csrf_field() ?>

        <p>
            <label for="full_name">Full Name</label><br>

            <input
                type="text"
                id="full_name"
                name="full_name"
                value="<?= old('full_name') ?>"
                maxlength="100"
            >
        </p>

        <p>
            <label for="email">Email</label><br>

            <input
                type="email"
                id="email"
                name="email"
                value="<?= old('email') ?>"
                maxlength="100"
            >
        </p>

        <p>
            <label for="phone">Phone</label><br>

            <input
                type="text"
                id="phone"
                name="phone"
                value="<?= old('phone') ?>"
                maxlength="20"
            >
        </p>

        <button type="submit">Save Customer</button>

        <a href="<?= site_url('customers') ?>">
            Cancel
        </a>
    </form>
</section>