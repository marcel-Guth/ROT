<?php
$backup = new DbBackup('event.barningconnect.com', 'bloemencorso', 'W23AbutOH41iLEbO3u6i1ujIDOvog2', 'barning_bloemencorso', 'vehicles', 'localhost', 'Barning', 'Barning81234', 'barning_bloemencorso');

while(true){
    $backup->createCopy();
    sleep(30);
}

class DbBackup {

    //backup database variables
    private $bhost, $buser, $bpass, $bname;
    //tables variable
    private $tables;
    //new database variables
    private $nhost, $nuser, $npass, $nname;
    //set the database variables
    private $backup, $new;
    //create the table data array

    public function __construct($bhost, $buser, $bpass, $bname, $tables = "*", $nhost, $nuser, $npass, $nname) {
        //set the backup variables
        $this->bhost = $bhost;
        $this->bname = $bname;
        $this->bpass = $bpass;
        $this->buser = $buser;
        //set the tables Array/String
        $this->tables = $tables;
        //set the new db variables
        $this->nhost = $nhost;
        $this->nname = $nname;
        $this->npass = $npass;
        $this->nuser = $nuser;

        $this->backup = new \PDO("mysql:host=$this->bhost;dbname=$this->bname", $this->buser, $this->bpass);
        $this->new = new \PDO("mysql:host=$this->nhost;dbname=$this->nname", $this->nuser, $this->npass);
    }

    public function createCopy() {
        //start vehicles table stealing
        $sql = "TRUNCATE `vehicles`";
        $stmnt = $this->new->prepare($sql);
        $stmnt->execute();
        unset($sql);
        unset($stmnt);
        $this->truncateVehicleData();
        $this->truncateVehicleLocation();
        echo 'db leeg gemaakt.'.PHP_EOL;
        
        $sql = "SELECT * FROM `vehicles";
        $stmnt1 = $this->backup->prepare($sql);
        $stmnt1->execute();
        unset($sql);
        
        
        while($vehicle = $stmnt1->fetch(\PDO::FETCH_ASSOC)){
            if(empty($vehicle['version'])){$vehicle['version']=6;}
            if($vehicle['title']=="" || $vehicle['title']==" "){$vehicle['title']="Geen Naam";}
            if($vehicle['name']== "trck"){$vehicle['name']="'trck'";}
            $sql = "INSERT INTO `vehicles`(`id`,`gebruiker`,`groep`,`title`,`vehicle_id`,`client_id`,`name`,`last_update`,`version`,`imei`,`icoon`,`volgorde`,`corsointern`,`online`) VALUES (".$vehicle['id'].','.$vehicle['gebruiker'].','.$vehicle['groep'].','.'"'.$vehicle['title'].'"'.','.'"'.$vehicle['vehicle_id'].'"'.','.$vehicle['client_id'].','.$vehicle['name'].','.'"'.$vehicle['last_update'].'"'.','.$vehicle['version'].','.$vehicle['imei'].','.$vehicle['icoon'].','.$vehicle['volgorde'].','.$vehicle['corsointern'].','.$vehicle['online'].")";
            $stmnt2 = $this->new->prepare($sql);
            $stmnt2->execute();
            
            $this->getVehicleData($vehicle['imei']);
            unset($sql);
            unset($stmnt);
        }
        //end vehicles table stealing
    }
    
    private function getVehicleData($imei){
        $sql = "SELECT * FROM `vehicle_data` WHERE `imei`=$imei ORDER BY `id` DESC LIMIT 1";
        $stmnt = $this->backup->prepare($sql);
        $stmnt->execute();
        
        while($vehicle_data = $stmnt->fetch(\PDO::FETCH_ASSOC)){
            foreach($vehicle_data as $key=>$val){
                $$key = $val;
                echo $key.'=>'.$val;
            }
            $sql = "INSERT INTO `vehicle_data`(`id`,`gebruiker`,`groep`,`name`,`system_id`,`vehicle_id`,`timestamp`,`volt`,`gs`,`pl15`,`imei`,`type`,`vin`,`odo`,`vsp`,`rpm`,`eh`,`ufuel`,`serv`,`pn`,`msg`,`mnr`,`brnr`,`v1`,`v2`,`v3`,`v4`,`v5`,`v6`,`v7`,`v8`,`i1`,`i2`,`i3`,`i4`,`i5`,`i6`,`i7`,`i8`,`i9`,`i10`,`i11`,`i12`,`ot`,`it`,`outp`,`inv`,`inp`,`outph`,`vo1`,`vo2`,`vo3`,`vo4`,`vo5`,`vo6`,`vo7`,`vo8`,`vo9`,`vo10`,`vo11`,`vo12`,`rck`,`csq`,`version`,`gps_date`,`wheel1`,`wheel2`,`min1`,`min2`,`ti`) VALUES ($id,$gebruiker,$groep,'$name','$system_id',$vehicle_id,$timestamp,$volt,$gs,$pl15,'$imei','$type','$vin',$odo,$vsp,$rpm,$eh,$ufuel,$serv,'$pn','$msg',$mnr,$brnr,$v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$i1,$i2,$i3,$i4,$i5,$i6,$i7,$i8,$i9,$i10,$i11,$i12,$ot,$it,'$outp','$inv','$inp','$outph',$vo1,$vo2,vo3,$vo4,$vo5,$vo6,$vo7,$vo8,$vo9,$vo10,$vo11,$vo12,$rck,$csq,'$version','$gps_date',$wheel1,$wheel2,$min1,$min2,$ti)";
            $stmnt2 = $this->new->prepare($sql);
            $stmnt2->execute();
            echo $sql;
            $this->getVehicleLocation($id);
            unset($sql);
            unset($stmnt2);
        }
    }
    
    private function getVehicleLocation($data_id){
        $sql = "SELECT * FROM `vehicle_location` WHERE `data_id`=$data_id ORDER BY `id` DESC LIMIT 1";
        $stmnt = $this->backup->prepare($sql);
        $stmnt->execute();
        
        while($vehicle_location = $stmnt->fetch(\PDO::FETCH_ASSOC)){
            foreach($vehicle_location as $key=>$val){
                $$key = $val;
            }
            $sql = "INSERT INTO `vehicle_location`(`id`,`gebruiker`,`groep`,`data_id`,`date`,`lat`,`lon`,`speed`,`course`,`fix`,`dop`,`st`,`gnr`,`alt`,`pdop`,`vdop`,`gqi`,`dgps`) VALUES($id,$gebruiker,$groep,$data_id,'$date',$lat,$lon,$speed,$course,$fix,$dop,$st,'$gnr',$alt,$pdop,$vdop,$gqi,'$dgps')";
            $stmnt2 = $this->new->prepare($sql);
            $stmnt2->execute();
            unset($stmnt2);
        }
    }
    private function truncateVehicleData(){
        $sql = "TRUNCATE `vehicle_data`";
        $stmnt = $this->new->prepare($sql);
        $stmnt->execute();
    }
    
    private function truncateVehicleLocation(){
        $sql = "TRUNCATE `vehicle_location`";
        $stmnt = $this->new->prepare($sql);
        $stmnt->execute();
    }
}
