<?php include"header.php"; ?>

		<?php
			//Getting Comment values
			$comment=$_POST['comment'];
			$restaurantID=$_POST['restaurantID'];
			$user = $_SESSION['userId'];
			$id=$_GET['id'];

			$result = mysql_query("INSERT INTO Comment(submitter_id, restaurant_id, comment_text, submit_date) VALUES({$user}, {$restaurantID}, '{$comment}', NOW())")
							or die("<p>Could not perform database query.</p>"
							. "<p>Error Code " . mysql_errno()
							. ": " . mysql_error()) . "<p>";

			//Submitting comment brings you back to resturant page
			header("Location: restaurant.php?id={$restaurantID}");
		?>
<?php include"footer.php"; ?>
