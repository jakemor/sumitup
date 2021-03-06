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
  <link rel="stylesheet" href="/sumitup/app/views/static/normalize.css">
  <link rel="stylesheet" href="/sumitup/app/views/static/skeleton.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>


  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container" style="margin-top:35vh;">
    <div class="row" style="text-align:center;">
        <h4>Article Summarizer</h4>
        <p>Enter a <a href="http://techcrunch.com/">tech crunch</a> or <a href="http://venturebeat.com">venture beat </a> article url below:</p>

        <form method="post" action="/sumitup/home">
          <input type="text" name="url">
          <input type="submit" value="Go!">
        </form>

    </div>
    <div class="row" style="text-align:center;">
      <p>Built with ❤️ by <a href="https://jakemor.com">Jake Mor</a></p>
    </div>
  </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
