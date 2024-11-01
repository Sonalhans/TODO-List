<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM tasks WHERE id=$id");
    $task = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $id = $_POST['id'];

    $sql = "UPDATE tasks SET title='$title', description='$description', status='$status' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Task</title>
</head>

<body class="bg-gray-50">
    <h1 class="text-center font-serif text-4xl my-5">Edit Task</h1>
    <form method="post" action="">
        <div class="px-60">

            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
            <label for="Title" class="block text-sm/6 font-medium text-gray-900">Title</label>
            <input type="text" name="title" class="block w-full rounded-md border-0 py-1.5 text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" value="<?php echo $task['title']; ?>" required>

            <br>

            <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
            <textarea name="description" class="block w-full rounded-md border-0 py-1.5 text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" required><?php echo $task['description']; ?></textarea>
            <br>
            <label for="Status" class="block  text-large font-medium text-gray-900">Status</label>
            <select name="status">
                <option value="Pending" <?php echo ($task['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                <option value="Completed" <?php echo ($task['status'] == 'Completed') ? 'selected' : ''; ?>>Completed</option>
            </select>
            <br>

            <button type="submit" class="my-3 rounded-full bg-red-400 px-4 py-2.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Update Task</button>

        </div>

    </form>
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>