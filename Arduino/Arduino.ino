/*
   Author: David Solà Solé (david.sola.sole@gmail.com)
   Year: 2017
*/

#include "WifiController.h"
#include "ScalesController.h"
#include "ServosController.h"

int millis2Min(unsigned long timer);
unsigned long min2Millis(int minutes);
unsigned long sec2Millis(int seconds);

WifiController wifiController;
ScalesController scalesController;
ServosController servosController;

unsigned long timerPrev;
unsigned long timerCurr;

int waitingTime;  // in seconds

float valuePrev;
float value;

void setup()
{
  timerPrev = millis();
  wifiController.initialize();
  scalesController.initialize();
  servosController.initialize();
  waitingTime = 5;
  valuePrev = 0.000;
}

void loop()
{
  delay(100); // servos
  timerCurr = millis();
  value = scalesController.readData();

  bool change = servosController.needSwap(value, valuePrev);  // Decide if moving servos are necessary
  if (change) {
    scalesController.changeScale(); // Start reading from the other scale
  }
  // After several time (waitingTime), send data to web server
  if (timerCurr - timerPrev >= sec2Millis(waitingTime)) {
    timerPrev = timerCurr;  // Update previos timer
    String data = scalesController.getData();
    wifiController.sendRequest(data); // Send request to the server
  }
  valuePrev = value;
}

int millis2Min(unsigned long timer)
{
  return (int)((timer / 1000) / 60);
}

unsigned long min2Millis(int minutes)
{
  return (unsigned long)minutes * 60 * 1000;
}

unsigned long sec2Millis(int seconds)
{
  return (unsigned long)seconds * 1000;
}

