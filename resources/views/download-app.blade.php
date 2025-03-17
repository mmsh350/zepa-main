<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download App</title>
    <script>
        // Function to initiate the download
        function initiateDownload() {
            // Show a message to the user
            const messageElement = document.getElementById('message');
            messageElement.innerText = "Preparing your download...";

            // Create a temporary download link
            const downloadLink = document.createElement('a');
            downloadLink.href =
                "https://drive.google.com/uc?export=download&id=1AxM-zfLA-B9TjWBVEFsSr4HsNR369hqV";
                downloadLink.download = "app.apk"; // APK file name
            downloadLink.click();

            // Notify the user
            messageElement.innerText = "Download started. Please install the APK once downloaded.";
        }

        // Automatically initiate the download when the page loads
        window.onload = initiateDownload;
    </script>
</head>

<body>
    <div style="text-align: center; margin-top: 50px;">
        <h1>Download Our App</h1>
        <p id="message">Checking your device...</p>
    </div>
</body>

</html>
