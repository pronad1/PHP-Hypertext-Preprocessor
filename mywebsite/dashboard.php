<?php
include 'config.php';
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

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
</head>

<body>
	<h2>Welcome,
		<?php echo $_SESSION['user']; ?>!
	</h2>

	<h2>SQL Query Runner</h2>
	<form method="post">
		<textarea name="query" rows="5" cols="50" placeholder="Enter your SQL query here..."></textarea><br>
		<button type="submit">Run Query</button>
	</form>

	<a href="logout.php">Logout</a>
	<h3>Output:</h3>

	<div><?php echo $query_result; ?></div>


</body>

</html>