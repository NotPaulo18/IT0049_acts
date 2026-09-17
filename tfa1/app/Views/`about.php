<section class="page">
    <h1><?= esc($heading) ?></h1>
    <p><?= esc($message) ?></p>

    <h2>How the pages work</h2>

    <ul>
        <li>The routes recognize the requested URLs.</li>
        <li>The controller decides which view to load.</li>
        <li>The views display the content to the visitor.</li>
    </ul>

    <a class="button" href="<?= site_url('/') ?>">
        Return to Home
    </a>
</section>