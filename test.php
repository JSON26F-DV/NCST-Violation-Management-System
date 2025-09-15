<?php
    include("header.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Data</title>
  </head>
  <body>
    <table border = 1 cellspacing = 0 cellpadding = 10>
      <tr>
        <td>#</td>
        <td>Name</td>
        <td>Image</td>
      </tr>
<?php
$result = mysqli_query($conn, "SELECT * FROM tb_upload ORDER BY id DESC");
?>
<?php while ($row = mysqli_fetch_assoc($result)) : ?>
<tr>
  <td><?php echo $i++; ?></td>
  <td><?php echo $row["name"]; ?></td>
  <td><img src="/ncst/public/uploads/profile/<?php echo $row['image']; ?>" alt="profile"></td>
</tr>
<?php endwhile; ?>

    </table>
    <br>
    <a href="test2.php">Upload Image File</a>
  </body>
</html>
<?php
    include("footer.php");
?>