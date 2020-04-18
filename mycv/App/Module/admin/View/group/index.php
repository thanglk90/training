<?php
// echo '<pre>';
// print_r($this->listItems);
// echo '<pre>';
?>

<form action="" name="adminForm" id="adminForm">
    <div class="table-content">
        <table class="table">
            <thead>
                <tr>
                    <th class="formNumber"><label for="">No.</label></th>
                    <th class="formCkb">
                        <input type="checkbox" name="checkAll" id="ckb" class="ckb">
                    </th>
                    <th class="formName"><a href="#">Name</label></a>
                    <th class="formStatus"><a href="#">Status</label></a>
                    <th class="formACP"><a href="#">Group ACP</label></a>
                    <th class="formOrdering"><a href="#">ordering</label></a>
                    <th class="formTime"><a href="#">created_time</label></a>
                    <th class="formBy"><a href="#">created_by</label></a>
                    <th class="formTime"><a href="#">modified_time</label></a>
                    <th class="formBy"><a href="#">modified_by</label></a>
                    <th class="formID"><a href="#"></label>ID</a>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(count($this->listItems) > 0){
                        $xhtml = '';
                        $row   = 0;
                        foreach($this->listItems as $key => $value){
                            $row++;
                            $id             = $value['id'];
                            $name           = $value['name'];
                            $status         = $value['status'] == 0 ? 'Unpulish' : 'Pulish';
                            $groupACP       = $value['group_acp'] == 0 ? 'Unactive' : 'Active';
                            $ordering       = $value['ordering'];
                            $created_time   = $value['created_time'];
                            $created_by     = $value['created_by'];
                            $modified_time  = $value['modified_time'];
                            $modified_by    = $value['modified_by'];
                            

                            $xhtml .= '<tr>
                                        <td>'. $row .'</td>
                                        <td><input type="checkbox" name="ckb[]" class="ckb" id="'. $id .'"></td>
                                        <td><a href="#">'. $name .'</a>
                                        <td><a href="#">'. $status .'</a></td>
                                        <td><a href="#">'. $groupACP .'</a></td>
                                        <td class="formOrdering"><input type="text" name="ordering" id="" value="'. $ordering .'"></td>
                                        <td>'. $created_time .'</td>
                                        <td><a href="#">'. $created_by .'</a></td>
                                        <td>'. $modified_time .'</td>
                                        <td><a href="#">'. $modified_by .'</a></td>
                                        <td>'. $id .'</td>
                                    </tr>';
                        }

                        echo $xhtml;
                    }
                ?>
                
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="11">Pagination</td>
                </tr>
            </tfoot>
        </table>
    </div>
</form>
