<?php
$zip = new ZipArchive;
if ($zip->open('3d_modelforyou.zip', ZipArchive::OVERWRITE) === TRUE)
{
    if ($handle = opendir('UploadFolder'))
    {
        // Add all files inside the directory
        while (false !== ($entry = readdir($handle)))
        {
            if ($entry != "." && $entry != ".." && !is_dir('UploadFolder/' . $entry))
            {
				$zip->addFile('UploadFolder/' . $entry);
            }
        }
        closedir($handle);
		// Add a file new.txt file to zip using the text specified
    $zip->addFromString('Avtor.txt', 'file by Apostoll');
    }
 
    $zip->close();
}
	
?>
</br>
<a href="3d_modelforyou.zip" class="btn btn-primary" style="background-color: #ff9600;">download</a>

<?php
	$images = glob("UploadFolder/*.jpg");
	foreach($images as $image){
		@unlink($image);
	}
?>


