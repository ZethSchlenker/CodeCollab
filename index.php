<?php
require_once 'core/init.php';

if(Session::exists('home')) {
	//echo '<p>' . Session::flash('home') . '</p>';
}
?>

<!DOCTYPE html>
<head>
	<title>CodeCollab</title>
	<meta charset="utf-8">
	<link rel="stylesheep" type="text/css" media="all" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" media="all" href="css/styles.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>
<?php require_once 'includes/navigation.php'; ?>
<div id="content" class="clearfix">
	<div class="lcol">
		<h1>CodeCollab Home Page</h1>
		<br /><br />
		<?php
			$database = Database::getInstance();
			$posts = $database->get('Post', array())->results();
			for($i=0; $i<8; $i++) {
				$post = $posts[$i];
				$author = new User($post->user_id);
				echo "<h3><a href='post.php?p=" . $post->id . "'>" . $post->title . "</a></h3>
					<p style='font-style: italic;'>Author: <a href='profile.php?user=" . $author->data()->username . "'>" . $author->data()->username . "</a></p>
					<hr />";
			}
		?>
	</div>
	<div class="rcol">
		<?php require_once 'includes/searchbar.php'; ?>
		<hr />
		<?php
		if($viewer->isLoggedIn()) {
			?>
			<a href="createpost.php">Create a new post</a>
			<?php
		}
		?>
	</div>
</div>
</body>
</html>