<?php
require_once 'Connection.php';
class Lighting extends Connection{
    
    public function importLamps($file){
        $dataBase = $this->getConn(); 
        
        $sql = "INSERT INTO lamps (lamp_id, lamp_name, lamp_model, lamp_zone, lamp_on) VALUES (?, ?, ?, ?, ?)";
        $stmt = $dataBase->prepare($sql);
        
        $file = fopen("lighting.csv", "r");
        if ($file !== FALSE) {
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                $stmt->bind_param("ssss", $data[0], $modelo, $zona, $data[3], $data[4]);
                $stmt->execute();
                $stmt->bind_result($modelo, $zona);
                $stmt->fetch();
            }
            fclose($file);
        }
        $stmt->close();
    }

    public function getAllLamps(){
        $con = new Connection();
        $dataBase = $con->getConn();

    
        $lamparas = "SELECT lamps.lamp_id,lamps.lamp_name, lamp_models.model_part_number, zones.zone_name, lamps.lamp_on FROM lamps 
        INNER JOIN zones ON lamps.lamp_zone = zones.zone_id
        INNER JOIN lamp_models ON lamp_models.model_id = lamps.lamp_model";
        $resultado = mysqli_query($dataBase, $lamparas);
        
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $lamparasArray[] = $fila;
            }
        } else {
            echo "Error: " . mysqli_error($dataBase);
        }
    
        return $lamparasArray;
    }

    public function drawLampsList(){
        $datos = $this->getAllLamps();
        $html = '<table border="1">';
        
        $html .= '<h1>BIG STADIUM - LIGHTING CONTROL PANEL</h1>';
        $html .= '<tr>';
        foreach ($datos as $datos) {
                $html .= '<tr>';
                $html .= '<td>' . $datos['lamp_id'] . '</td>';
                $html .= '<td>' . $datos['lamp_name'] . '</td>';
                $html .= '<td>' . $datos['model_part_number'] . '</td>';
                $html .= '<td>' . $datos['zone_name'] . '</td>';
                if ($datos['lamp_on'] == 0){
                    $html .= '<td>' . '<a href="changestatus.php?id=' . $datos['lamp_on'] . '"><img src="img/bulb-icon-on.png" style="width: 30px; height: 30px;"></a>' . '</td>';
                } else {
                    $html .= '<td>' . '<a href="changestatus.php?id=' . $datos['lamp_on'] . '"><img src="img/bulb-icon-off.png" style="width: 30px; height: 30px;"></a>' . '</td>';
                }
                $html .= '</tr>';
            }

        $html .= '</table>';
        echo $html;
    }

    public function deleteLamps() {
        $conn = new Connection;
        $dataBase = $conn->getConn();

        $sql = "DELETE FROM lamps";
        $result = $dataBase->query($sql);
        return $result;
    }
    
    public function init() {
        $this->deleteLamps();
        $this->importLamps();
    }

    public function suma() {
        $conn = new Connection;
        $data = $conn->getConn();

        $hola = $this->getAllLamps();

        foreach($hola as $paco){
            
        }
    }
    
    public function changeStatus($id, $status){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conn = new Connection;
            $data = $conn->getConn();
    
            $id = $_GET["lamp_id"];
            $estado=$_POST["lamp_on"];
    
            $update = "UPDATE lamp_on  FROM lamps SET lamp_on='$estado' WHERE id=$id";
            $resultado = mysqli_query($data, $update);
            if ($resultado === true) {
                header("location: index.php");
            }
        }
    }

    public function drawZonesOptions(){
        $datos = $this->getAllLamps();
        $html = '<table border="1">';
        
        $html .= '<h1>BIG STADIUM - LIGHTING CONTROL PANEL</h1>';
        $html .= '<tr>';
        foreach ($datos as $datos) {
                $html .= '<tr>';
                $html .= '<td>' . $datos['lamp_name'] . '</td>';
                $html .= '<td>' . $datos['model_wattage'] . '</td>';
                $html .= '<td>' . $datos['zone_name'] . '</td>';
                if ($datos['lamp_on'] == 0){
                    $html .= '<td>' . '<a href="changestatus.php?id=' . $datos['lamp_on'] . '"><img src="img/bulb-icon-on.png" style="width: 30px; height: 30px;"></a>' . '</td>';
                } else {
                    $html .= '<td>' . '<a href="changestatus.php?id=' . $datos['lamp_on'] . '"><img src="img/bulb-icon-off.png" style="width: 30px; height: 30px;"></a>' . '</td>';
                }
                $html .= '</tr>';
            }

        $html .= '</table>';
        echo $html;
    }

}

?>


