<?php

class Db
{
    public $user;
    public $password;
    public $db;
    public $host;
    public $dsn;
    public $conn;
    public $path;

    public function __construct()
    {
        $this->user = 'root';
        $this->password = 'Stas@525210';
        $this->db = 'records';
        $this->host = 'localhost';
        $this->dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db;
        $this->conn = new PDO($this->dsn, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->path = '/var/www/html/speech2text.mine.nu/public/sound_files/';
    }

    public function getIvrs()
    {
        $sql = "SELECT * FROM `ivrs`";
        $query = $this->conn->query($sql);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function checkRecordsFilesOnDb($text)
    {
        $sql = "SELECT `ivr_name` FROM `ivrs` WHERE `ivr_name` = '$text'";
        $query = $this->conn->query($sql);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        if ($result[0]->ivr_name)
        {
            return true;
        }
        return false;
    }

    public function addSoundFilenameToDb($name, $file_name)
    {
        $sql = "INSERT INTO ivrs(ivr_name, file_name) VALUES (?, ?)";
        $query = $this->conn->prepare($sql);
        $query->execute([$name, $file_name]);
    }

    public function textToSpeech($data)
    {
        print_r($data);
        $file = uniqid();
        $speechfilenamemp = $this->path . $file . ".wav";
        file_put_contents($speechfilenamemp, text_to_speech($data));
        $speechfilenamemp = str_replace(".wav", "", $speechfilenamemp);
        return $speechfilenamemp;
    }

    public function deleteRecord($id)
    {

        $sql = "DELETE FROM `records`.`ivrs` WHERE `id` = '$id'";
        $query = $this->conn->prepare($sql);
        $query->execute();
        echo "<script> location.replace('index.php'); </script>";
    }

    public function getRecordName($id)
    {
        $sql = "SELECT `file_name` FROM `ivrs` WHERE `id` = '$id'";
        $query = $this->conn->query($sql);
        return $query->fetch(PDO::FETCH_ASSOC)['file_name'];
    }

    public function createCallFiles($phone, $id)
    {
        $rec_name = self::getRecordName($id);
        $path = __DIR__ . '/call_files/';
        $myfile = fopen($path . "call.call", "w") or die("Unable to open file!");
        $channel = "Channel: Local/$phone@from-internal\n";
        $context = "Context: playprompt\n";
        $callerid = "Callerid: 22222\n";
        $extension = "Extension: s\n";
        $priority = "Priority: 1\n";
        $set = "Set: filename=$rec_name\n";
        fwrite($myfile, $channel);
        fwrite($myfile, $context);
        fwrite($myfile, $callerid);
        fwrite($myfile, $extension);
        fwrite($myfile, $priority);
        fwrite($myfile, $set);
        fclose($myfile);
        echo "<div class='col my-5 d-flex justify-content-center'><p class='note note-success'><strong>?????????? ?????????? ?????????? ???????????? : </strong>$phone</p></div>";
    }

}
/*
 * Channel: Local/0544525210@from-internal
#WaitTime: 60
Context: playprompt
Extension: s
Priority: 1
Set: filename=/usr/share/asterisk/agi-bin/sound/62134c48e9189

<p class='note note-success'>
  <strong>?????????? ?????????? ?????????? ????????????:</strong> Lorem, ipsum dolor sit amet consectetur adipisicing elit.
  Cum doloremque officia laboriosam. Itaque ex obcaecati architecto! Qui necessitatibus
  delectus placeat illo rem id nisi consequatur esse, sint perspiciatis soluta porro?
</p>
 */