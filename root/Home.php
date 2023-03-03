<!DOCTYPE html>
<html>
<head>
	<title>Separate Songs</title>
	<link rel="stylesheet" href="Home_Scripts/css/homeStyle.css">
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
		}
	</style>
</head>

<body>
	<header>
		<div class="nav-bar">
			<div class="left-nav-bar"></div>
			<div class="center-nav-bar"><h1>Separate Songs</h1></div>
			<div class="right-nav-bar"></div>
			
		</div>
	</header>
	<main>
		<div class="left-panel">
			<p>Left panel content goes here</p>
		</div>
		<div class="form-area">
			<h2>Separate Track</h2>
			<form class="upload-song" action="Home_Scripts/python/separateTrack.py" method="post" enctype="multipart/form-data">
				<label for="track-name">Track Name:</label>
				<input type="text" name="track-name" id="track-name" required>

				<label for="artist-name">Artist Name:</label>
				<input type="text" name="artist-name" id="artist-name" required>

				<label for="audio-file">Audio File:</label>
				<input type="file" name="audio-file" id="audio-file" accept="audio/*" required>

				<input type="submit" value="Separate">
			</form>
		</div>
		<div class="right-panel">
			<p>Right panel content goes here</p>
		</div>
	</main>
</body>
</html>