<?php $this->extends('layouts/products'); ?>

<h1>Register</h1>
<form
method="post"
action="<?php print $this->escape( $router->route('add-article') ); ?>"
class=""
<label for="product_form">
<span>Product form</span>
<input
id="product_form"
name="product_form"
type="text"
placeholder=""
/>
<label for="sku">
<span >Article SKU</span>
<input
id="sku"
name="sku"
type="text"
class="sku"
placeholder=""
/>
<label for="name" >
<span >Article Name</span>
<input
id="name"
name="name"
type="text"
class="name"
placeholder=""
/>
<label for="price" >
<span>Article Price</span>
<input
id="price"
name="price"
type="text"
class="price"
placeholder=""
/>
<label for="size" >
<span>Article Size</span>
<input
id="size"
name="size"
type="text"
class="size"
placeholder=""
/>
<label for="weight" >
<span>Article Weight</span>
<input
id="weight"
name="weight"
type="text"
class="weight"
placeholder=""
/>
<button
type="submit"
class="focus:outline-none focus:border-blue-500 focus:bg-blue-400
border-b-2 border-blue-400 bg-blue-300 p-2"
>
Register
</button>
</form>