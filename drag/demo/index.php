<html>
<head>

<link rel="stylesheet" href="css/dropzone.css">
<script>
	window.addEvent('domready', function(){
	
	// Create the file uploader
	var upload = new Form.Upload('file', {
		dropMsg: "Drop files here",
		onComplete: function(){
			alert('Files uploaded!');
		}
	});

	// Use iFrameFormRequest, which posts to iFrame 
	if (!upload.isModern()) {
		new iFrameFormRequest('uploadForm', {
			onComplete: function(response){
				alert('Files uploaded!');
			}
		});
	}

});
	var input, list, drop;
// Form.MultipleFileInput instance
var inputFiles = new Form.MultipleFileInput(input, list, drop, {
    onDragenter: drop.addClass.pass('hover', drop),
    onDragleave: drop.removeClass.pass('hover', drop),
    onDrop: drop.removeClass.pass('hover', drop)
});

// Request instance;
var request = new Request.File({
    url: 'files.php'
    // onSuccess
    // onProgress
});

myForm.addEvent('submit', function(event){
    event.preventDefault();
    inputFiles.getFiles().each(function(file){
        request.append('url[]' , file);
    });
    request.send();
});
</script>
  

 
</head>

<body>
  <form method="post" action="upload.php" enctype="multipart/form-data" id="uploadForm">
<div>
	<div class="formRow">
		<label for="file" class="floated">File: </label>
		<input type="file" id="file" name="file[]" multiple><br>
	</div>

	<div class="formRow">
		<input type="submit" name="upload" value="Upload">
	</div>
</div>
</form>
</body>
</html>