<section>
    <h1>Demo User Profile</h1>

    <p class="subtitle">
        Information about the system's demo user.
    </p>

    <?php if (empty($user)): ?>
        <div class="empty-message">
            No user record was found.
        </div>
    <?php else: ?>
        <div class="profile-card">
            <div class="profile-row">
                <span class="profile-label">User ID:</span>
                <?= esc($user['id']) ?>
            </div>

            <div class="profile-row">
                <span class="profile-label">Username:</span>
                <?= esc($user['username']) ?>
            </div>

            <div class="profile-row">
                <span class="profile-label">Full Name:</span>
                <?= esc($user['full_name']) ?>
            </div>

            <div class="profile-row">
                <span class="profile-label">Email:</span>
                <?= esc($user['email']) ?>
            </div>

            <div class="profile-row">
                <span class="profile-label">Created:</span>

                <?= esc(
                    date(
                        'F j, Y g:i A',
                        strtotime($user['created_at'])
                    )
                ) ?>
            </div>
        </div>
    <?php endif; ?>
</section>