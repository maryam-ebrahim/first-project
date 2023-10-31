<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>First Project</title>
</head>

<body>
  <?php if (Auth::check()) { ?>
    <h1>Hello {{ $name }}</h1>
  <?php } else { ?>
    <h1>not logged in</h1>
    <?php } ?>
</body>

</html>