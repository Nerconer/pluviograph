/*
 * Author: David Solà Solé (david.sola.sole@gmail.com)
 * Year: 2017 
 */
 
#ifndef ScalesController_h
#define ScalesController_h

#include <Arduino.h>

class ScalesController
{
  public:
    ScalesController();
    void initialize();
    float readData();
    String getData();
    void changeScale();   // starts reading from the other scale
    float getInitialWeight();
  private:
    float _initialWeight; // weight just after rotating servos 
    float _lastData;
    float _currData;
    bool _left;       // scale left = true | scale right = false
    String _data;
    String parseCharsData(char c, String data, bool &endNum, bool &skipFirst);
    String readNumber();
    void updateInitialWeight(float value);
    void serialFlush();
};

#endif
