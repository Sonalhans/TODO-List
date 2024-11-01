<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "INSERT INTO tasks (title, description) VALUES ('$title', '$description')";
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
    <title>Add Task</title>
</head>

<body class="bg-violet-50">

    <h1 class="text-center text-4xl font-serif my-5">Add New Task </h1>
    <form method="post" action="">

        <div class="mx-60 block shadow-lg p-6 rounded-xl bg-violet-100">
            <label for="Title" class="block text-sm/6 font-medium text-gray-900">Title</label>
            <div class="mt-2">
                <input name="title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" required>
            </div>


            <br>

            <div>
                <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                <div class="mt-2">
                    <textarea rows="4" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" required></textarea>
                </div>
            </div>



            <div class="mt-5">

                <button type="submit" class="rounded-full bg-violet-300 px-4 py-2.5 text-sm font-semibold text-violet-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Add Task</button>
            </div>

        </div>




    </form>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>