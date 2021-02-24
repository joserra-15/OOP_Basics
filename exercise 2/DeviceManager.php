<?php
require 'Device.php';
require 'Mobile.php';
require 'Tablet.php';
class DeviceManager
{

  public function  getDeviceSerialNumber(Device $device)
  {
    return $device->getSerialNumber();
  }
};

$mobile = new Mobile(123, 6, 'nano');
$tablet = new Tablet(1234, 12, 321);

$deviceController = new DeviceManager();

echo $deviceController->getDeviceSerialNumber($tablet);
echo '<br>';
echo $deviceController->getDeviceSerialNumber($mobile);
