@extends('layouts/products')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Document</title>
</head>
<body>

<h1 class="text-xl font-semibold">All Products</h1>
<p>Show all products...</p>
@if($next)
<a href="{{ $next }}">next</a>
@endif 
</body>
</html>
