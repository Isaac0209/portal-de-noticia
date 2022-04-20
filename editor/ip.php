 <?php
 echo 'Meu ip:'; echo $_SERVER["REMOTE_ADDR"];

   function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;

echo 'Meu ip'; echo $ipaddress;
$query = $con->prepare("SELECT * FROM ip ORDER BY ip DESC");
         $query->execute();
         $get = $query->get_result();
         $total = $get->num_rows;
         if($total > 0){
            while($dados = $get->fetch_array()){
     
 
if($dados['ip'] = $ipaddress) {
   
}}}else {
     
    $query = $con->prepare("INSERT INTO ip (ip) VALUES (?)");
            $query->bind_param("s", $ipaddress);
            $query->execute();
            $_SESSION['atualizacao'] = true;
}
}

    ?>