/*
 * Author: David Solà Solé (david.sola.sole@gmail.com)
 * Year: 2017 
 */
 
#ifndef ServosController_h
#define ServosController_h

#include <Arduino.h>
#include <Servo.h>
#include <StackArray.h>

class ServosController
{
  public:
    ServosController();
    void initialize();
    void rotate();
    bool needSwap(float value, float valuePrev); // Decide and do if swap is needed
  private:
    Servo _servo0;
    Servo _servo1;
    int _pin0;
    int _pin1;
    int _angle0;
    int _angle1;
    int _maxAngle;
    int _minAngle;
    float _maxCapacity;
    float _prevValue;
    StackArray<float> _rains;
};

#endif
