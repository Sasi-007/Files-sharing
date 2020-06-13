<!DOCTYPE html>
<html lang="en">
    <head>
        <title>File Sharing</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
.progress-bar{
    height: 35px;
    width: 250px;
    border: 2px solid darkblue;
}
.progress-bar-fill{
    height: 100%;
    width: 0%;
    background: lightblue;
    display: flex;
    align-items: center;
    font-weight: bold;
    transition: width 0.25s;
}

.progress-bar-text{
    margin-left: 10px;
    font-weight: bold;
}


        </style>


    </head>
    <body>
    <p>File Uploads / File Sharing</p>
        <form class="form" id="uploadForm">
            <input type="file" name="inpFile" id="inpFile" multiple><br>
            <input class="button btn btn-primary" type="submit" value="Upload">
            <button class="btn btn-secondary d-none" id="cancel_btn" type="button">Cancel upload</button>
        </form>
        <div class="progress-bar" id="progressBar">
            <div class="progress-bar-fill">
                <span class="progress-bar-text">0%</span>
            </div>
        </div><br>
        <a href="uploads/">Go to files</a>

    <script>
        const uploadForm=document.getElementById("uploadForm");
        const inpFile=document.getElementById("inpFile");
        const progressBarFill=document.querySelector("#progressBar>.progress-bar-fill");
        const progressBarText=progressBarFill.querySelector(".progress-bar-text");

        uploadForm.addEventListener("submit",uploadFile);

        function uploadFile(e){
            e.preventDefault();

            const xhr=new XMLHttpRequest();

            xhr.open("POST","upload.php");
            xhr.upload.addEventListener("progress",e=>{
                const percent=e.lengthComputable?(e.loaded/e.total)*100:0;

                progressBarFill.style.width=percent.toFixed(2)+"%";
                progressBarText.textContent=percent.toFixed(2)+"%";
            });

            // xhr.setRequestHeader("Content-Type","multipart/form-data");
            xhr.send(new FormData(uploadForm));

        }


</script>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</html>