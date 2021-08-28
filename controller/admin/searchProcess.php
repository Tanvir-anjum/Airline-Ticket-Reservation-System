<?php
include('../../model/db.php');

$dbobj = new db();
$conobj = $dbobj->OpenCon();

$userQuery = $dbobj->showAll($conobj, 'admin_account', $_POST['searchInput']);
?>
    <table class="list_view center">
        <tr>
            <th>User Name
            </td>
            <th>Date of Birth
            </td>
            <th>NID
            </td>
            <th>E-mail
            </td>
            <th>Contact
            </td>
            <th>Qualification
            </td>
            <th>Experience
            </td>
        </tr><?php
        if ($userQuery->num_rows > 0) {
            // output data of each row
            while ($row = $userQuery->fetch_assoc()) {

                $id = $row["id"];
                $name = $row["name"];
                $dob = $row["dob"];
                $nid = $row["nid"];
                $email = $row["email"];
                $contact = $row["contact"];
                $qualification = $row["qualification"];
                $experience = $row["experience"];
                ?>
                <tr>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $dob; ?></td>
                    <td><?php echo $nid; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $contact; ?></td>
                    <td><?php echo $qualification; ?></td>
                    <td><?php echo $experience; ?></td>
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