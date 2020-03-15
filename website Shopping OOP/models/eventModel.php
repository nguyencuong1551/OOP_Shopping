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
    public function getAdd($event)
    {
        $getEvent_name = $event['nameEvent'];
        $getEvent_percent = $event['percent'];
        $getEvent_image = $event['imageEvent'];
        $status = $this->crud("INSERT INTO events VALUES (null ,'$getEvent_name','$getEvent_percent','$getEvent_image',current_timestamp (),current_timestamp ())");
        return $status;
    }
    public function editEvent($id)
    {
        $this->select("SELECT * FROM events WHERE id ='$id'");
        $event = $this->fetch();
        return $event;
    }
    public function getEdit($event)
    {
        $getEvent_id = $event['id'];
        $getEvent_name = $event['nameEvent'];
        $getEvent_percent = $event['percent'];
        $getEvent_image = $event['imageEvent'];
        $status =
            $this->crud("UPDATE events SET nameEvent='$getEvent_name',percent='$getEvent_percent',imageEvent='$getEvent_image' WHERE id = '$getEvent_id'");
        return $status;
    }
    public function deleteEvent($id)
    {
        $status = $this->crud("DELETE FROM events WHERE id='$id'");
        return $status;
    }
    public function countEvent()
    {
        $count = $this->count("SELECT COUNT(id) AS total FROM events");
        return $count;
    }
}
