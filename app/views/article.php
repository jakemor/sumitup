<!DOCTYPE html>
<html lang="en">
<head>

  <?php require '././settings.php'; ?>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title><?php echo $project_name; ?></title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS ( jakephp only supports direct paths to static files at the moment :p )
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="/jakephp/app/views/static/normalize.css">
  <link rel="stylesheet" href="/jakephp/app/views/static/skeleton.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>


  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container" style="margin-top:10%;">
    <div class="row" style="text-align:center;">
        <?php echo "<h4 style='text-align:center;'>" . $data["title"] . "</h4>"; ?>
        <?php echo "<p style='text-align:center;'> From {$data["old_count"]} words to {$data["new_count"]}<p>"; ?>
        <?php echo "<p style='text-align:left;'>" . $data["summary"] . "</p>"; ?>

    </div>
    <div class="row" style="text-align:center;">
      <hr>
      <p>Built with ❤️ by <a href="https://jakemor.com">Jake Mor</a></p>
    </div>
  </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
