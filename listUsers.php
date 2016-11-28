<?php include 'header.php';?>

<h1> Users </h1>

<p>Here, admins can view all users and choose to promote them to users and demote admins to regular users</p>


<?php
$result = mysql_query("SELECT user_name, is_admin, id FROM user")
        or die("<p>Could not perform database query by device type types.</p>" 
        . "<p>Error Code " . mysql_errno()
        . ": " . mysql_error()) . "<p>";


?>
<div class="table-responsive">

    <table class="table table-striped">
        <tr>
            <th>Username</th>
            <th>Is Admin?</th>
            <th>&nbsp;</th>
        </tr>

        <?php
            $dataRow = mysql_fetch_row($result);
            do{
                echo "<tr> <td> {$dataRow[0]} </td>";
                if($dataRow[1] == 1)
                {
                    echo "<td>Yes</td>"; 
                }
                else
                {
                    echo "<td>No</td>"; 
                }
                echo"<td> {$dataRow[2]} </td> <tr>";

                $dataRow = mysql_fetch_row ($result);
            } while ($dataRow);

        ?>

</div>

<?php include 'footer.php';?>