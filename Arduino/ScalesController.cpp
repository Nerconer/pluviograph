/*
 * Author: David Solà Solé (david.sola.sole@gmail.com)
 * Year: 2017 
 */

#include <Arduino.h>
#include "ScalesController.h"

ScalesController::ScalesController() {}

void ScalesController::initialize()
{
  Serial.begin(115200);
  Serial2.begin(9600);
  Serial3.begin(9600);
  delay(500); // Necessary to work properly

  this->_left = false;
  this->_lastData = 0.000;
  String initial = readNumber();
  this->_initialWeight = initial.toFloat();
}

float ScalesController::readData()
{
  float value = 0.000;
  float valueReal;

  String data = readNumber();
  
  delay(500);

  value = data.toFloat();
  valueReal = value - this->_initialWeight;
  if ( valueReal < 0.000) valueReal = 0.000;  // VEURE COM POT AFECTAR AL SERVOS
  String a = String(valueReal, 3);
  String b = String(this->_initialWeight, 3);
  Serial.println("Value: " + a);
  
  this->_data = String(valueReal, 3);
  return valueReal;
}

String ScalesController::parseCharsData(char c, String data, bool &endNum, bool &skipFirst)
{
  if (c == ' ') { // FUNCIO
    endNum = true;
  }
  if (!endNum) {
    if (skipFirst) {
      skipFirst = false;  // Skipping sign character
    } else {
      data += c;
    }
  } 
  delay(3);
  return data;
}

String ScalesController::getData()
{
  return this->_data;
}

void ScalesController::changeScale()
{
  this->_left = !this->_left;
  serialFlush();
  String number = readNumber();
  this->_initialWeight = number.toFloat();
}

float ScalesController::getInitialWeight()
{
  return this->_initialWeight;
}

void ScalesController::updateInitialWeight(float value)
{
  this->_initialWeight = value;
}

String ScalesController::readNumber()
{
  String data;
  char c;
  bool endNum = false;    // Has finished reading the number?
  bool skipFirst = true;  // Skip sign symbol
  if (this->_left) {
    while (Serial3.available()) {
      c = Serial3.read();
      data = parseCharsData(c, data, endNum, skipFirst);
    }
  } else {
    while (Serial2.available()) {
      c = Serial2.read();
      data = parseCharsData(c, data, endNum, skipFirst);
    }
  }
  return data;
}

void ScalesController::serialFlush()
{
  while (Serial2.available() > 0) {
    char t = Serial2.read();
  }
  while (Serial3.available() > 0) {
    char t = Serial3.read();
  }

}



