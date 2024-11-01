<?php
include 'db.php';

// Fetch all tasks
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>To-Do List</title>
</head>

<body class="bg-violet-50">
    <h1 class="bg-violet-200  p-5 text-center font-serif text-4xl ">To-Do List</h1>
    <div class="my-10 mx-24 ">
        <a href="add_task.php" type="button" class="ml-40 mt-5 rounded-md bg-violet-300 px-3.5 py-2.5 my-20 text-sm bg-gray-300 font-semibold text-black shadow-sm hover:bg-white/20">Add New Task +</a>
    </div>
    <div class=" rounded-xl bg-white-300 mx-60 block shadow-lg px-3 bg-violet-100">
        <table>
            <tr>
                <th scope="col" class="px-3 py-3.5 text-left text-lg font-semibold text-gray-900 ">Title</th>
                <th scope="col" class="px-3 py-3.5 text-left text-lg font-semibold text-gray-900">Description</th>
                <th scope="col" class="px-3 py-3.5 text-left text-lg font-semibold text-gray-900">Status</th>
                <th scope="col" class="px-3 py-3.5 text-left text-lg font-semibold text-gray-900">Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tbody class="divide-y divide-gray-200 ">
                    <tr>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-md font-medium text-gray-900 sm:pl-3"><?php echo htmlspecialchars($row['title']); ?></td>
                        <td class="whitespace-nowrap px-3 py-4 text-md text-gray-500"><?php echo htmlspecialchars($row['description']); ?></td>
                        <td class="whitespace-nowrap px-3 py-4 text-md text-gray-500"><?php echo htmlspecialchars($row['status']); ?></td>
                        <td class="px-3 py-3.5 text-left text-md font-semibold text-gray-900">
                            <a type="button" class=" mt-5 rounded-md bg-indigo-300 px-3.5  text-sm  font-semibold text-black shadow-sm hover:bg-indigo-600" href=" edit_task.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a type="button" class=" mt-5 rounded-md bg-red-400 px-3.5  text-sm  font-semibold text-black shadow-sm hover:bg-red-700" href="delete_task.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
        </table>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>