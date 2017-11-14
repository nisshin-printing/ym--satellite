<?php
	$url = 'https://www.law-yamashita.com/wp-json/wp/v2/members?_embed&per_page=100&order=asc&orderby=id';
	$json = file_get_contents( $url );
	$arr_json = json_decode( $json, true );

	foreach ( $arr_json as $json ) :
		$link = $json['link'];
		$date = $json['date'];
		$title = $json['title']['rendered'];
		$thumb = $json['_embedded']['wp:featuredmedia'][0]['media_details']['sizes']['full']['source_url'];
		$job = $json['subtitle'];
?>
<article class="post post--members" itemscope itemtype="http://schema.org/Article" itemref="author-prof">
	<ul class="post--meta menu">
		<li class="published" itemprop="datePublished dateCreated" datetime="<?php echo $date; ?>"></li>
		<li class="updated" itemprop="dateModified" datetime="<?php echo $date; ?>"></li>
		<li class="author hide" itemprop="author copyrightHolder editor" itemscope itemtype="http://schema.org/Person"><span class="author" itemprop="name"><?php $title; ?></span></li>
	</ul>
	<div class="row align-middle">
		<div class="column small-3 thumb--members"><img src="<?php echo $thumb; ?>" alt="<?php echo $title; ?>" width="210" height="210"></div>
		<div class="column small-9">
			<h2 itemprop="about headline" class="entry-title post--title">
				<?php echo $title; ?>
				<span class="title--small title--block"><?php $job; ?></span>
			</h2>
			<p class="text-right"><a href="<?php echo $link ?>" class="button" target="_blank" title="<?php echo $title ?>についてメインサイトで詳しく見る">詳しく見る<br><span style="font-size:0.8em">※メインサイトへ移行します</span></a></p>
		</div>
	</div>
</article>
<?php
	endforeach;
