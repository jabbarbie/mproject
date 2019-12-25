<?php if (! empty($errors)) : ?>
    <p>Terdapat pesan kesalahan :</p>
		<ul class="px-2 py-0">
		<?php foreach ($errors as $error) : ?>
			<li><?= esc($error) ?></li>
		<?php endforeach ?>
		</ul>
<?php endif ?>
