<?php $this->extends('layouts/products'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Document</title>
</head>
<body>
<link rel="stylesheet" href="/css/style.css">
<h1 class="text-xl font-semibold">All Products</h1>
<p>Show all products...</p>
<?php if($next): ?>
<a href="<?php print $this->escape( $next ); ?>">next</a>
<?php endif; ?> 
</body>
</html>
