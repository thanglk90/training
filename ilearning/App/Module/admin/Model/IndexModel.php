<?php

class IndexModel extends Model{
    
    function listItems(){
        $result['a'] = array('a' => 'b');
        //Tạo Prepared Statement
        $stmt = $this->_conn->prepare('SELECT * from `user`');

        //Thiết lập kiểu dữ liệu trả về
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        //Gán giá trị và thực thi
        $stmt->execute();

        //Hiển thị kết quả, vòng lặp sau đây sẽ dừng lại khi đã duyệt qua toàn bộ kết quả
        while($row = $stmt->fetch()) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
}

