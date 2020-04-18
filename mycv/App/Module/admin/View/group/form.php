<?php
$formAction = URL::createLink('admin', 'group', 'form');
?>

<form action="<?php echo $formAction; ?>" method="POST" name="adminForm" id="adminForm">
    <div class="table-content form-group-add">
        <table class="table">
            <tr>
                <td><label for="">Name</label></td>
                <td><input type="text" name="form[name]"></td>
            </tr>
            <tr>
                <td><label for="">Status</label></td>
                <td>
                    <select name="form[status]">
                        <option value="default">-- Choose status --</option>
                        <option value="1">Pulish</option>
                        <option value="0">Unpulish</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="">Name</label></td>
                <td>
                    <select name="form[group_acp]">
                        <option value="default">-- Choose status --</option>
                        <option value="1">Yes</option>
                        <option value="0">no</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Save"></td>
            </tr>

        </table>
    </div>
</form>
