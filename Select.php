<?php
session_start();
include('connection.php')
?>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Adress</th>
            <th>Phone number</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "select ft.id, st.name, st.surname, ft.email, th.adress, th.phone_number from first_table ft join second_table st on st.id = ft.st_id join third_table th on ft.th_id = th.id";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($query);
        if ($row > 0) {
            while ($row = mysqli_fetch_array($query)) {

        ?>

                <tr>
                    <td><?php echo $row['id']; ?> </td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['surname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['adress']; ?></td>
                    <td><?php echo $row['phone_number']; ?></td>

                </tr>

            <?php
            }
        } else {
            ?>
            <tr>
                <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
            </tr>
        <?php } ?>
    </tbody>
</table>


<!-- SELECT * FROM table1
LEFT JOIN table2
ON table2.email = table1.email
LEFT JOIN table3
ON table3.email = table1.email -->