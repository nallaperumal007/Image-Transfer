<?php
$sourceDir = 'E:\\xampp\\htdocs\\Fetch\\a\\';
$destinationDir = 'E:\\xampp\\htdocs\\Fetch\\b\\';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $from = isset($_POST['from']) ? (int)$_POST['from'] : 0;
    $to = isset($_POST['to']) ? (int)$_POST['to'] : 0;
    $type = isset($_POST['type']) ? $_POST['type'] : 'jpg';
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    // Validate input
    if ($from < 1 || $to < $from || !in_array($type, ['jpg', 'png', 'jpeg','jfif'])) {
        echo 'Invalid input.';
        exit;
    }

    // Scan source directory for files
    $files = scandir($sourceDir);
    $processedFiles = [];

    foreach ($files as $file) {
        // Skip current and parent directory entries
        if ($file === '.' || $file === '..') {
            continue;
        }

        // Check if the file is an image and matches the criteria
        $fileInfo = pathinfo($file);
        if (isset($fileInfo['filename']) && isset($fileInfo['extension']) && $fileInfo['extension'] === $type) {
            $fileNumber = (int)$fileInfo['filename'];
            if ($fileNumber >= $from && $fileNumber <= $to) {
                $sourceFile = $sourceDir . $file;
                $destinationFile = $destinationDir . $file;

                if ($action === 'download') {
                    
                    if (copy($sourceFile, $destinationFile)) {
                        $processedFiles[] = $file;
                    } else {
                        echo "Failed to copy file: $file<br>";
                    }
                } elseif ($action === 'transfer') {
                    
                    if (rename($sourceFile, $destinationFile)) {
                        $processedFiles[] = $file;
                    } else {
                        echo "Failed to move file: $file<br>";
                    }
                }
            }
        }
    }

    
    if (count($processedFiles) > 0) {
        $actionText = ($action === 'download') ? 'Copied' : 'Moved';
        echo "$actionText files: " . implode(', ', $processedFiles);
    } else {
        echo 'No files matched the criteria.';
    }
} else {
    echo 'Invalid request method.';
}
?>
