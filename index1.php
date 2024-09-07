<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Transfer</title>
    <script>
        function confirmTransfer(event) {
            // Show the first confirmation dialog
            var firstConfirmation = confirm('Are you sure you want to transfer?');
            
            if (firstConfirmation) {
                // Show the second confirmation dialog
                var secondConfirmation = confirm('Are you really sure you want to transfer?');
                
                if (secondConfirmation) {
                    // Allow form submission
                    return true;
                } else {
                    // Prevent form submission
                    event.preventDefault();
                    return false;
                }
            } else {
                // Prevent form submission
                event.preventDefault();
                return false;
            }
        }

        function handleSubmit(event) {
            // Determine which button was clicked
            var button = event.submitter;

            if (button && button.value === 'transfer') {
                return confirmTransfer(event);
            }

            // Allow form submission for other actions (like 'download')
            return true;
        }
    </script>
</head>
<body>
    <form action="process_images.php" method="post" onsubmit="return handleSubmit(event);">
        <label for="from">From:</label>
        <input type="number" id="from" name="from" required>
        <label for="to">To:</label>
        <input type="number" id="to" name="to" required>
        <label for="type">Type:</label>
        <select id="type" name="type" required>
            <option value="jpg">JPG</option>
            <option value="png">PNG</option>
            <option value="jpeg">JPEG</option>
            <option value="jfif">JFIF</option>
        </select>
        <button type="submit" name="action" value="download">Download</button>
        <button type="submit" name="action" value="transfer">Transfer</button>
    </form>
</body>
</html>
