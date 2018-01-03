<html>
<title></title>
<body>
    <?php
        //create a form using php
        echo $this->Form->create('Book', array('action' => 'search'));
        //create form's inputs and btnSubmit
        echo $this->Form->input('title');
        echo $this->Form->input('description');
        echo $this->Form->submit('Search Books');
        echo $this->Form->end();
        $this->Paginator->options(array('url' => $this->passedArgs));

        //Hiển thị dữ liệu sau khi tìm kiếm
        if(!empty($posts)) { ?>
            <table>
                <tr>
                    <th><?php echo $this->Paginator->sort("id", "Mã sách"); ?></th>
                    <th><?php echo $this->Paginator->sort("title", "Tên sách"); ?></th>
                    <th><?php echo $this->Paginator->sort("description", "Mô tả"); ?></th>
                </tr>
        <?php
            foreach ($posts as $item) {
                echo "<tr>\n";
                echo "<td>".$item['Book']['id']."</td>\n";
                echo "<td>".$item['Book']['title']."</td>\n";
                echo "<td>".$item['Book']['description']."</td>\n";
                echo "</tr>\n";
            }
        ?>
            </table>
        <?php
            echo $this->Paginator->prev('« Previous ', null, null, array('class' => 'disabled'));
            echo " | ".$this->Paginator->numbers()." | ";
            echo $this->Paginator->next(' Next »', null, null, array('class' => 'disabled'));
        }
    ?>
</body>
</html>