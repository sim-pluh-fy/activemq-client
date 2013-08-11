

	<form action="/index.php/home/upload" method="post" enctype="multipart/form-data" >

	<div id="image-container">
		<span class="image-title">Front</span>
		<input name="userfile[]" type="file" />
	</div>
	
	<div id="image-container">
		<span class="image-title">Back</span>
		<input name="userfile[]" type="file" />
	</div>
	

	
	<div style="width:80%;float:left;margin:30px;font-size:20px">
		<input type="submit" name="submit" value="Save Images" />
	</div>
	
</form>