<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Transfer</title>
</head>
<body>
    <form action="process_images.php" method="post">
        <label for="from">From:</label>
        <input type="number" id="from" name="from" required>
        <label for="to">To:</label>
        <input type="number" id="to" name="to" required>
        <label for="type">Type:</label>
        <select id="type" name="type" required>
            <option value="jpg">JPG</option>
            <option value="png">PNG</option>
            <option value="jpeg">JPEG</option>
             <option value="jfif">JPEG</option>
        </select>
        <button type="submit" name="action" value="download">Download</button>
        <button type="submit" name="action" value="transfer">Transfer</button>
    </form>
</body>
</html>
