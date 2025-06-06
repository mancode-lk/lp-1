<!DOCTYPE html>
<html>

<head>
	<title>
		How to convert an HTML element
		or document into image ?
	</title>

	<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
	</script>

	<script src=
"https://files.codepedia.info/files/uploads/iScripts/html2canvas.js">
	</script>
</head>

<body>
	<center>
	<h2 style="color:green">
		GeeksForGeeks
	</h2>

	<h2 style="color:purple">
		Convert div to image
	</h2>

	<div id="html-content-holder" style="background-color: #F0F0F1;
				color: #00cc65; width: 500px;padding-left: 25px;
				padding-top: 10px;">

		<strong>
			GeeksForGeeks
		</strong>

		<hr/>

		<h3 style="color: #3e4b51;">
			ABOUT US
		</h3>

		<p style="color: #3e4b51;">
			<b>GeeksForGeeks</b> is a portal and a forum
			for many tutorials focusing on Programming
			ASP.Net, C#, jQuery, AngularJs, Gridview, MVC,
			Ajax, Javascript, XML, MS SQL-Server, NodeJs,
			Web Design, Software and much more
		</p>

		<p style="color: #3e4b51;">
			How many times were you frustrated while
			looking out for a good collection of
			programming/algorithm/interview questions?
			What did you expect and what did you get?
			This portal has been created to provide
			well written, well thought and well
			explained solutions for selected questions.
		</p>
	</div>

	<input id="btn-Preview-Image" type="button"
				value="Preview" />

	<a id="btn-Convert-Html2Image" href="#">
		Download
	</a>

	<br/>

	<h3>Preview :</h3>

	<div id="previewImage"></div>

	<script>
		$(document).ready(function() {

			// Global variable
			var element = $("#html-content-holder");

			// Global variable
			var getCanvas;

			$("#btn-Preview-Image").on('click', function() {
				html2canvas(element, {
					onrendered: function(canvas) {
						$("#previewImage").append(canvas);
						getCanvas = canvas;
					}
				});
			});

			$("#btn-Convert-Html2Image").on('click', function() {
				var imgageData =
					getCanvas.toDataURL("image/png");

				// Now browser starts downloading
				// it instead of just showing it
				var newData = imgageData.replace(
				/^data:image\/png/, "data:application/octet-stream");

				$("#btn-Convert-Html2Image").attr(
				"download", "GeeksForGeeks.png").attr(
				"href", newData);
			});
		});
	</script>
	</center>
</body>

</html>
