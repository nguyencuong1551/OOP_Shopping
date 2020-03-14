<?php
class eventView
{
    public function getEvent($events)
    {
        require_once '../templates/allEvent.php';
    }
    public function addEvent()
    {
        require_once '../templates/addEvent.php';
    }
    public function getAdd($status)
    {
        require_once '../templates/getAdd.php';
    }
    public function editEvent($event)
    {
        require_once '../templates/editEvent.php';
    }
    public function getEdit($status)
    {
        require_once '../templates/getAdd.php';
    }
    public function deleteEvent($status)
    {
        require_once '../templates/getAdd.php';
    }
}
