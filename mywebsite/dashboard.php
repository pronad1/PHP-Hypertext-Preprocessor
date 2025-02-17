<?php
include 'config.php';
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Predefined queries for the university database
$queries = [
    "Show all students" => "SELECT * FROM student",
    "Show all courses" => "SELECT * FROM course",
    "Show all departments" => "SELECT * FROM department",
    "Show student count" => "SELECT COUNT(*) AS total_students FROM student",
    "Show course count" => "SELECT COUNT(*) AS total_courses FROM course"
];


// Handling query execution
$query_result = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['query'])) {
    $query = $_POST['query'];
    $result = $conn->query($query);
    
    if ($result) {
        if ($result === true) {
            $query_result = 'Query executed successfully.';
        } else {
            $query_result = '<table border="1"><tr>';
            while ($field = $result->fetch_field()) {
                $query_result .= '<th>' . htmlspecialchars($field->name) . '</th>';
            }
            $query_result .= '</tr>';
            
            while ($row = $result->fetch_assoc()) {
                $query_result .= '<tr>';
                foreach ($row as $value) {
                    $query_result .= '<td>' . htmlspecialchars($value) . '</td>';
                }
                $query_result .= '</tr>';
            }
            $query_result .= '</table>';
        }
    } else {
        $query_result = 'Error: ' . $conn->error;
    }
}
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SQL Query Runner</title>
	<script>
		function runQuery(query) {
			document.getElementById('queryInput').value = query;
			document.getElementById('queryForm').submit();
		}

		function toggleOutput() {
			let outputDiv = document.getElementById('output');
			if (outputDiv.style.display === 'none') {
				outputDiv.style.display = 'block';
			} else {
				outputDiv.style.display = 'none';
			}
		}
	</script>
</head>

<body>
	<h2>Welcome,
		<?php echo $_SESSION['user']; ?>!
	</h2>
	<h2>SQL Query Runner</h2>

	<h3>Available Queries:</h3>
	<ul>
		<?php foreach ($queries as $desc => $sql): ?>
		<li><a href="#"
				onclick="runQuery('<?php echo addslashes($sql); ?>')"><?php echo $desc; ?></a>
		</li>
		<?php endforeach; ?>
	</ul>

	<form id="queryForm" method="post">
		<textarea id="queryInput" name="query" rows="5" cols="50"
			placeholder="Enter your SQL query here..."></textarea><br>
		<button type="submit">Run Query</button>
	</form>

	<a href="logout.php">Logout</a>

	<h3>Output: <button onclick="toggleOutput()">Show/Hide</button></h3>
	<div id="output" style="display: block;">
		<?php echo $query_result; ?>
	</div>
</body>

</html>