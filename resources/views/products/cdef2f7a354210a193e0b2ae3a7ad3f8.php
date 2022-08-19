<?php $this->extends('layouts/products'); ?>

<h1 class="text-xl font-semibold">All Products</h1>
<p>Show all products...</p>
<?php if($next): ?>
<a href="<?php print $this->escape($next); ?>">next</a>
<?php endif; ?>