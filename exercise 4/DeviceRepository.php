<?php
class Device
{
  protected $name;
  protected $id;

  function __construct($name, $id)
  {
    $this->name = $name;
    $this->id = $id;
  }

  public function  getName()
  {
    return $this->name;
  }

  public function  getId()
  {
    return $this->id;
  }

  public function  setName($name)
  {
    $this->name = $name;
  }

  public function  setId($id)
  {
    $this->id = $id;
  }
};


interface DeviceRepository
{
  function  create(Device $device);
  function  findById($deviceId): Device;
}


class MemoryRepository implements DeviceRepository
{
  private $memory = array();
  function create(Device $device)
  {
    array_push($this->memory, $device);
  }
  function findById($deviceId): Device
  {

    foreach ($this->memory as $device) {
      if ($device->getId() == $deviceId) {
        return $device;
      }
    }
  }
}


class DeviceManager
{
  function addDevice(DeviceRepository $repository, Device $device)
  {
    $repository->create($device);
  }
}

$repo = new MemoryRepository();

$deviceController = new DeviceManager();

$deviceController->addDevice($repo, new Device('pollo', 1));
$deviceController->addDevice($repo, new Device('gallina', 2));
$deviceController->addDevice($repo, new Device('conejo', 3));
$deviceController->addDevice($repo, new Device('arbol', 4));

echo '<pre>';
print_r($repo->findById(3));
echo '</pre>';
