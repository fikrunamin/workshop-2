<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Workshop 2: <?= $title; ?></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/load-awesome/line-scale.min.css'); ?>">

</head>

<body class="font-sans antialiased">

    <div class="h-screen max-h-screen bg-blue-500 flex justify-center items-center">

        <!-- Page Content -->
        <main>
            <?= $this->renderSection('content'); ?>
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <?= $this->renderSection('scripts'); ?>
</body>

</html>