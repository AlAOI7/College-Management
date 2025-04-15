بالطبع، هذا ما أستطيع مساعدتك به:

لإضافة الملفات إلى قاعدة البيانات:

```php
<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if file was uploaded without errors
if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
    $file = $_FILES['file'];
    $file_name = $file['name'];
    $file_type = $file['type'];
    $file_size = $file['size'];
    $file_tmp = $file['tmp_name'];

    // Insert file information into the database
    $sql = "INSERT INTO files (name, type, size, data)
            VALUES ('$file_name', '$file_type', $file_size, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("b", file_get_contents($file_tmp));
    if ($stmt->execute()) {
        echo "File uploaded and stored in the database successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "No file was uploaded.";
}

$conn->close();
?>
```

وللعرض والتحميل:

```php
<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve files from the database
$sql = "SELECT * FROM files";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>File Name</th><th>File Type</th><th>File Size</th><th>Download</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"] . "</td><td>" . $row["type"] . "</td><td>" . round($row["size"] / 1024, 2) . " KB</td><td><a href='download.php?id=" . $row["id"] . "'>Download</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "No files found in the database.";
}

$conn->close();
?>
```

وملف `download.php`:

```php
<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

// Retrieve file data from the database
$sql = "SELECT * FROM files WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $file_name = $row["name"];
    $file_type = $row["type"];
    $file_data = $row["data"];

    // Set headers for file download
    header('Content-Type: ' . $file_type);
    header('Content-Disposition: attachment; filename="' . $file_name . '"');
    echo $file_data;
} else {
    echo "Error: File not found in the database.";
}

$conn->close();
?>
```

هذه الأكواد ستقوم بإضافة الملفات إلى قاعدة البيانات وعرضها وتوفير إمكانية تحميلها. تأكد من تعديل الاسم والبيانات الخاصة بقاعدة البيانات حسب بيئتك.



















==----------------------
حسنًا، إليك كود PHP لإنشاء نموذج إضافة وحذف وتعديل الملفات، ربطها بالمستوى الدراسي أو الترم، وربط كل ملف مع مادة معينة:

```php
<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $file_name = $_FILES['file']['name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $academic_level = $_POST['academic_level'];
        $subject = $_POST['subject'];

        // Insert file information into the database
        $sql = "INSERT INTO files (name, type, size, data, academic_level, subject)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssiiss", $file_name, $file_type, $file_size, file_get_contents($file_tmp), $academic_level, $subject);
        if ($stmt->execute()) {
            echo "File uploaded and stored in the database successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } elseif (isset($_POST['delete'])) {
        $file_id = $_POST['file_id'];

        // Delete file from the database
        $sql = "DELETE FROM files WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $file_id);
        if ($stmt->execute()) {
            echo "File deleted from the database successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } elseif (isset($_POST['update'])) {
        $file_id = $_POST['file_id'];
        $file_name = $_POST['file_name'];
        $academic_level = $_POST['academic_level'];
        $subject = $_POST['subject'];

        // Update file information in the database
        $sql = "UPDATE files SET name = ?, academic_level = ?, subject = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisi", $file_name, $academic_level, $subject, $file_id);
        if ($stmt->execute()) {
            echo "File information updated successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

// Retrieve files from the database
$sql = "SELECT * FROM files";
$result = $conn->query($sql);

echo "<h1>File Management</h1>";
echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post' enctype='multipart/form-data'>";
echo "Upload File: <input type='file' name='file'><br>";
echo "Academic Level: <input type='text' name='academic_level'><br>";
echo "Subject: <input type='text' name='subject'><br>";
echo "<input type='submit' name='submit' value='Upload'>";
echo "</form>";

echo "<h2>File List</h2>";
echo "<table><tr><th>File Name</th><th>File Type</th><th>File Size</th><th>Academic Level</th><th>Subject</th><th>Actions</th></tr>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["type"] . "</td>";
        echo "<td>" . round($row["size"] / 1024, 2) . " KB</td>";
        echo "<td>" . $row["academic_level"] . "</td>";
        echo "<td>" . $row["subject"] . "</td>";
        echo "<td>
                <form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>
                    <input type='hidden' name='file_id' value='" . $row["id"] . "'>
                    <input type='submit' name='delete' value='Delete'>
                </form>
                <form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>
                    <input type='hidden' name='file_id' value='" . $row["id"] . "'>
                    <input type='text' name='file_name' value='" . $row["name"] . "'>
                    <input type='text' name='academic_level' value='" . $row["academic_level"] . "'>
                    <input type='text' name='subject' value='" . $row["subject"] . "'>
                    <input type='submit' name='update' value='Update'>
                </form>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No files found in the database.</td></tr>";
}
echo "</table>";

$conn->close();
?>
```

هذا الكود يقوم بإنشاء نموذج للإضافة والحذف والتحديث للملفات، ويربط كل ملف بمستوى دراسي ومادة معينة. يتم تخزين هذه المعلومات في قاعدة البيانات وعرضها في جدول.

تأكد من تعديل اسم السيرفر وبيانات قاعدة البيانات حسب بيئتك. كما يمكنك تعديل التصميم والتنسيق حسب رغبتك.