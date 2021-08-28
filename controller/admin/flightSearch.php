<?php
include('../../model/db.php');

$dbobj = new db();
$conobj = $dbobj->OpenCon();

$userQuery = $dbobj->ShowAllFlights($conobj, 'flight', $_POST['searchInput']);
?>
    <table class="list_view center">
        <tr>
            <th>Source
            </th>
            <th>Destination
            </th>
            <th>Departure
            </th>
            <th>Date
            </th>
            <th>Price
            </th>
            <th>Action</th>
        </tr><?php
        if ($userQuery->num_rows > 0) {
            // output data of each row
            while ($row = $userQuery->fetch_assoc()) {
                $id = $row["Flight ID"];
                $from = $row["Source"];
                $to = $row["Destination"];
                $time = $row["Departure"];
                $date = $row["Date"];
                $price = $row["Price"];
            ?>
                <tr>
                    <td><?php echo $from; ?></td>
                    <td><?php echo $to; ?></td>
                    <td><?php echo $time; ?></td>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $price; ?></td>
                    <td>
                        <!--                            <a href="edit_admin.php?id=--><?php //echo $name; ?><!--">Edit</a> |-->
                        <a href="../../controller/admin/delete_flight.php?id=<?php echo $id; ?>">Delete</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan=7>0 results</td>
            </tr>

            <?php
        }
        ?>
    </table>
    </div>
<?php
$dbobj->CloseCon($conobj);
?>