<?php

class Lamp extends Connection{
	public string $lamp_id;
	public string $lamp_name;
	public string $lamp_model;
	public string $lamp_zone;
	public string $lamp_on;

	public function __construct($lamp_id, $lamp_name, $lamp_model, $lamp_zone, $lamp_on){
		$this->lamp_id = $lamp_id;
		$this->lamp_name = $lamp_name;
		$this->lamp_model = $lamp_model;
		$this->lamp_zone = $lamp_zone;
		$this->lamp_on = $lamp_on;
    }
	public function setlamp_id($lamp_id)
	{
		$this->lamp_id = $lamp_id;
	}
	public function setlamp_name($lamp_name)
	{
		$this->lamp_name = $lamp_name;
	}
	public function setlamp_model($lamp_model)
	{
		$this->lamp_model = $lamp_model;
	}
	public function setlamp_zone($lamp_zone)
	{
		$this->lamp_zone = $lamp_zone;
	}
	public function setlamp_on($lamp_on)
	{
		$this->lamp_on = $lamp_on;
	}


    public function getlamp_id(){
        return $this->lamp_id;
    }
	public function getlamp_name(){
        return $this->lamp_name;
    }
	public function getlamp_model(){
        return $this->lamp_model;
    }
	public function getlamp_zone(){
        return $this->lamp_zone;
    }
	public function getlamp_on(){
        return $this->lamp_on; 
    }

		
}


?>