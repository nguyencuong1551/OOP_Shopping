<?php
require_once '../models/dbModel.php';
class eventModel extends database
{
    public function getEvent()
    {
        $events = array();
        $this->select("SELECT * FROM events");
        while ($getEvent = $this->fetch())
        {
            $events[] = $getEvent;
        }
        return $events;
    }
}
