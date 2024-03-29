<?php
try {
    require_once '../includes/pdo_connect.php';
    $sql = 'SELECT name, meaning, gender FROM names
            ORDER BY name';
    $result = $db->query($sql);
    $error_info = $db->errorInfo();
    print_r($error_info);

    if (isset($error_info[2])) {
        $error = $error_info[2];
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PDO: Error Messages</title>
        <link href="../styles/styles.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>PDO: Getting Error Messages</h1>
        <?php
        if (isset($error)) {
            echo "<p>$error</p>";
        } else {
            ?>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Meaning</th>
                    <th>Gender</th>
                </tr>
                <?php while ($row = $result->fetch()) { ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['meaning']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>
    </body>
</html>