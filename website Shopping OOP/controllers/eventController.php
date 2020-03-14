<?php
class eventController
{
    public function __construct()
    {
    }

    public function getEvent()
    {
        require_once '../models/eventModel.php';
        $eventModel = new eventModel();
        $events = $eventModel->getEvent();
        require_once '../views/eventView.php';
        $eventView = new eventView();
        $eventView->getEvent($events);
    }

    public function addEvent()
    {
        require_once '../views/eventView.php';
        $eventView = new eventView();
        $eventView->addEvent();
    }

    public function getAdd()
    {
        $event = array(
            'nameEvent' => $_POST['name'],
            'percent' => $_POST['percent'],
            'imageEvent' => $_POST['image']
        );
        require_once '../models/eventModel.php';
        $eventModel = new eventModel();
        $status = $eventModel->getAdd($event);
        require_once '../views/eventView.php';
        $eventView = new eventView();
        $eventView->getAdd($status);
    }

    public function editEvent()
    {
        $id = $_GET['id'];
        require_once '../models/eventModel.php';
        $eventModel = new eventModel();
        $event = $eventModel->editEvent($id);
        require_once '../views/eventView.php';
        $eventView = new eventView();
        $eventView->editEvent($event);
    }

    public function getEdit()
    {
        $event = array(
            'id' => $_GET['id'],
            'nameEvent' => $_POST['name'],
            'percent' => $_POST['percent'],
            'imageEvent' => $_POST['image']
        );
        require_once '../models/eventModel.php';
        $eventModel = new eventModel();
        $status = $eventModel->getEdit($event);
        require_once '../views/eventView.php';
        $eventView = new eventView();
        $eventView->getEdit($status);
    }
    public function deleteEvent()
    {
        $id = $_GET['id'];
        require_once '../models/eventModel.php';
        $eventModel = new eventModel();
        $status = $eventModel->deleteEvent($id);
        require_once '../views/eventView.php';
        $eventView = new eventView();
        $eventView->deleteEvent($status);
    }
}
