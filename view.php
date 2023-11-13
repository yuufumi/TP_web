<?php
require_once("controller.php");

class tdw_view{
    public function show_Table_view(){
        try{
            $cf = new tdw_controller();
?>
            <table id='mytable' border>
                <thead>
                    <tr id="phones" class="phones">
                        <th>Features</th>
<?php
            $smartphones=$cf->get_smartphones_controller();            
            foreach($smartphones as $row){
                echo "<th>" . $row["Name_smartphone"]. "</th>";
            }
            ?>
            </tr>
            </thead>
            <tbody>
<?php
            $qtf=$cf->get_Table_controller();
            $features=$cf->get_Features_controller();
            $i = 0;
                foreach($features as $row) {
                    if($i % 2){
                        $color = "second_color";
                    }else{
                        $color = "first_color";
                    }
                    echo "<tr class=".$color."><th id=Features>" . $row["Name_Features"]. "</th>";
                    $values = $cf->get_features_by_id($row["Id_Features"]);
                    foreach($values as $vrows) {
                        //echo "<td>". $vrows["Value_Smartphone_Features"] . "</td>";
                        foreach($smartphones as $smartphone) {
                            if($vrows["Id_Smartphone"] === $smartphone["Id_smartphone"]){
                                echo "<td>" . $vrows["Value_Smartphone_Features"] . "</td>";   
                            }
                    }
                }
                    echo "</tr>";
                    $i++;
                }
            echo "</tbody></table>";
    }catch(Exception $e){echo 'erreur'.$e->getMessage();}
    }
    
    public function Head_page(){
        echo '<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Comparateur de smartphones</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="style.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        </head>';
    }
    public function show_title_page(){
        echo '<h1>Comparateur de smartphones</h1>';
    }

    public function show_diaporama(){
        echo '<ul>
                <li><a href="https://www.apple.com/">Apple</a></li>
                <li><a href="https://www.samsung.com/">Samsung</a></li>
                <li><a href="https://www.nokia.com/">Nokia</a></li>
                <li><a href="https://consumer.huawei.com/">Huawei</a></li>
                <li><a href="https://www.mi.com/">Xiaomi</a></li>
            </ul>';
    }

    public function show_video_smartphone(){
        echo '<div><video src="videos/smartphone_video.mp4" controls></video></div>';
    }

    public function show_footer(){
        echo '<a href="mailto:ybenali884@gmail.com">Contactez moi sur mail</a>';
    }
    public function Body_page(){
?>
<body>
    <?php
    $this->show_title_page();
    $this->show_diaporama();
    $this->show_Table_view();
    $this->show_video_smartphone();
    $this->show_footer();
    echo '<br/><br/><br/><br/></body>';        
    }
    public function show_Website(){
        echo '<html>';
        $this->Head_page();
        $this->Body_page();
        echo '</html>';
    }
}
?>