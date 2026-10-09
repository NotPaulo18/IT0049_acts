<section class="page">
    <h1><?= esc($title) ?></h1>

    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green;">
            <?= esc(session()->getFlashdata('success')) ?>
        </p>
    <?php endif; ?>

    <p>
        <a class="button" href="<?= site_url('customers/new') ?>">
            Add New Customer
        </a>
    </p>

    <?php if (! empty($customers)): ?>
        <table>
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?= esc($customer['full_name']) ?></td>
                        <td><?= esc($customer['email']) ?></td>
                        <td>
                            <?= esc($customer['phone'] ?: 'Not provided') ?>
                        </td>
                        <td>
                            <a href="<?= site_url('customers/' . $customer['id'] . '/edit') ?>">
                                Edit
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No customer accounts found.</p>
    <?php endif; ?>
</section>