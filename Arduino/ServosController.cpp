/*
 * Author: David Solà Solé (david.sola.sole@gmail.com)
 * Year: 2017 
 */
 
#include <Arduino.h>
#include <StackArray.h>
#include "ServosController.h"

ServosController::ServosController() {}

void ServosController::initialize()
{
  this->_pin0 = 2;
  this->_pin1 = 3;

  this->_maxCapacity = 450.0;

  this->_servo0.attach(this->_pin0);
  this->_servo1.attach(this->_pin1);

  this->_maxAngle = 100;
  this->_minAngle = 80;
  this->_angle0 = this->_minAngle;
  this->_angle1 = this->_maxAngle;
  this->_servo0.write(this->_angle0);
  this->_servo1.write(this->_angle1);
  this->_prevValue = 0.000;
  delay(100);
}

void ServosController::rotate()
{
  if (this->_angle0 == this->_minAngle) {
    this->_angle0 = this->_maxAngle;
    this->_angle1 = this->_minAngle;
  } else {
    this->_angle0 = this->_minAngle;
    this->_angle1 = this->_maxAngle;
  }
  this->_servo0.write(this->_angle0);
  this->_servo1.write(this->_angle1);
  delay(500);
}

bool ServosController::needSwap(float value, float valuePrev)
{
  if (value < valuePrev) {
    _rains.push(1);
    if (_rains.count() == 10) {
      while (!_rains.isEmpty ()) {
        _rains.pop();
      }
      rotate();
      return true;
    } else {
      return false;
    }
  }
  while (!_rains.isEmpty ()) {
    _rains.pop();
  }
  return false;
}


